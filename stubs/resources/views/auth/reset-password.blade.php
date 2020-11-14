@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('password.update') }}" class="card card-md">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <div class="card-body">
        <h2 class="text-center">{{ __('auth.forgotpassword') }}</h2>
        <p class="text-center mx-md-5 mx-2">{{ __('auth.forgotpasswordtext') }}</p>

        <div class="mb-3">
            <label class="form-label">{{ __('auth.fields.email') }}</label>
            <input class="form-control" type="email" name="email" placeholder="{{ __('auth.placeholder.email') }}"
                value="{{ old('email', $request->email) }}" required autofocus tabindex="1"/>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('auth.fields.password') }}</label>
            <div class="input-group input-group-flat">
                <input type="password" name="password" required autocomplete="new-password" class="form-control"
                    placeholder="{{ __('auth.placeholder.password') }}" tabindex="3">
                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-toggle="tooltip"><svg
                            xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <circle cx="12" cy="12" r="2" />
                            <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                            <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                        </svg>
                    </a>
                </span>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('auth.fields.passwordconfirmation') }}</label>
            <input type="password" name="password_confirmation" required autocomplete="new-password"
                class="form-control" placeholder="{{ __('auth.placeholder.passwordconfirmation') }}" tabindex="4">
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100" tabindex="2">{{ __('auth.submit') }}</button>
        </div>

</form>
@endsection
