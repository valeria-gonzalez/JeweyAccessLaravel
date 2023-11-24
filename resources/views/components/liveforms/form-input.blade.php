<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="{{ $id }}">{{ $label }}</label>
    <div class="col-sm-10">
        <input type="{{ $type }}" 
            class="form-control" 
            id="{{ $id }}" 
            wire:model="{{ $id }}"
            name="{{ $id }}" 
            placeholder="{{ $placeholder }}" 
        />
    </div>
</div>