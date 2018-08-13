<?php
namespace app\index\controller;

use app\hprose\controller\HproseServer;

class TestServer extends HproseServer
{
    protected $model = null;
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\index\model\MyHprose();
    }
    
    public function func1()
    {
        //echo "这是一句错误的调用方式";    //由于Hprose是采用序列化&反序列化机制，任何类似echo 的直接输出语句都属于错误的调用。不会有任何实际输出
        return  $this->model->func1();
    }
    
    public function func2()
    {
        return  $this->model->func2();
    }

    public function func3($num1, $num2)
    {
        return  $this->model->func3($num1, $num2);
    }
}