<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['users'] = User::paginate();
        return view('user.user_index',$data);
    }

    public function create()
    {
        return view('user.user_create');
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
        ]);

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('user.user_edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'min:3|max:25|required',
            'lastname' => 'min:3|required',
            'email' => 'email|required',
            'ci' => 'numeric|required|min:6',
            'phone' => 'numeric',
        ]);

        if($request->email != $user->email){
            $this->validate($request,[
                'email' => 'unique:users',
            ]);
        }

        if($request->ci != $user->CI){
            $this->validate($request,[
                'ci' => 'unique:users',
            ]);
        }

        if($request->phone != $user->phone){
            $this->validate($request,[
                'phone' => 'unique:users',
            ]);
        }

        if($request->hasFile('photo') and ($request->photo->extension() == 'png' or $request->photo->extension() == 'jpg' or $request->photo->extension() == 'bmp')){
            Storage::delete('public/'.$user->photo); //Borra la foto que es reemplazada
            $fileData = $request->file('photo')->store('uploads','public');
        }

        $request = request()->except(['_token','_method']);
        $request['photo'] = $fileData;
        User::where('id','=',$user->id)->update($request);

        return redirect()->route('user.index');
    }
}
