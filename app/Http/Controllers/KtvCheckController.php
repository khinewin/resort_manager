<?php

namespace App\Http\Controllers;

use App\Ktvreport;
use App\KtvRoom;
use Auth;
use Carbon\Carbon;
use function GuzzleHttp\Psr7\str;

class KtvCheckController extends Controller
{
    public function getCheckIn($id){
        $current = Carbon::now();
        $room=KtvRoom::where('id', $id)->first();

        $user_id=Auth::user()->id;
        $check=new Ktvreport();
        $check->user_id=$user_id;
        $check->ktvroom_id=$room->id;
        $check->check_in=$current;
        $check->check_out=null;
        $check->room_price=$room->hour_price;
        $check->save();

        $room->status=1;
        $room->check_in_id=$check->id;
        $room->update();
        return redirect()->back();
    }
    public function getCheckOut($id){
        $current = Carbon::now();
        $room=KtvRoom::where('id', $id)->first();
        $check_in_id=$room->check_in_id;

        $checking=Ktvreport::where('id', $check_in_id)->first();
        $pre_price=$checking->room_price/60;

        $ck_in=strtotime($checking->check_in);
        $ck_out=strtotime($current);
        $t=$ck_out-$ck_in;
        $minutes=floor($t / 60);

        $checking->amount=$minutes*$pre_price;
        $checking->check_out=$current;
        $checking->status=1;
        $checking->update();

        $room->status=null;
        $room->check_in_id=null;
        $room->update();

        return redirect("/ktv/print/$checking->id");

    }
    public function getPrint($id){
        $chs=Ktvreport::where('id', $id)->first();
        return view ('ktv-room.print')->with(['cks'=>$chs]);
    }
}
