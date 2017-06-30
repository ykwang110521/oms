<?php
$root = request()->root();
define('__ROOT__',str_replace('/index.php','',$root));
return array(
    'token' => [
        'access_token_lifetime' => 43200,
        'refresh_token_lifetime'=> 86400,
    ],
    // +----------------------------------------------------------------------
    // | Cookie设置
    // +----------------------------------------------------------------------
    'cookie'                 => [
        // cookie 名称前缀
        'prefix'    => 'jk75zcpe',
        // cookie 保存时间
        'expire'    => 0,
        // cookie 保存路径
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 启用安全传输
        'secure'    => false,
        // httponly设置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],
    // 应用调试模式
    'app_debug'              => false,
    // 视图输出字符串内容替换
    'view_replace_str'       => [
        '__PUBLIC__'        => __ROOT__.'/static/admin',
        '__SITE_TITLE__'    => 'OMS 管理系统',
    ],

);

