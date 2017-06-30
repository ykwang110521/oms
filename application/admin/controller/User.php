<?php
namespace app\admin\controller;


use think\Session;

class User extends  Common {

    /**
     * @dashboard
     */
    public  function index() {
        return $this->fetch();
    }

    public function login() {
        $only_r = ['username','password'];
        $data = request()->only($only_r);

        if (empty($data['username']) || empty($data['password'])) {
            $this->resultJson(41001,[],'用户名或者密码为空');
        }

        $adm = model('Admin');
        $ar = $adm->where(['account'=>$data['username']])->field('id,password,akey')->find();

        if (!$ar) {
            $this->resultJson(41002,[],'用户名不正确');
        }

        $a_info = $ar->toArray();

        if (!$this->checkPassword($data['password'],$a_info['akey'],$a_info['password'])) {
            $this->resultJson(41003,[],'密码不正确');
        }

        $auth2 = model('MoudleOAuth2');
        $token = $auth2->login($a_info['id']);
        if ($token) {
            var_dump($token);die;
        }

        exit(json_encode(array('status' => 1, 'msg' => '登录成功', 'url' => url('admin/dashboard/index'))));
    }

    //密码的加密法，**注意此处必须是私密方法**
    private function encryptKey($str,$key){
        return md5(md5("$str").$key);
    }

    //检查密码是否正确
    private function checkPassword($password,$key,$encrypt_password) {
        $now_encrypt_password = $this -> encryptKey($password,$key);
        if($now_encrypt_password==$encrypt_password){
            return true;
        }else{
            return false;
        }
    }
}