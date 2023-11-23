<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="{{ $id }}">{{ $label }}</label>
    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input 
                type="number" 
                id="{{ $id }}" 
                name="{{ $id }}" 
                step="0.01" 
                class="form-control" 
                placeholder="{{ $placeholder }}"  
                value = "{{ $value }}"
                wire:model="{{ $id }}"
                required
            />
        </div>
    </div>
</div>