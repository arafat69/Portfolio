<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function show()
    {
        $users = User::orderBy('id','desc')->get();
        return view('backend.user',['user'=>$users]);
    }

    public function index(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $request->session()->flash('message','Registration Successfully !');
        return redirect()->route('user');
    }

    public function login(Request $request)
    {
       $this->validate($request,[
           'email'    => 'required|email',
           'password' => 'required'
       ]);

       $user = User::where('email',$request->email)->first();
       if ($user) {
        if (Hash::check($request->password,$user->password)) {
            $request->session()->put('username', $user->name);
            $request->session()->put('user', $user->id);
            session()->flash('message','Login successfull');
            return redirect()->route('home');
        }else {
            session()->flash('msg','Incorrect  Password');
            return redirect()->route('login');
        }
       }else{
        session()->flash('msg','Incorrect  Email Address');
        return redirect()->route('login');
       }

    }

    public function destroy($id)
    {
        User::destroy($id);
        session()->flash('message','Delete Successfull');
           return redirect()->route('user');
    }
}
