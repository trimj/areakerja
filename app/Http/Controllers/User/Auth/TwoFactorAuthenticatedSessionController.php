<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\FailedTwoFactorLoginResponse;
use Laravel\Fortify\Contracts\TwoFactorChallengeViewResponse;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse;
use Laravel\Fortify\Events\RecoveryCodeReplaced;
use Laravel\Fortify\Http\Requests\TwoFactorLoginRequest;
use RealRashid\SweetAlert\Facades\Alert;

class TwoFactorAuthenticatedSessionController extends Controller
{
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function create(TwoFactorLoginRequest $request): TwoFactorChallengeViewResponse
    {
        if (!$request->hasChallengedUser()) {
            Alert::toast('Login First!', 'error');
            throw new HttpResponseException(redirect()->route('login'));
        }

        return app(TwoFactorChallengeViewResponse::class);
    }

    public function store(TwoFactorLoginRequest $request)
    {
        $user = $request->challengedUser();

        if ($code = $request->validRecoveryCode()) {
            $user->replaceRecoveryCode($code);

            event(new RecoveryCodeReplaced($user, $code));
        } elseif (!$request->hasValidCode()) {
            Alert::toast('Code Invalid!', 'error');
            return app(FailedTwoFactorLoginResponse::class)->toResponse($request);
        }

        $this->guard->login($user, $request->remember());

        $request->session()->regenerate();

        Alert::toast('Welcome, ' . Str::words(auth()->user()->name, 2, null), 'success');
        return app(TwoFactorLoginResponse::class);
    }
}
