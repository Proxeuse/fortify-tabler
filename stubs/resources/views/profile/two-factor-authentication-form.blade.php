@if(! auth()->user()->two_factor_secret)
    {{-- Enable 2FA --}}
    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
        @csrf

        <button type="submit" class="btn btn-primary mb-3">
            {{ __('Enable Two-Factor') }}
        </button>
    </form>
@else
    {{-- Show 2FA Recovery Codes --}}
    <p class="mb-2">
        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
    </p>

    <ul class="list-group mb-3">
        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
            <li class="list-group-item">{{ $code }}</li>
        @endforeach
    </ul>

    {{-- Regenerate 2FA Recovery Codes --}}
    <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}" id="regenerateCodeForm">
        @csrf
    </form>

    {{-- Disable 2FA --}}
    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
        @csrf
        @method('DELETE')

        <button class="btn btn-primary" onclick='event.preventDefault(); document.getElementById("regenerateCodeForm").submit();'>
            {{ __('Regenerate Recovery Codes') }}
        </button>

        <button type="submit" class="btn btn-danger">
            {{ __('Disable Two-Factor') }}
        </button>
    </form>
@endif
