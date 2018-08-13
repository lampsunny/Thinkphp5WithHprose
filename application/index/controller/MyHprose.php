<?php
namespace app\index\controller;

use Hprose\Http\Server;


class MyHprose
{
    public function index()
    {
        return "index of MyHprose";
    }

    function hello($name="world") {
        return "Hello $name!";
    }

    //启动服务
    public function testserver()
    {
        $server = new Server();
        $server->addInstanceMethods($this);
        $server->debug = true;
        $server->crossDomain = true;
        $server->start();
    }

}

    
