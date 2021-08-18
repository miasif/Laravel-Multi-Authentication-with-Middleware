<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  Illuminate\Validation\Validator;


class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('auth.passwords.change');
    }

    public function changepassword(Request $request)
    {
        //     $val =$request->validate([
        //      'oldpassword' => 'requried',
        //      'password' => 'required|confirmed'
        //  ]);
        //  $this->validate($request,[
        //      'oldpassword' => 'requried|string',
        //      'password' => 'required|confirmed'
        //  ]);


        $hasedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hasedPassword ))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('successMsg',"Password is change Successfully");

        }
        else
        {
            return redirect()->back()->with('errMsg',"Current Password is Invalid");

        }

    }
}
