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
$sub_domain = strstr(request()->host(),'.',true);

switch($sub_domain){
    case 'local':
        $moudle = 'index';
        Route::domain($sub_domain,$moudle);
        require_once($moudle.'/route.php');
        break;

    case 'admin':
        $moudle = 'admin';
        Route::domain($sub_domain,$moudle);
        include($moudle.'/route.php');
        break;
    default;
        break;
}
if($moudle){
    //定义MODULE_PATH
    define('MODULE_PATH',APP_PATH.$moudle.'/');
}

