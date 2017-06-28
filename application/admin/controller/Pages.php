<?php
namespace app\admin\controller;

use think\Controller;

class Pages extends  Controller {

    /**
     * @dashboard
     */
    public  function ChartJs() {
        $template = 'charts/chartjs';
        return $this->fetch($template);
    }
}