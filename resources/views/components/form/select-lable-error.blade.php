@props(['lable' =>'', 'name', 'selected' => '', 'options' => []])


<label for="recipient-name" class="col-form-label float-left">{{ __($lable) }}</label>
<select name="{{ $name }}" {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)]) }}>
    <option value="">{{ __('Choose from the list') }}</option>

    @foreach ($options as $value => $item)
        <option value="{{ $value }}" {{ $value == old($name, $selected) ? 'selected' : '' }}>
            {{ $item }}
        </option>
    @endforeach
</select>
@error($name)
    <b class="invalid-feedback">
        {{ $message }}
    </b>
@enderror
