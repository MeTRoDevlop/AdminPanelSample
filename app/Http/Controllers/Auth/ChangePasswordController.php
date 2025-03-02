<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        Gate::authorize('dashboard_password_edit');
        return view('auth.edit-password');
    }

    public function update(UpdatePasswordRequest $request)
    {
        $user = Auth::user();
        if (! Auth::guard('web')->validate([
            'email' => $user->email,
            'password' => $request->current_password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
        /*
        if ($request->current_password === $request->current_password) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
        */

        $user->password = Hash::make($request['password']);
        $user->save();

        return redirect()->route('profile.password.edit')->with('message', __('panel.change_password_success'));
    }
}
