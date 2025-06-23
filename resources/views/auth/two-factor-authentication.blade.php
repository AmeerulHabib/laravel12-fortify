@if (session('status') === 'two-factor-authentication-enabled')
    <div class="mb-4 p-3 text-green-700 bg-green-100 rounded">
        {{ __('Two-factor authentication has been enabled.') }}
    </div>
@elseif (session('status') === 'two-factor-authentication-disabled')
    <div class="mb-4 p-3 text-yellow-700 bg-yellow-100 rounded">
        {{ __('Two-factor authentication has been disabled.') }}
    </div>
@elseif (session('status') === 'recovery-codes-generated')
    <div class="mb-4 p-3 text-blue-700 bg-blue-100 rounded">
        {{ __('Recovery codes have been regenerated.') }}
    </div>
@endif

<form action="user/two-factor-authentication" method="POST">
    @csrf
    @if (auth()->user()->two_factor_secret)
    <!-- Two-Factor QR -->
    <div class="mb-4">
        <div class="text-sm text-gray-700 mb-2">
            {{ __('Scan the QR code below using your authenticator app:') }}
        </div>

        <!-- QR Code -->
        <div class="inline-block p-4 bg-white rounded shadow">
            {!! auth()->user()->twoFactorQrCodeSvg() !!}
        </div>
    </div>


    <!-- Recovery Codes -->
    <div class="mb-6">
        <div class="text-sm text-gray-700 mb-2">
            {{ __('Store these recovery codes in a secure location:') }}
        </div>
        <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 bg-gray-100 p-4 rounded">
            @foreach (auth()->user()->recoveryCodes() as $code)
            <div>{{ $code }}</div>
            @endforeach
        </div>
    </div>

    <!-- Enable/Disable Two-Factor Authentication -->
    <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded">
        @method('DELETE')
        {{ __('Disable') }}
    </button>
    @else
    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded">
        {{ __('Enable') }}
    </button>
    @endif
</form>
