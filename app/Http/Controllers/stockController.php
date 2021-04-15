<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class stockController extends Controller
{
    public function index(){
        $db = DB::connection('mysql');
        $temp = $db->table('stock_amount')
                ->where('stock_amount_type', '!=', 16)
                ->where('stock_amount_type', '!=', 17)
                ->get()->toArray();

        foreach( $temp as $key => $val){
            if($val->stock_amount_type <= 8){
                if(!isset($data[$val->stock_num][$val->stock_date]['less'])){
                    $data[$val->stock_num][$val->stock_date]['less'] = $val->stock_quity_proportion;
                }else{
                    $data[$val->stock_num][$val->stock_date]['less'] += $val->stock_quity_proportion;
                }
            }elseif($val->stock_amount_type >= 12){
                if(!isset($data[$val->stock_num][$val->stock_date]['more'])){
                    $data[$val->stock_num][$val->stock_date]['more'] = $val->stock_quity_proportion;
                }else{
                    $data[$val->stock_num][$val->stock_date]['more'] += $val->stock_quity_proportion;
                }
            }
        }

        $rs = array();
        foreach($data as $stock_num => $value){
            $first_less = 0;
            $first_more = 0;
            $last_less = 0;
            $last_more = 0;
            $k = 0;
            foreach($value as $key => $val){
                if($k == 0){
                    $first_less = $val['less'];
                    $first_more = $val['more'];
                }else{
                    // $moreabs = $val['more'] - $first_more;
                    // $lessabs =
                    if((($val['more'] - $first_more) > 0) && (($val['less'] - $first_less) < 0)){
                        $rs[] = $stock_num;
                    }
                }
                $k++;
            }
        }

        $temp = $db->table('stock')->get()->toArray();
        $stock = array();
        foreach($temp as $key => $value){
            $stock[$value->stock_num] = $value->stock_name;
        }

        $temp = $db->table('stock_amount')->whereIn('stock_num', $rs)->where('stock_amount_type', '!=', 16)
        ->where('stock_amount_type', '!=', 17)->get()->toArray();
        // print_r($temp);

        $result = array();
        foreach($temp as $key => $value){
            $result[$value->stock_num][$value->stock_date][$value->stock_amount_type]['stock_quity'] = $value->stock_quity;
            $result[$value->stock_num][$value->stock_date][$value->stock_amount_type]['stock_quity_proportion'] = $value->stock_quity_proportion;
        }

        $da = array();
        foreach($result as $stock_num => $value){
            foreach($value as $stock_date => $val){
                for($i = 1; $i <= 15; $i++){
                    if(isset($da[$stock_num][$i]['stock_quity'])){
                        $da[$stock_num][$i]['stock_quity'] = $val[$i]['stock_quity'] - $da[$stock_num][$i]['stock_quity'];
                    }else{
                        $da[$stock_num][$i]['stock_quity'] = $val[$i]['stock_quity'];
                    }
                    if(isset($da[$stock_num][$i]['stock_quity_proportion'])){
                        $da[$stock_num][$i]['stock_quity_proportion'] = $val[$i]['stock_quity_proportion'] - $da[$stock_num][$i]['stock_quity_proportion'];
                    }else{
                        $da[$stock_num][$i]['stock_quity_proportion'] = $val[$i]['stock_quity_proportion'];
                    }
                }
            }
        }
        foreach($da as $stock_num => $value){
            if(isset($stock[$stock_num])){
                echo '<pre>'. $stock_num . ' : ' . $stock[$stock_num] . ' ';
                for($i = 1; $i <= 15; $i++){
                    echo  $value[$i]['stock_quity'] . ', ';
                }
                echo '</pre>';
                echo '<pre>'. $stock_num . ' : ' . $stock[$stock_num] . ' ';
                for($i = 1; $i <= 15; $i++){
                    echo  $value[$i]['stock_quity_proportion'] . ', ';
                }
                echo '</pre>';
            }
        }
    }
}
