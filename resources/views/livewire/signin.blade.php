<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit.prevent="sign_in">
        <div class="nm-mb-2 nm-mb-md-2">
            <h2>
                <a class="heading" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" width="160">
                </a>
            </h2>
            <br>
            <p>New Here?
                <a class="underline nm-fs-1 nm-fw-bd" href="{{ url('/register') }}">Create an account</a>
            </p>
        </div>

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h6>{!! session()->get('error') !!}</h6>
             
            </div>
        @endif

        <div class="input-group nm-gp">
            <span class="nm-gp-pp"><i class="fas fa-user"></i></span>
            <input type="text" wire:model="email" class="form-control" id="inputUsername" tabindex="1" placeholder="Enter your email" required>
        </div>

        <div class="input-group nm-gp">
            <span class="nm-gp-pp"><i class="fas fa-lock"></i></span>
            <input type="password" wire:model="password" class="form-control" id="inputPassword" tabindex="2" placeholder="Password" required>
        </div>

        <div class="row nm-aic nm-mb-2">
            <div class="col-sm-6 nm-mb-1 nm-mb-sm-0">
                <span class="nm-fs-1 nm-tm">Show password</span>
                <label class="nm-sw-pd">
                    <input type="checkbox" id="toggle-password" class="d-none" onclick="togglePasswordVisibility()">
                    <span class="slider round"></span>
                </label>
            </div>

            <div class="col-sm-6 nm-sm-tr">
                <button type="submit" class="btn btn-primary nm-hvr nm-btn-1" wire:loading.attr="disabled">
                    <span wire:loading.remove>Log In</span>
                    <span wire:loading>
                        <i class="fas fa-spinner fa-spin"></i> Processing...
                    </span>
                </button>
            </div>
        </div>

        <div class="row nm-row-ct nm-tp-3">
            <div class="form-group form-check">
                <input type="checkbox" wire:model="rememberMe" class="form-check-input" id="rememberMe">
                <label class="form-check-label nm-check" for="rememberMe">Keep me logged in</label>
            </div>
        </div>

        <div class="row nm-row-ct">
            <a class="nm-fs-2 nm-fw-bd" href="{{ url('forget-password') }}">Forgot Password?</a>
        </div>

        <div class="row nm-row-ct nm-tp-5">
            <p>
                © {{ date('Y') }} All Rights Reserved.
                <a class="heading" href="{{ url('/') }}" aria-label="{{ env('APP_NAME') }}">{{ env('APP_NAME') }}</a>
            </p>
        </div>
    </form>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('inputPassword');
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
        }
    </script>

</div>
