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
            'lastname' => 'min:3|required',
            'email' => 'email|unique:users|required',
            'password' => 'required|confirmed|min:5',
            'ci' => 'numeric|required|min:6|unique:users',
            'phone' => 'numeric|unique:users',
        ]);

        $fileData = '';

        if($request->hasFile('photo') and ($request->photo->extension() == 'png' or $request->photo->extension() == 'jpg' or $request->photo->extension() == 'bmp')){
            $fileData = $request->file('photo')->store('uploads','public');
        }
        

        User::create([
            'name' =>  $request->name, //Str::slug(),
            'lastname' => $request->lastname,
            'photo' => $fileData,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'CI' => $request->ci,
            'phone' => $request->phone,
            'role' => 'cliente'
        ])>assignRole('cliente');

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('dashboard');
    }

}
