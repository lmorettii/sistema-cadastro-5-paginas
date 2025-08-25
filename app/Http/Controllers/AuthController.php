<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:100',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        return redirect()->route('auth.logged');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()->withErrors(['email' => 'Credenciais inválidas.'])->withInput();
        }

        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        return redirect()->route('auth.logged');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('auth.login');
    }

    public function showForgot()
    {
        // Redireciona para a página de edição conforme pedido
        return redirect()->route('auth.edit');
    }

    public function showEdit()
    {
        return view('auth.edit');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'name' => 'nullable|string|min:2|max:100',
            'password' => 'nullable|string|min:6|max:100',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'E-mail não cadastrado.'])->withInput();
        }

        if (!empty($validated['name'])) {
            $user->name = $validated['name'];
        }
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        // Mantém sessão se já estiver logado
        if (Session::get('user_id') === $user->id) {
            Session::put('user_name', $user->name);
        }

        return redirect()->route('auth.login')->with('status', 'Dados atualizados! Faça login novamente.');
    }

    public function logged()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('auth.login');
        }

        return view('auth.logged', ['name' => Session::get('user_name')]);
    }
}
