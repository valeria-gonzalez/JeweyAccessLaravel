<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="{{ $id }}">{{ $label }}</label>
    <div class="col-sm-10">
        <div class="mb-3">
            <select name="{{ $id }}" id="{{ $id }}" class="form-select">
                @foreach ($options as $option)
                <option value="{{ $option[$properties['value']] }}">{{ $option[$properties['text']] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>