<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Common extends  Controller {


    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    protected function resultJson($code=1,$data=array(),$msg='') {
        $this->result($data,$code,$msg,'json');
    }
}