<?php
namespace app\admin\controller;

use think\Controller;

class Index extends  Controller {

    /**
     * @dashboard
     */
    public  function index() {
        $template = 'dashboard/index';
        return $this->fetch($template);
    }
}