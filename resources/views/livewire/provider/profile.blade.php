<div class="row">
    <h4 class="info-text"> Let's start with the basic information</h4>
    <div class="col-sm-4 col-sm-offset-1">
        <div class="picture-container">
            @livewire('provider.img')
            <h6>Recent Picture</h6>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">face</i>
            </span>
            <div class="form-group label-stacked">
                {{-- <label class="control-label"> <small>(required)</small></label> --}}
                <input placeholder="First Name" wire:model="first_name" name="first_name" type="text" class="form-control">
            </div>
        </div>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">record_voice_over</i>
            </span>
            <div class="form-group label-stacked">
                {{-- <label class="control-label"> <small>(required)</small></label> --}}
                <input placeholder="Last Name" wire:model="last_name" name="last_name" type="text" class="form-control">
            </div>
        </div>
    </div>

    <div class="col-sm-10 col-sm-offset-1">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">email</i>
            </span>
            <div class="form-group label-stacked">
                <input autocomplete="off" placeholder="Email" wire:model="email" name="email" type="email" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-group">
                <input autocomplete="new-password" wire:model="password" placeholder="Password" name="password" type="password" class="form-control">
            </div>
        </div>
    </div>
</div>