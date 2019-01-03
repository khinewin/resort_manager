<?php

namespace App\Http\Controllers;

use App\KtvRoom;
use Illuminate\Http\Request;


class KtvRoomController extends Controller
{
    public function getNewRoom(){
        return view ('ktv-room.new-room');
    }
    public function postNewRoom(Request $request){
        $this->validate($request,[
            'room_number'=>'required|unique:ktv_rooms',
            'room_type'=>'required',
            'hour_price'=>'required'
        ]);
        $r=new KtvRoom();
        $r->room_number=$request['room_number'];
        $r->room_type=$request['room_type'];
        $r->hour_price=$request['hour_price'];
        $r->save();
        return redirect()->back()->with('info', 'The new ktv room have been created.');

    }
    public function getAllRoom(){
        $rooms=KtvRoom::OrderBy('id', 'desc')->get();
        return view('ktv-room.all-room')->with(['rooms'=>$rooms]);
    }
    public function postRemoveRoom(Request $request){
        $id=$request['id'];
        $room=KtvRoom::where('id', $id)->first();
        $room->delete();
        return redirect()->back()->with('info', 'The selected ktv room have been removed.');
    }
    public function getEditRoom($id){
        $room=KtvRoom::where('id', $id)->first();
        return view ('ktv-room.edit-room')->with(['room'=>$room]);
    }
    public function postUpdateRoom(Request $request){
        $this->validate($request,[
            'room_number'=>'required',
            'room_type'=>'required',
            'hour_price'=>'required'
        ]);
        $r=KtvRoom::where('id', $request['id'])->first();
        $r->room_number=$request['room_number'];
        $r->room_type=$request['room_type'];
        $r->hour_price=$request['hour_price'];
        $r->update();
        return redirect()->back()->with('info', 'The selected ktv room have been updated.');
    }
}
