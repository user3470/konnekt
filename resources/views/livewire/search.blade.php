<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <button class="button text-white bg-theme-1 shadow-md mr-2" wire:click="filter"> Filter
            <span wire:ignore>
                <i class="w-4 h-4" style="display: inline" data-feather="filter"></i>
            </span> </button>
        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <span wire:ignore>
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </span>
            </div>
        </div>
    </div>
    <!-- BEGIN: Users Layout -->
    @foreach ([1,2,3,3,2,4,5,45,85,5,5,85,5,85] as $item)
    <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
        <div class="box">
            <div class="flex items-start px-5 pt-5">
                <div class="w-full flex flex-col lg:flex-row items-center">
                    <div class="w-32 h-32 image-fit">
                        <img alt="Rosie Cute" class="rounded-md" src="{{asset('img/girl.jpg')}}">
                    </div>
                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Rosie Cute</a>
                        <div class="text-gray-600 text-xs">21 Years Old</div>
                    </div>
                </div>
                <div class="absolute right-0 top-0">
                    <a class="w-5 h-5 block mr-2 mt-1" href="javascript:;">
                        <span wire:ignore>
                            <i data-feather="heart" class="w-5 h-5 text-red-700 dark:text-gray-300"></i>
                        </span>

                    </a>
                </div>
            </div>
            <div class="text-center lg:text-left p-5">
                <div>Rosie's description</div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5">
                    <span wire:ignore>
                        <i data-feather="map-pin" class="w-3 h-3 mr-2"></i>
                    </span>
                    Hatfield, Harare ~ 5km Away </div>
                <div class="flex items-center justify-center lg:justify-start text-green-600 mt-1">
                    <span wire:ignore>
                        <i data-feather="target" class="w-3 h-3 mr-2"></i>
                    </span> Available - 2 Hours Ago </div>
            </div>
            <div class="text-center lg:text-right p-5 border-t border-gray-200 dark:border-dark-5">
                <button class="button button--sm text-white bg-theme-1 mr-2" data-toggle="modal"
                    wire:click="requestContacts(1)" data-target="#medium-modal"> <span wire:ignore><i
                            data-feather="phone" class="w-3 h-3 mr-2" style="display: inline"></i></span> Request
                    Contact</button>
                <button
                    class="button button--sm text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300">Photos</button>
            </div>
        </div>
    </div>
    @endforeach


    <div class="modal" id="payment_modal">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Request {{$provider->name ?? 'user'}}'s contact</h2>
                <a data-dismiss="modal" href="javascript:;" class="right-0 top-0"> <i data-feather="x"
                        class="w-8 h-8 text-gray-500"></i> </a>
            </div>
            <div class="p-5">
                <h2 class="font-normal">Select Currency:</h2>
                <div class="col-span-12">
                    <select id="currency-select" wire:model="currency" class="input w-full border mt-2 flex-1">
                        <option>Select</option>
                        <option value="BTC">Bitcoin (BTC)</option>
                        <option value="ETH">Ether (ETH)</option>
                        <option value="XLM">Lumens (XLM)</option>
                    </select>
                </div>
            </div>
            @if ($address)
            <div class="px-5">
                <p>
                    Send <b>{{$amount}} {{$currency}}</b> to the address below. Click Check Payment
                    @if ($currency === 'XLM')
                    after you process.
                    @else
                    when your transaction get at least 2 network confirmations.
                    @endif
                </p>
            </div>
            @endif
            <div class="p-5 flex items-center justify-center">
                @if ($address)
                @switch($currency)
                @case('BTC')
                {!! QrCode::size(150)->BTC($address, $amount, [
                'label' => 'Rosie Cute'
                ]) !!}
                @break
                @case('ETH')
                {!! QrCode::size(150)->generate($address); !!}
                @break
                @case('XLM')
                {!! QrCode::size(150)->generate($address); !!}
                @break
                @default

                @endswitch
                @endif
            </div>

            @if ($address)
            <div class="mt-2 px-5 text-center">
                <textarea readonly class="w-full resize-none text-center" rows="3">{{$address}}</textarea>
            </div>
            <p class="px-5 mb-2 text-red-400 font-medium">Assets send to the wrong address are lost forever.</p>
            @endif
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                <button type="button" data-dismiss="modal"
                    class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                <button type="button" @if(!$address) disabled @endif wire:click="checkPayment()"
                    class="button w-25 bg-theme-1 text-white">Check Payment</button> </div>
        </div>
    </div>

    <!-- END: Users Layout -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <ul class="pagination">
            {{-- <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
            </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li> <a class="pagination__link" href="">1</a> </li>
            <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
            <li> <a class="pagination__link" href="">3</a> </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
            </li> --}}
        </ul>
        <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>

<script>
    document.addEventListener('livewire:load', function () {
        cash("#currency-select").on('change', function() {
            cash('#payment_modal').modal('hide');
        });
        @this.on('qr-modal', (t) => {
            console.log("Start");
            try {
                if(t){
                    setTimeout(() => {
                        cash('#payment_modal').modal('show');
                    }, 200)
                }else{
                    cash('#payment_modal').modal('show');
                }
            } catch (error) {
                
            }
        })
    });
</script>