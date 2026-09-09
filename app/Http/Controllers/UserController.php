<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\AuthUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function registerForm()
    {
        return view('registerPage');
    }
    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->all());
        Auth::login($user);
        return redirect()->route('order');
        // return response()->json(['token'=>$user->createToken('api')->plainTextToken])->redirect()->route('index');
    }

    public function auth(AuthUserRequest $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('order');
            }
        }
        return back()->withErrors([
            'username' => 'Пользователь не найден'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function order()
    {
        return view('createOrder');
    }
    public function orders()
    {
        return view('orders');
    }
}
