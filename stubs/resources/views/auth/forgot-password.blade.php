@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('password.email') }}" class="card card-md">
    @csrf
    <div class="card-body">
        <h2 class="text-center">{{ __('tabler::auth.forgotpassword') }}</h2>
        <p class="text-center mx-md-5 mx-2">{{ __('tabler::auth.forgotpasswordtext') }}</p>

        <div class="mb-3">
            <label class="form-label">{{ __('tabler::auth.fields.email') }}</label>
            <input class="form-control" type="email" name="email" placeholder="{{ __('tabler::auth.placeholder.email') }}"
                value="{{ old('email') }}" required autofocus tabindex="1"/>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100" tabindex="2">{{ __('tabler::auth.submit') }}</button>
        </div>

</form>
@endsection
