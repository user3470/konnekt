<div class="wizard-container">
    <div class="card wizard-card" data-color="blue" id="wizard">
        <form action="" method="">
            <div class="wizard-header">
                <h3 class="wizard-title">
                    Get Connected
                </h3>
                <h5>Services to compliment your experience.</h5>
            </div>
            <div class="wizard-navigation">
                <ul>
                    <li><a href="#details" data-toggle="tab">Location</a></li>
                    <li><a href="#captain" data-toggle="tab">Preference</a></li>
                    <li><a href="#description" data-toggle="tab">Extra Details</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane" id="details">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="info-text"> Let's narrow down your matches.</h4>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Area</label>
                                <input id="area" name="area" type="text" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="form-group label-floating">
                                <label class="control-label">State/Province</label>
                                <input id="state" name="state" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group label-floating">
                                <label class="control-label">City</label>
                                <input id="city" name="city" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="captain">
                    <h4 class="info-text">Tell us more about preference.</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group label-floating">
                                <label class="control-label">You're looking for:</label>
                                <select id="gender" class="form-control">
                                    <option disabled="" selected=""></option>
                                    <option>A Woman</option>
                                    <option>A Man </option>
                                    <option>Any Gender</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group label-floating">
                                <label class="control-label">Between ages?</label>
                                <select id="age-from" class="form-control">
                                    <option disabled="" selected=""></option>
                                    @livewire('components.ages')
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">And?</label>
                                <select id="age-to" class="form-control">
                                    <option disabled="" selected=""></option>
                                    @livewire('components.ages', ['between' => true])
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="description">
                    <div class="row">
                        <h4 class="info-text"> Brief description of your preferred spec.</h4>
                        <div class="col-sm-6 col-sm-offset-1">
                            <div class="form-group">
                                <label>Preferred Spec</label>
                                <textarea id="spec" class="form-control" placeholder="" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Example</label>
                                <p class="description">"Travel is a really big part of my life and I’d love to meet
                                    someone who wants to join me on my many adventures"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wizard-footer">
                <div class="pull-right">
                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd' name='next' value='Next' />
                    <input type='button' wire:click="$emit('submit')" class='btn btn-finish btn-fill btn-info btn-wd'
                        name='finish' value='Search' />
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
        @this.on('submit', () => {
            console.log("Submitting");
            const find = {
                area: $("#area").val(),
                state: $("#state").val(),
                city: $("#city").val(),
                gender: $("#gender").val(),
                age_from: Number($("#age-from").val() || 0),
                age_to: Number($("#age-to").val() || 0),
                spec: $("#spec").val()
            }

            if(find.age_from > find.age_to){
                return toastr.error("Invalid age range under preference");
            }

            if(!find.area && !find.state && !find.city){
                return toastr.error("Enter at least 1 field under Location");
            }

            // //validate
            // toastr.info('Are you the 6 fingered man?')

            // //show loader
            // console.log({find});
            @this.search(find);
        })
    })
</script>