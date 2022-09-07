<div class="d-flex flex-row align-items-center mb-4">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-envelope-fill"></i>
        </span>
        <x-form.input-lable-error type="email" name="email" placeholder="E-mail" />
    </div>
</div>

<div class="d-flex flex-row align-items-center mb-2">

    <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-lock-fill"></i>
        </span>
        <x-form.input-lable-error type="password" name="password" placeholder="Password" />
    </div>

</div>


<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember"
            value="true" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
    </div>
</div>


<div class="d-grid gap-2 col-8 mx-auto">
    <button class="btn btn-outline-info btn-sm" type="submit">Login</button>
</div>

<div class="col-12">
    <p class="small mb-0">Don't have account?
        <a href="pages-register.html">
            Createan account
        </a>
    </p>
    <p class="small mb-0">Forget Your Password?
        <a href="pages-register.html">
            Forget Password
        </a>
    </p>
</div>


