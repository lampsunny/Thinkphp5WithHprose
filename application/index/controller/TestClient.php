<?php
namespace app\index\controller;

class TestClient
{
    protected $domain = "http://hprosetest.me/";//项目域名，根据具体情况修改

    public function index() //普通方法
    {
        return "index";
    }

    //同步方式调用
    public function func1()
    {
        $client = new \Hprose\Http\Client($this->domain.'index/Test_Server/start', false);//[项目名]/[控制器名]/start 启动服务，false表示同步方式调用
        $result = $client->func1();//调用server的方法
        dump($result);
    }

    //同步方式调用数组结果
    public function func2()
    {
        $client = new \Hprose\Http\Client($this->domain.'index/Test_Server/start', false);
        $result = $client->func2();
        dump($result);
    }

    //异步方式调用，返回的结果为promise对象，使用then方法处理回调
    public function func3()
    {
        $client = new \Hprose\Http\Client($this->domain.'index/Test_Server/start', true);
        $client->func3(1, 2)->then(function($result) use ($client){
                return $client->func3($result, 3);
            })->then(function($result) use ($client){
                return $client->func3($result, 4);
            })->then(function($result){
                var_dump($result);
            });
    }

    //简化的异步调用方式
    public function simple_func3()
    {
        $client = new \Hprose\Http\Client($this->domain.'index/Test_Server/start', true);
        $func3 = $client->func3;
        $var_dump = \Hprose\Future\wrap('var_dump');    //这里必须使用wrap包装后的var_dump
        $var_dump($func3($func3($func3(1, 2), 3), 4));
    }
}