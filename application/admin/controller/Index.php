<?php
namespace app\admin\controller;

use think\Controller;

class Index extends  Common {

    /**
     * @dashboard
     */
    public  function index() {
        $template = 'user/index';
        return $this->fetch($template);
    }
}