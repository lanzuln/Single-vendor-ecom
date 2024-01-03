<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterCustomer;

class RegisterController extends Controller {
    public function customerLoginpage() {
        return view('frontend.page.auth.login');

    }
    public function customerRegisterpage() {
        return view('frontend.page.auth.register');

    }
    public function customerRegister(RegisterCustomer $request) {

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->route('customer.dashboard');
        }

    }
    public function customerLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credential, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('customer.dashboard');
        }
        return back()->withErrors([
            'email'=>'wrong Credentials found'
        ])->onlyInput('email');

    }

}
