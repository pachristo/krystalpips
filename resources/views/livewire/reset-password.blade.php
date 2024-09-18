<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div>
        {{-- The Master doesn't talk, he acts. --}}
        <form >
            <div class="nm-mb-2 nm-mb-md-2">
                <h2>
                    <a class="heading" href="{{ url('/') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" width="160">
                    </a>
                </h2>
                <br>
                <p>Remember Password ?
                    <a class="underline nm-fs-1 nm-fw-bd" href="{{ url('/login') }}">Login account</a>
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



            <div class="row nm-aic nm-mb-2">


                <div class="col-sm-6 nm-sm-tr">
                    <button type="submit" class="btn btn-primary nm-hvr nm-btn-1" wire:loading.attr="disabled">
                        <span wire:loading.remove>Proceed</span>
                        <span wire:loading>
                            <i class="fas fa-spinner fa-spin"></i> Processing...
                        </span>
                    </button>
                </div>
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

</div>
