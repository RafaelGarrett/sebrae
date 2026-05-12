<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        $request->validated();
        $authenticated = Auth::attempt($request->only('email', 'password'));

        if (!$authenticated) {
            return redirect()->route('login')->withErrors(['error' => 'Credenciais inválidas.']);
        }

        return redirect()->route('customers.index')->with('success', 'Login realizado com sucesso!');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout realizado com sucesso!');
    }
}
