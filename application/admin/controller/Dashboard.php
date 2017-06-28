<?php
namespace app\admin\controller;


class Dashboard extends  Common {

    /**
     * @dashboard
     */
    public  function index() {
        $template = 'dashboard/index';
        return $this->fetch($template);
    }
}