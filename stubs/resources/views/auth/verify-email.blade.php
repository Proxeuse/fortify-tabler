@extends('layouts.auth')

@section('content')
@if (session('status') == 'verification-link-sent')
<div class="alert alert-success">
    {{ __('tabler::auth.resendconfirmation') }}
</div>
@endif

<div class="card card-md">
    <div class="card-body">
        <h2 class="text-center">{{ __('tabler::auth.emailverification') }}</h2>
        <p class="text-center mx-2">
            {{ __('tabler::auth.emailverificationtext') }}
        </p>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="">
                <button type="submit" class="btn btn-primary w-100" tabindex="2">{{ __('tabler::auth.resend') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
