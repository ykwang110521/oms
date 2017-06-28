<?php
$root = request()->root();
define('__ROOT__',str_replace('/index.php','',$root));
return [
    // 应用调试模式
    'app_debug'              => false,
    // 视图
    'template'               => [
        'view_path'    => 'template/index/',
    ],
    // 视图输出字符串内容替换
    'view_replace_str'       => [
        '__PUBLIC__' => __ROOT__.'/template/index',
        '__COMMON__' => __ROOT__.'/static/common'
    ],
];