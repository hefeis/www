<?php

namespace App\Http\Controllers\Vx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class TextController extends Controller
{
    //
    function token(){
        $appid="wxb43a67ebe1bd2a26";
        $secret="8ca5384405b188d4a4f9aa2462f0078e";
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
        $result=file_get_contents($url);
        dd($result);
    }
    function token2(){
        $appid="wxb43a67ebe1bd2a26";
        $secret="8ca5384405b188d4a4f9aa2462f0078e";
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        dd($result);

    }
    function  token3(){
        $appid="wxb43a67ebe1bd2a26";
        $secret="8ca5384405b188d4a4f9aa2462f0078e";
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
        $client=new Client();
        $response = $client->request('get',$url);
        $result=$response->getBody();
        echo $result;
    }
    function test(){
        $url="http://api.com/vx/test";
        $str=Str::random(32);
        $response=file_get_contents($url);
        var_dump($response);
    }
    function aes1(){
        $enaes_data=request()->post('enaes_data');
        $method="AES-128-CBC";
        $key="1911php";
        $iv="1111111111111111";
        $data=base64_decode($enaes_data);
        $deaes_data=openssl_decrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
        echo $deaes_data;
    }
    function aes2(){
        $enpub_data=request()->post('enpub_data');
        $content=file_get_contents(storage_path('key/priv.key'));
        $key=openssl_get_privatekey($content);
        $enpub_data=base64_decode($enpub_data);
        openssl_private_decrypt($enpub_data,$depri_data,$key);
        echo $depri_data;
    }
}
