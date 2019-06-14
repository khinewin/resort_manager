<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Config;
use App\Food;
use App\Ktvreport;
use App\KtvRoom;
use App\Saleitem;
use Auth;
use Carbon\Carbon;
use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Facades\Session;

class KtvCheckController extends Controller
{
    public function decreaseOne($id){
        $s=Saleitem::whereId($id)->firstOrFail();
        if($s->qty <=2){
            $s->delete();
        }else{
            $s->decrement('qty');
            $s->update();
        }
        return redirect()->back();
    }
    public function increaseOne($id){
        $s=Saleitem::whereId($id)->firstOrFail();
        $s->increment('qty');
        $s->update();
        return redirect()->back();
    }
    public function removeOne($id){
        $s=Saleitem::whereId($id)->firstOrFail();
        $s->delete();
        return redirect()->back();
    }

    public function checkoutVas($room_id){
       foreach (Session::get('vas_cart')->items as $c){
           $v=new Saleitem();
           $v->ktvroom_id=$room_id;
           $v->amount=$c['amount'];
           $v->qty=$c['qty'];
           $v->item_name=$c['item']['item_name'];
           $v->price=$c['item']['price'];
           $v->sale_from="ktv";
           $v->save();
       }
       Session::forget('vas_cart');
       return redirect()->back();
    }
    public function removeItem($id){
        $oldCart=Session::get('vas_cart');
        $cart=new Cart($oldCart);
        $cart->remove($id);
        if(count($cart->items) <=0){
            Session::forget('vas_cart');
        }else{
            Session::put('vas_cart', $cart);
        }
        return redirect()->back();
    }
    public function increaseCart($id){
        $oldCart=Session::get('vas_cart');
        $cart=new Cart($oldCart);
        $cart->increaseOne($id);
        Session::put('vas_cart', $cart);
       return redirect()->back();
    }
    public function decreaseCart($id){
        $oldCart=Session::get('vas_cart');
        $cart=new Cart($oldCart);
        $cart->decreaseOne($id);
        if(count($cart->items) <=0){
            Session::forget('vas_cart');
        }else{
            Session::put('vas_cart', $cart);
        }
       return redirect()->back();

    }
    public function addCart($id){
        $f=Food::whereId($id)->firstOrFail();
        $oldCart=Session::has('vas_cart') ? Session::get('vas_cart') : null;
        $cart=new Cart($oldCart);
        $cart->add($f, $f->id);
        Session::put('vas_cart', $cart);
        return redirect()->back();
    }
    public function getAddVas($id){
        $room=KtvRoom::where('id', $id)->firstOrFail();
        $foods=Food::get();
        $sale_items=Saleitem::where('ktvroom_id', $id)->get();
       return view ('ktv-room.vas')->with(['room'=>$room, 'foods'=>$foods, 'sale_items'=>$sale_items]);


    }
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

        return redirect("/admin/ktv/print/$checking->id");

    }
    public function getPrint($id){
        $config=Config::where('id', 1)->first();
        $chs=Ktvreport::where('id', $id)->first();
        return view ('ktv-room.print')->with(['cks'=>$chs])->with(['config'=>$config]);
    }
}
