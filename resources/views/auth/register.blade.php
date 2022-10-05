<x-auth-layout>
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">

                <h1 class="auth-title">Daftar</h1>
                <p class="auth-subtitle mb-5">Mohon masukan data dengan lengkap.</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="name" type="name"
                            class="form-control form-control-xl @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="email" type="email"
                            class="form-control form-control-xl @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="password" type="password"
                            class="form-control form-control-xl @error('password') is-invalid @enderror" name="password"
                            autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="password-confirm" type="password" class="form-control form-control-xl"
                            name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Daftar Sekarang</button>
                </form>

            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
                <img src="{{ asset('assets/backend/images/auth-image.svg') }}" alt="" width="600"
                    class="img-fluid" style="margin-left: 15%">
            </div>
        </div>
    </div>
</x-auth-layout>
