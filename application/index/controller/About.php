<?php
namespace app\index\controller;

use think\Controller;
class About extends Controller
{
    public function index()
    {
        $template = "/about/about";
        return $this->fetch($template);
    }
}