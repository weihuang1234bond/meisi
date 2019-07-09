<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

Route::domain('*','/');

Route::rule('share/:id','/share/share/number/:id');     //分享
Route::rule('/:id','/homepage/index/uid/:id');          //会员主页
#Route::rule('/cpa','/ad_union/index/type/cpa','get|post',['ext'=>'do|php']);
#Route::rule('/cps','/ad_union/index/type/cps','get|post',['ext'=>'do|php']);
Route::alias('cpa'.'.'.'php','/ad_union/cpa');
Route::alias('cps'.'.'.'php','/ad_union/cps');


return [
    '__pattern__' => [
        'name' => '\w+',
        'id'=>'\d+'
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
