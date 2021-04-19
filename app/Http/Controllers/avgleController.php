<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class avgleController extends Controller
{
    public function index(Request $request){
        $key = $request->input('key');
        if($key == 'iloveyou'){
            $url = 'https://api.avgle.com/v1/videos/0?limit=10';
            $json_data = $this->getapi($url);
            $data = json_decode($json_data);
            return view('avgle', ['avgle' => $data->response->videos, 'key' => $key]);
        }else{
            return redirect('/');
        }
    }

    public function form($id, Request $request){
        $key = $request->input('key');
        if($key == 'iloveyou'){
            $url = 'https://api.avgle.com/v1/video/'.$id;
            $json_data = $this->getapi($url);
            $data = json_decode($json_data);
            return view('avgleform', ['data' => $data->response->video]);
        }else{
            return redirect('/');
        }
    }

    function getapi($url){

        $ch = curl_init();
        $useragent = array(
            'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)',
            'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2)',
            'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
            'Mozilla/5.0 (Windows; U; Windows NT 5.2) Gecko/2008070208 Firefox/3.0.1',
            'Opera/9.27 (Windows NT 5.2; U; zh-cn)',
            'Opera/8.0 (Macintosh; PPC Mac OS X; U; en)',
            'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.2.149.27 Safari/525.13 ',
            'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Version/3.1 Safari/525.13'
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Referer: https://avgle.com'));
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, array_rand($useragent));

        $data = curl_exec($ch);

        curl_close($ch);
        return $data;
    }
}
