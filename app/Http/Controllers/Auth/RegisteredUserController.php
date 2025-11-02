<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view("pages.auth.register");
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $user = User::create([
            "name"=> $validatedData['name'],
            "email"=> $validatedData['email'],
            "password"=> Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect()->route("todos.index");
    }
}
