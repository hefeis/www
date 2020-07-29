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
        if(request()->isMethod('post')){
            $enpub_data=request()->post('enpub_data');
            $sign=request()->post('sign');
            $content=file_get_contents(storage_path('key/priv.key'));
            $content2=file_get_contents(storage_path('key/pub.api.key'));
            $key=openssl_get_privatekey($content);
            $key2=openssl_get_publickey($content2);
            $response=openssl_verify($enpub_data,$sign,$key2);
            echo "签名: ".$response;echo '<hr>';
            $enpub_data=base64_decode($enpub_data);
            openssl_private_decrypt($enpub_data,$depri_data,$key);
            echo "api解密后  ".$depri_data;
            die;
        }
        if(request()->isMethod('get')){
            $data="饿了才吃饭呀";
            $content=file_get_contents(storage_path('key/pub.api.key'));
            $key=openssl_get_publickey($content);
            openssl_public_encrypt($data,$enpub_data,$key);
            $enpub_data=base64_encode($enpub_data);
            $key2="1911php";
            $sign=md5($key2.$enpub_data);
            echo "www解密前:  ".$enpub_data;
            echo '<hr>';
            $url="http://api.com/vx/aes2";
            $data=['form_params' => ['enpub_data'=>$enpub_data,'sign'=>$sign]];
            $client=new Client();
            $response = $client->request('post',$url,$data);
            $result=$response->getBody();
            echo "www解密后  ".$result;echo '<hr>';
        }


    }
        function header1(){
            echo 1;
        }
        function  alipay(){
        //请求参数
            $param1=[
              'out_trade_no'   =>time().'456789876',
              'product_code'   =>'FAST_INSTANT_TRADE_PAY',
              'total_amount'   =>1000.00,
              'subject'   =>'Amani'
            ];
        //公共参数
            $param2=[
                'app_id' =>'2021000117603552',
                'method' =>'alipay.trade.page.pay',
                'charset' =>'utf-8',
                'sign_type' =>'RSA2',
                'timestamp' =>date('Y-m-d H:i:s'),
                'version' =>'1.0',
                'return_url'=>'http://hefei.phpclub.icu/alipay/return',
                'notify_url'=>'http://hefei.phpclub.icualipay/notify',
                'biz_content' =>json_encode($param1),
            ];
            ksort($param2);
            $str="";
            foreach($param2 as $key=>$val){
                $str.= $key.'='.$val.'&';
            }
            $str=rtrim($str,'&');
            $sign=$this->sign($str);
            $url="https://openapi.alipaydev.com/gateway.do?".$str.'&sign='.urlencode($sign);
            return redirect($url);
        }
        function sign($data){
            $content=file_get_contents(storage_path('key/priv.key'));
            $key=openssl_get_privatekey($content);
            openssl_sign($data,$sign,$key,OPENSSL_ALGO_SHA256);
            openssl_free_key($key);
            $sign=base64_encode($sign);
            return $sign;
        }
        function alipay_return(){

        }
        function alipay_notify(){

        }
}
