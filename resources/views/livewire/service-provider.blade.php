<div class="wizard-container">
    <div class="card wizard-card" data-color="blue" id="wizardProfile">
        <form>
            <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

            <div class="wizard-header">
                <h3 class="wizard-title">
                    Build Your Profile
                </h3>
                <h5>This information will let clients know more about you.</h5>
            </div>
            <div class="wizard-navigation">
                <ul>
                    <li><a href="#about" data-toggle="tab">About</a></li>
                    <li><a href="#account" data-toggle="tab">Extra</a></li>
                    <li><a href="#address" data-toggle="tab">Location</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane" id="about">
                    @livewire('provider.profile')
                </div>
                <div class="tab-pane" id="account">
                    <h4 class="info-text">Tell us more about preference.</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group label-floating">
                                <label class="control-label">You're:</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="" selected></option>
                                    <option value="woman">A Woman</option>
                                    <option value="man">A Man </option>
                                    <option value="none">Rather not say.</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group bmd-form-group is-filled">
                                <label class="label-control bmd-label-static">Date of Birth</label>
                                <input id="dob" autocomplete="off" name="dob" type="text"
                                    class="form-control datetimepicker">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="address">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="info-text"> Let's get you found.</h4>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <input placeholder="Area" id="area" name="area" type="text" class="form-control"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <input placeholder="State/Province" id="state" name="state" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group label-floating">
                                <input placeholder="City" id="city" name="city" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="checkbox">
                                <label>
                                    <input id="terms" name="terms" type="checkbox" name="optionsCheckboxes"
                                        value="accept">
                                    I am over over 18 and I accept the <a href="javascript:;">Terms of Use</a> and I
                                    have read the <a href="javascript:;">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wizard-footer">
                <div class="pull-right">
                    <input type='button' wire:click="$emit('next')" class='btn btn-next btn-fill btn-info btn-wd'
                        name='next' value='Next' />
                    <input wire:click="$emit('finish')" type='button' class='btn btn-finish btn-fill btn-info btn-wd'
                        name='finish' value='Finish' />
                </div>

                <div class="pull-left">
                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous'
                        value='Previous' />
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</div> <!-- wizard container -->


<script>
    document.addEventListener('livewire:load', function () {
        @this.on('finish', () => {

            console.log("Submitting");

            const find = {
                area: $("#area").val(),
                state: $("#state").val(),
                city: $("#city").val(),
                gender: $("#gender").val(),
                dob: $("#dob").val(),
                terms: $("#terms").is(':checked')
            }

            const req = ['city', 'gender', 'dob', 'terms'];

            let msg = '';

            req.forEach(r => {
                if(!find[r]){
                    msg += ` ${r}, `
                }
            });

            if(msg){
                return toastr.error(`Fields: ${msg} are required!`);
            }

            toastr.info("Saving your profile");

            Livewire.emit('saveProfile', find);
        });

        @this.on('saving_error', (msg) => {
            console.log({msg});
            toastr.error(msg);
        });

        @this.on('next', () => {
            setTimeout(() => {
                const is_extra = $("#account").hasClass('active');
                const photo = $("#wizard-picture").val();
                if(photo){
                    Livewire.emit("saveImage");
                }
            }, 500)
            
        });
    })
</script>