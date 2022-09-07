<div class="d-flex flex-row align-items-center mb-4">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-person-circle"></i>
        </span>
        <x-form.input-lable-error type="text" name="name" placeholder="UserName" />
    </div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-envelope-fill"></i>
        </span>
        <x-form.input-lable-error type="email" name="email" placeholder="E-mail" />
    </div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-lock-fill"></i>
        </span>
        <x-form.input-lable-error type="password" name="password" placeholder="Enter-Password" />
    </div>
</div>

<div class="d-flex flex-row align-items-center mb-2">

    <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-lock-fill"></i>
        </span>

        <x-form.input-lable-error type="password" name="password_confirmation" placeholder="Repeat-Password" />
    </div>

</div>

<div class="d-grid gap-2 col-8 mx-auto">
    <button class="btn btn-outline-info btn-sm" type="submit">Sign Up</button>
</div>

<div class="col-12">
    <p class="small mb-0">Do You Already Have an Account?
        <a href="{{route('login')}}">
            Log In
        </a>
    </p>
</div>
