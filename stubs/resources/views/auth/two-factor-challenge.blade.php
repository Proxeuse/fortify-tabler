@extends('layouts.auth')

@section('content')

<form method="POST" action="{{ url('/two-factor-challenge') }}" class="card card-md">
    @csrf
    <div class="card-body">
        <h2 class="mb-3 text-center">{{ __('auth.2fa.title') }}</h2>

        <div id="code" class="form-group mb-3 ">
            <label class="form-label">{{ __('auth.2fa.code') }}</label>
            <div>
                <input type="text" name="code" autofocus autocomplete="one-time-code" class="form-control">
                <small class="form-hint">{{ __('auth.2fa.codehelp') }}</small>
            </div>
        </div>

        <div id="emergency" class="form-group mb-3 d-none">
            <label class="form-label">{{ __('auth.2fa.emergency') }}</label>
            <div>
                <input type="text" name="recovery_code" autofocus autocomplete="one-time-code" class="form-control">
                <small class="form-hint">{{ __('auth.2fa.emergencycodehelp') }}</small>
            </div>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('auth.2fa.submit') }}</button>
        </div>
    </div>
</form>

<div class="text-center text-muted mt">
    <a href="#" id="switcher" onclick="switcherFunction();" data-id="logincode" tabindex="-1">{{ __('auth.2fa.loginrecovery') }}</a>
</div>

<script>
// set variables
var switcher = $("#switcher");
var codeElement = $("#code");
var recoveryElement = $("#emergency");

function switcherFunction(){
    // get current state
    var current = switcher.attr("data-id");
    // if current state is logincode
    if(current == "logincode"){
        // change current state to recoverycode
        switcher.attr("data-id", "recoverycode");
        // change text of switcher
        switcher.text("{{ __('auth.2fa.logincode') }}");
        // hide 2fa code input
        codeElement.addClass("d-none");
        // show recovery code input
        recoveryElement.removeClass("d-none");
    } else {
        // change current state to logincode
        switcher.attr("data-id", "logincode");
        // change text of switcher
        switcher.text("{{ __('auth.2fa.loginrecovery') }}");
        // show 2fa code input
        codeElement.removeClass("d-none");
        // hide recovery code input
        recoveryElement.addClass("d-none");
    }
}
</script>

@endsection
