<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Test extends  Controller {

    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public  function test() {
        //echo 'admin test';
        $template = '/dashboard/index';
        $this->fetch($template);
    }
}