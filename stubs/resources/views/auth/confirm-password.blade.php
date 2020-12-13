@extends('layouts.auth')

@section('content')

<form method="POST" action="{{ route('password.confirm') }}" class="card card-md">
    @csrf
    <div class="card-body">
        <h2 class="mb-3 text-center">{{ __('tabler::auth.confirmpassword') }}</h2>

        <div class="mb-3">
            <label class="form-label">{{ __('tabler::auth.fields.password') }}</label>
            <input class="form-control" type="password" name="password" placeholder="{{ __('tabler::auth.placeholder.password') }}"
                value="{{ old('password') }}" required autofocus tabindex="1" autocomplete="current-password"/>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100" tabindex="2">{{ __('tabler::auth.submit') }}</button>
        </div>

</form>

@if (Route::has('password.request'))
<div class="text-center text-muted mt">
    <a href="{{ route('password.request') }}" tabindex="-1">{{ __('tabler::auth.forgotpassword') }}</a>
</div>
@endif

@endsection
