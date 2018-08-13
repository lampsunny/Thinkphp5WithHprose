<?php
//参照了https://www.kancloud.cn/song123/aaaaaa/75823 的思想
namespace app\hprose\controller;

use Hprose\Http\Server;

class HproseServer
{
    protected $server = null;
    protected $crossDomain =    true;
    protected $P3P         =    true;
    protected $debug       =    true;

    public function __construct()
    {
        $this->server = new Server();
        $this->server->addInstanceMethods($this);
        $this->server->debug = $this->debug;
        $this->server->P3P = $this->P3P;
        $this->server->crossDomain = $this->crossDomain;
    }

    //启动
    public function start()
    {
        $this->server->start();
    }
}