<?php

namespace App\Http\Controllers;


use App\Ktvreport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReports(){
        $today=date("Y-m-d");
        $rps=Ktvreport::Where('check_in', 'LIKE', "%$today%")->OrderBy('id', 'desc')->get();
        return view ('ktv-room.reports')->with(['rps'=>$rps])->with(['today'=>$today])
            ->with(['month'=>null]);
    }
    public function getByDate(Request $request){
        $today=$request['d'];
        $rps=Ktvreport::Where('check_in', 'LIKE', "%$today%")->OrderBy('id', 'desc')->get();
        return view ('ktv-room.reports')->with(['rps'=>$rps])->with(['today'=>$today])
            ->with(['month'=>null]);
    }
    public function getByMonth(Request $request){
        $month=$request['m'];
        $rps=Ktvreport::Where('check_in', 'LIKE', "%$month%")->OrderBy('id', 'desc')->get();
        return view ('ktv-room.reports')->with(['rps'=>$rps])->with(['month'=>$month])
            ->with(['today'=>null]);
    }
}
