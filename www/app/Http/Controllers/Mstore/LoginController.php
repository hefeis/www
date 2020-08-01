<?php

namespace App\Http\Controllers\Mstore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;

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
        if($result['data']['token']){
            $token=$result['data']['token'];
            cookie('token',$token);
            return redirect('/mstore/index?token='.$token);
        }else{
            return $result;
        }


    }
}
