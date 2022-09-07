@props(['name', 'type' => 'text', 'value' => '', 'lable' => ''])

<label for="yourUsername" class="form-label ">{{ $lable }}</label>
<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" autocomplete="off"
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>
@error($name)
    <b class="invalid-feedback">
        {{ $message }}
    </b>
@enderror
