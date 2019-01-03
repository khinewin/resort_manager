<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;

class AdminController extends Controller
{
    public function getDashboard(){
        return view ('admin.dashboard');
    }
    public function getUsers(){
        $users=User::OrderBy('id', 'desc')->get();
        return view ('admin.users')->with(['users'=>$users]);
    }
    public function getNewUser(){
        $roles=Role::all();
        return view('admin.new-user')->with(['roles'=>$roles]);
    }
    public function postNewUser(Request $request){
        $this->validate($request,[
           'name'=>'required|unique:users',
           'email'=>'required|email',
           'phone'=>'required',
           'role'=>'required',
           'password'=>'required',
           'password_confirm'=>'required|same:password'
        ]);
        $user=new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->phone=$request['phone'];
        $user->password=bcrypt($request['password']);
        $user->save();
        $user->syncRoles($request['role']);
        return redirect()->route('user.new')->with('info','The user account have been created.');
    }
    public function getEditUser($id){
        $roles=Role::all();
        $user=User::where('id', $id)->first();
        return view ('admin.edit-user')->with(['user'=>$user])->with(['roles'=>$roles]);
    }
    public function postUpdateUser(Request $request){
        $user=User::where('id', $request['id'])->first();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->phone=$request['phone'];
        if($request['password']){
            $this->validate($request,[
                'password_confirm'=>'same:password'
            ]);

            $user->password=bcrypt($request['password']);

        }
        $user->update();

        $user->syncRoles($request['role']);

        return redirect()->route('users')->with('info', "The user account have been updated.");

    }
    public function postRemoveUser(Request $request){
        $id=$request['id'];
        $user=User::where('id', $id)->first();
        $user->delete();
        return redirect()->back()->with('info', 'The user account have been removed.');

    }
}
