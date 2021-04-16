<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;

class houseController extends Controller
{
    public function index(){
        // $test = DB::table('test')->get();
        // $db = DB::connection('mysql');
        $house = DB::table('house')
                ->where('house_is_del', '=', 0)
                ->where('house_is_img', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(5);

        $temp = DB::table('house_img')->get();

        $pic = array();
        foreach($temp as $key => $value){
            $pic[$value->house_id][] = $value->house_img_name;
        }

        return view('welcome', ['house' => $house, 'pic' => $pic]);
    }

    public function update(){
        // $command = 'F: cd F:\python_demo\demo call python house.py';
        shell_exec('getHousePY.bat');
        // shell_exec($command);
        // $command = 'F: cd F:\python_demo\demo call python getHouseImg.py';
        // shell_exec($command);
    }
}
