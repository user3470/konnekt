<div class="picture" style="border-radius: 6px;">
    @if (!isset($image))
        <img src="{{asset('img/unnamed.png')}}" class="picture-src" id="wizardPicturePreview" title="" />
    @else
        <img src="{{$image->temporaryUrl()}}" class="picture-src" id="wizardPicturePreview" title="">
    @endif
    <input wire:model="image" type="file" id="wizard-picture" accept="image/png, image/jpeg">
</div>