@props(['name','value'=>'','lable' =>''])

<label for="recipient-name" class="col-form-label float-start">{{$lable }}</label>
<textarea  name="{{$name}}"  autocomplete="off"
{{$attributes->class(['form-control','is-invalid' => $errors->has($name)])}}
>{{ old($name, $value) }}</textarea>
@error($name)
    <b class="invalid-feedback">
        {{ $message }}
    </b>
@enderror
