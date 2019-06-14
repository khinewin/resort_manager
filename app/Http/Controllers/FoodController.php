<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class FoodController extends Controller
{
    public function getNewFood(){
        return view ('foods.new');
    }
    public function postNewFood(Request $request){
        $this->validate($request,[
           'item_name'=>'required',
           'price'=>'required',
            'image'=>'mimes:jpg,png,jpeg,gif'
        ]);
        $f=new Food();
        if($request->file('image')){
            $img_file=$request->file('image');
            $img_name=date('dmYhis').".".$img_file->getClientOriginalExtension();
            Storage::disk('foods')->put($img_name, File::get($img_file));
            $f->image=$img_name;
        }
        $f->item_name=$request['item_name'];
        $f->price=$request['price'];
        $f->user_id=Auth::user()->id;
        $f->save();
        return redirect()->back()->with('info', "New food item have been created.");
    }
    public function getFoodItems(){
        $foods=Food::get();
        return view ('foods.items')->with(['foods'=>$foods]);
    }
}
