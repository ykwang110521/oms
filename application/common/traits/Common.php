<?php
namespace app\common\traits;

trait Common {
//检查电话号码
    protected function checkMobileFormat($mobile){
        if(preg_match('/^1[34578]{1}\d{9}$/',$mobile)){
            return true;
        }else{
            return false;
        }
    }

    //检查密码格式,数字和字母组成
    protected function checkPasswordFormat($password){
        if(preg_match('/^(?=.*?[a-zA-Z])(?=.*?[0-9])[a-zA-Z0-9]{6,20}$/',$password)){
            return true;
        }else{
            return false;
        }
    }

    //生成随机字符串
    protected function randomStr($length=16,$type=0){
        switch((int)$type){
            case 1:     //数字和字母小写
                $chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                break;
            case 2:     //16进制数字符串
                $chars = '0123456789abcdef';
                break;
            default :   //数字和字母大小写
                $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
        }
        $max = strlen($chars)-1;
        $str = '';
        for($i=0;$i<$length;$i++){
            $str .= $chars[mt_rand(0,$max)];
        }
        return $str;
    }

    //第一个数组获取第二个数组指定的键和值
    protected function copyKeyValue(&$get_r,$copy_r,$key_r){
        foreach ($key_r as $_v) {
            $get_r[$_v] = $copy_r[$_v];
        }
    }

    //检查mac地址是否合法
    function checkMac($mac){
        $mac = trim(strtoupper(str_replace(':','',$mac)));
        $pattern = '/^[0-9A-F]{12}$/i';
        if(preg_match($pattern,$mac)){
            return rtrim(chunk_split($mac,2,':'),':');
        }else{
            return false;
        }
    }
}