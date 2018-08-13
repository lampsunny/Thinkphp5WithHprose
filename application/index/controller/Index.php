<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return '说明：index跟MyHprose是一组，用于展示传统手动方式调用Hprose服务，app/hprose/HproseServer和TestServer，TestClient是一组，用于展示TP5集成的方式';
    }

    public function hello()
    {
        $client = new \Hprose\Http\Client('http://hprosetest.me/index/My_Hprose/testserver', false);
        $result = $client->hello("China");
        return "result:".$result;
    }
}
