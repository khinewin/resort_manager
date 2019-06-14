<?php

namespace App\Http\Controllers;


use App\Config;
use App\KtvRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function postUpdateConfig(Request $request){
        $t=$request['title'];
        $config=Config::where('id', 1)->first();

        if($request->file('logo')){
            unlink(public_path()."/cfg/$config->logo");
            $logo_name=date("d-m-y-h-i-s").'.'.$request->file('logo')->getClientOriginalExtension();
            $logo_file=$request->file('logo');
            $config->logo=$logo_name;
            $config->title=$t;
            Storage::disk('cfg')->put($logo_name, File::get($logo_file));

        }

            $config->title=$t;
            $config->address=$request['address'];
            $config->phone=$request['phone'];



        $config->update();

        return redirect()->back()->with('info', 'Application config have been updated.');

    }
    public function getConfig(){
        $config=Config::where('id', 1)->first();
        return view ('admin.config')->with(['config'=>$config]);
    }
    public function getDashboard(){
        $ktv_rooms=KtvRoom::OrderBy('id', 'desc')->get();
        return view ('admin.dashboard')->with(['ktv_rooms'=>$ktv_rooms]);
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

        return redirect()->back()->with('info', "The selected user account have been updated.");

    }
    public function postRemoveUser(Request $request){
        $id=$request['id'];
        $user=User::where('id', $id)->first();
        $user->delete();
        return redirect()->back()->with('info', 'The user account have been removed.');

    }
    public function getProfile(){
        return view ('admin.profile');
    }
    public function postUpdatePassword(Request $request){
      $this->validate($request,[
           'current_password'=>'required',
           'new_password'=>'required',
           'new_password_confirm'=>'required|same:new_password'
        ]);
        if(!Hash::check($request['current_password'], Auth::User()->password)){
            return redirect()->back()->with('current_pass_err', "The current password is invalid.");
        }else{
            $user=Auth::User();
            $user->password=bcrypt($request['new_password']);
            $user->update();
            return redirect()->back()->with('info', 'Your password have been updated.');
        }


    }
}
