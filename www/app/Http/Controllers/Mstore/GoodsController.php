<?php

namespace App\Http\Controllers\Mstore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GoodsController extends Controller
{
    //
    function goods($goods_id){
        $client=new Client();
        $url="http://api.com/user/goods?goods_id=".$goods_id;
        $response = $client->request('get',$url);
        $result=$response->getBody();
        $result=json_decode($result,true);
//        dd($result);
        return view('mstore.',['result'=>$result]);
    }
}
