<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function getWelcome(){
        if(Auth::User()){
            return redirect()->route('dashboard');
        }else{
            $config=Config::where('id', 1)->first();
            return view ('welcome')->with(['config'=>$config]);
        }

    }
    public function postLogin(Request $request){
        $this->validate($request,[
           'name'=>'required|exists:users',
           'password'=>'required'
        ]);
        if(Auth::Attempt(['name'=>$request['name'],'password'=>$request['password']])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('err', "The username or password is invalid.");
        }
    }
}
