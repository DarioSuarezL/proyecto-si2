<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'min:3|max:25|required',
            'email' => 'email|unique:users|required',
            'password' => 'required|confirmed|min:5',
            'ci' => 'numeric|required|min:6',
            'phone' => 'numeric',
        ]);

        User::create([
            'name' =>  $request->name, //Str::slug(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'CI' => $request->ci,
            'phone' => $request->phone,
        ]);

    }

}
