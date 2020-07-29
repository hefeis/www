<?php

namespace App\Http\Controllers\Mstore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    //
    function add(){
        return view('mstore.login');
    }
    function adddo(){
        $user_name=request()->post('user_name','');
        $password=request()->post('password','');
        $data=['form_params' => ['user_name'=>$user_name,'password'=>$password]];
        $url="http://api.com/user/login";
        $client=new Client();
        $response = $client->request('post',$url,$data);
        $result=$response->getBody();
        $result=json_decode($result,true);
        dd($result);
    }
}
