<?php

namespace app\index\model;
use think\Model;
class MyHprose extends Model
{
    //返回字符串
    public function func1()
    {
        return "this is model/MyHprose/func1()";
    }

    //返回数组
    public function func2()
    {
        return  ["name"=>"小明", "age"=>"25", "gender"=>"男", "score"=>60];
    }

    public function func3($num1, $num2)
    {
        return $num1 + $num2;
    }
}