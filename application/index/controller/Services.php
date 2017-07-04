<?php
namespace app\index\controller;

use think\Controller;
class Services extends Controller
{
    public function index()
    {
        $template = "/services/services";
        return $this->fetch($template);
    }
}