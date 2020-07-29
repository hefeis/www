<?php

namespace App\Http\Controllers\Mstore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RegController extends Controller
{
    //
    function add(){
        return view('mstore.reg');
    }
    function adddo(){
        $user_name=request()->post('user_name','');
        $password=request()->post('password','');
        $data=['form_params' => ['user_name'=>$user_name,'password'=>$password]];
        $url="http://api.com/user/reg";
        $client=new Client();
        $response = $client->request('post',$url,$data);
        $result=$response->getBody();
        $result=json_decode($result,true);
        if($result['error']==0){
            echo "<script>alert('注册成功');location.href='/mstore/login'</script>";
        }else{
            echo "<script>alert('注册失败');location.href='/mstore/reg'</script>";
        }
    }
}
