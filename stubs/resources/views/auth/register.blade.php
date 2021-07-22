@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('register') }}" class="card card-md">
    @csrf
    <div class="card-body">
        <h2 class="mb-3 text-center">{{ __('auth.register') }}</h2>
        <div class="mb-3">
            <label class="form-label">{{ __('auth.fields.name') }}</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="form-control" placeholder="{{ __('auth.placeholder.name') }}" tabindex="1">
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('auth.fields.email') }}</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="form-control"
                placeholder="{{ __('auth.placeholder.email') }}" tabindex="2">
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
            <button type="submit" class="btn btn-primary btn-block"
                tabindex="5">{{ __('auth.registerbutton') }}</button>
        </div>

    </div>

</form>
<div class="text-center text-muted mt-3">
    {{ __('auth.placeholder.alreadyhaveaccount') }} <a href="{{ route('login') }}" tabindex="-1">{{ __('auth.login') }}</a>
</div>
@endsection
