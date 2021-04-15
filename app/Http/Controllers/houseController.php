<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;

class houseController extends Controller
{
    public function index(){
        // $db = DB::connection('mysql');
        $house = DB::table('house')
                ->where('house_is_del', '=', 0)
                ->where('house_is_img', '=', 1)
                ->orderBy('house_id', 'desc')
                ->paginate(5);
        // $house = $db->table('house')
        //            ->where('house_is_del', '=', 0)
        //            ->where('house_is_img', '=', 1)
        //            ->orderBy('price', 'asc')
        //            ->get()->paginate(15)->toArray();

        $temp = DB::table('house_img')->get();
        // $temp = $db->table('house_img')
                //   ->get()->toArray();


        $pic = array();
        foreach($temp as $key => $value){
            $pic[$value->house_id][] = $value->house_img_name;
        }

        return view('welcome', ['house' => $house, 'pic' => $pic]);
    }
}
