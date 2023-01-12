<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Laravel\Fortify\Contracts\RecoveryCodesGeneratedResponse;
use RealRashid\SweetAlert\Facades\Alert;

class RecoveryCodeController extends Controller
{
    public function store(Request $request, GenerateNewRecoveryCodes $generate)
    {
        $generate($request->user());

        $codes = null;
        foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code) {
            $codes .= '<div>' . $code . '</div>';
        }

        Alert::html('Recovery Code', '<code>' . $codes . '</code>')->autoClose(60000);
        return app(RecoveryCodesGeneratedResponse::class);
    }

    public function show()
    {
        $codes = null;
        foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code) {
            $codes .= '<div>' . $code . '</div>';
        }

        Alert::html('Recovery Code', '<code>' . $codes . '</code>')->autoClose(60000);
        return redirect()->route('member.security');
    }
}
