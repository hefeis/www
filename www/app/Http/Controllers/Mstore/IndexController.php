<?php

namespace App\Http\Controllers\Mstore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IndexController extends Controller
{
    //
    function index(){
        $client=new Client();
        $url="http://api.com/user/index";
        $response = $client->request('get',$url);
        $result=$response->getBody();
        $result=json_decode($result,true);
//        dd($result);
        return view('mstore.index',['result'=>$result]);
    }
}
