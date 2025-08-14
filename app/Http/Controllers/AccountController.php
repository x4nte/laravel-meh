<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function updateEmail(UpdateEmailRequest $request)
    {
        $user = auth()->user();
        $user->email = $request->validated()['email'];
        $user->save();

        return back()->with('success', 'Email успешно обновлён');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Неверный текущий пароль.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Пароль успешно обновлён');
    }
}
