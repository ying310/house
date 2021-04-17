<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

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

    public function testdownload(){
        $url = 'https://www.youtube.com/watch?v=JhIan9zvuyE';
        shell_exec('python3 youtube.py '.$url);
        sleep(5);
        $filedir = public_path()."/mp4";
        $file=scandir($filedir);
        if(isset($file[2]) && $file[2]){
            $filepath = str_replace('/var/www/house', '', $file[2]);
            return Response::download('mp4/'.$filepath, $file[2]);
        }else{
            print_r('No song');
        }
    }

}
