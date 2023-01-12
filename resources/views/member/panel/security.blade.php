@extends('templates.member.panel.page')

@section('content')
    <section>
        <div class="font-semibold text-lg mb-5">Two Factor Authentication</div>
        @if (!empty(auth()->user()->two_factor_secret))
            @if (empty(auth()->user()->two_factor_confirmed_at))
                <p>Two factor authentication is now enabled.<br>Scan the following QR code or input secret key using your phone's authenticator application.</p>
                <div class="flex items-start space-x-10 my-10">
                    <div>
                        <div class="font-medium mb-2">QR Code</div>
                        <div class="inline-block ring ring-areakerja/50 rounded p-2 bg-areakerja/10">{!! auth()->user()->twoFactorQrCodeSvg() !!}</div>
                    </div>
                    <div>
                        <div class="font-medium mb-2">Secret Key</div>
                        <div class="inline-block ring ring-areakerja/50 rounded p-2 bg-areakerja/10 tracking-widest">{{ decrypt(auth()->user()->two_factor_secret) }}</div>
                    </div>
                </div>
                <form action="{{ route('two-factor.confirm') }}" method="post" class="lg:w-[30%]">
                    @csrf
                    <div class="textbox-group">
                        <label for="code">2FA Code</label>
                        <input type="text" name="code" id="code">
                    </div>
                    <button class="btn btn-primary" type="submit">Confirm 2FA</button>
                </form>
            @endif
            @if(!empty(auth()->user()->two_factor_confirmed_at))
                <div class="alert alert-success">Two factor authentication confirmed and enabled successfully.</div>
            @endif
            @if (session('status') == 'two-factor-authentication-confirmed')
                <div class="my-10">
                    <div class="mb-2 font-semibold">Recovery Codes</div>
                    <div class="inline-block ring ring-areakerja/50 rounded p-5 bg-areakerja/10">
                        <code class=" tracking-widest">
                            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                                <div>{{ $code }}</div>
                            @endforeach
                        </code>
                    </div>
                </div>
            @endif
            <div class="flex items-center space-x-2">
                @if(!empty(auth()->user()->two_factor_confirmed_at))
                    <form action="{{ route('two-factor.generate-recovery-codes') }}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit">Generate Recovery Codes</button>
                    </form>
                    <a href="{{ route('two-factor.show-recovery-codes') }}" class="btn btn-secondary mt-5">Show Recovery Codes</a>
                @endif
                <form action="{{ route('two-factor.disable') }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-error" type="submit">Disable 2FA</button>
                </form>
            </div>
        @else
            <div>
                <div class="alert alert-warning">You have not enabled two factor authentication.</div>
                <form action="{{ route('two-factor.enable') }}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit">Enable 2FA</button>
                </form>
            </div>
        @endif
    </section>
    <hr>
    <section>
        <div class="font-semibold text-lg mb-5">Change Password</div>
        <form action="{{ route('user-password.update') }}" method="post">
            @csrf
            @method('put')
            <div class="textbox-group">
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" id="current_password" @error('current_password') class="error-border" @enderror>
                @error('current_password')
                <span class="text-error">{{ $errors->first('current_password') }}</span>
                @enderror
            </div>
            <hr>
            <div class="textbox-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" @error('password') class="error-border" @enderror>
                @error('password')
                <span class="text-error">{{ $errors->first('password') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="password_confirmation">New Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" @error('password') class="error-border" @enderror>
                @error('password')
                <span class="text-error">{{ $errors->first('password') }}</span>
                @enderror
            </div>
            <div class="text-right">
                <button class="btn btn-primary" type="submit">Save Password</button>
            </div>
        </form>
    </section>
@endsection
