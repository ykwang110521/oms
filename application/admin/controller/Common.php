<?php
namespace app\admin\controller;

use think\Controller;
use think\Cookie;
use think\Request;

class Common extends  Controller {


    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    protected function resultJson($code=1,$data=array(),$msg='') {
        $this->result($data,$code,$msg,'json');
    }

    protected function checkLogin() {
        $this->aid = Cookie::get('aid','oms_');
        if (!$this->aid) {
            $this->redirect('/admin');
        }

        $oauth2 = model('MoudleOAuth2');
        $result = $oauth2->checkLogin($this->aid);
        if ($result > 0) {

        }elseif ($result == -1) {
            $this->resultJson(41101,[],'登录token错误');
        } elseif ($result == -2) {
            $this->resultJson(41102,[],'登录刷新token错误');
        } elseif ($result == -3) {
            $this->resultJson(41102,[],'登录过期');
        } else {
            $this->resultJson(41104,[],'其他错误');
        }
    }

    protected function adminInfo() {
        $this->aid = Cookie::get('aid','oms_');
        if (!$this->aid) {
            $this->redirect('/admin/user');
        }
        $admin = model('Admin');
        $res = $admin->field('id,account,admin_name')->where("id={$this->aid}")->find();
        if (!$res) {
            $this->resultJson(41105,[],'账号不存在');
        }
        return $res;
    }
}