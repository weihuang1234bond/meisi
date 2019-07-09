<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        // 发送者的id
        $from_id = input('from_id');
        // 接收者的id
        $to_id = input('to_id');
        // 渲染模板变量
        return view('index',[
            'from_id'  => $from_id,
            'to_id' => $to_id,
        ]);
    }
}
