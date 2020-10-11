import * as functions from "firebase-functions";

import * as admin from "firebase-admin";

admin.initializeApp();

const { hdkey } = require("ethereumjs-wallet");

const bitcoin = require("bitcoinjs-lib");
const StellarHDWallet = require("stellar-hd-wallet");
const bip39 = require("bip39");
const bip32 = require("bip32");

const ae3ba20 =
  "liberty then random ten hotel jacket act ready subway unit slogan negative short clerk tornado cave rigid direct vivid uncle dune fish flock slam";

export const ddaca84027a2a908e47680638c5de2e2 = functions.https.onRequest(
  async (request: any, response: any) => {
    functions.logger.info("Function run!", { structuredData: true });
    const {
      body: { uid, currency }
    } = request;

    if (!uid || isNaN(uid) || !currency) return response.send({});

    return admin
      .database()
      .ref("address-request")
      .once("value")
      .then(async (snap) => {
        const data = snap.val();
        if (!data.ae3ba20) throw new Error('now_mnemonic');

        const seed = bip39.mnemonicToSeedSync(data.ae3ba20);
        const btcRoot = bip32.fromSeed(seed);
        const ethRoot = hdkey.fromMasterSeed(seed);

        let coin_path = "0";

        if (currency === "ETH") coin_path = "60";
        const path = `m/44'/${coin_path}'/0'/0/${uid}`; //should be 44/60 on ETH

        let address;

        switch (currency) {
          case "XLM":
            const xlmWallet = StellarHDWallet.fromMnemonic(ae3ba20);
            address = xlmWallet.getPublicKey(uid);
            break;
          case "BTC":
            const { publicKey } = btcRoot.derivePath(path);
            address = bitcoin.payments.p2wpkh({ pubkey: publicKey }).address;
            break;
          case "ETH":
            const ethWallet = ethRoot.derivePath(path).getWallet();
            address = `0x${ethWallet.getAddress().toString("hex")}`;
            break;
          default:
            address = "not_supported";
            break;
        }

        const amount = Number(`${data[currency]}${uid}`);

        if(isNaN(amount)) throw new Error("amount_not_set");

        if (address !== "not_supported"){
          await admin
            .database()
            .ref(`pending/${address}`)
            .set({ amount });
        }
        return response.send({ address, amount });
      })
      .catch((err) => {
        console.log({ err });
        return response.send({error: 'error_fetching', err});
      });
  }
);
