<?php
namespace app\index\controller;

use think\Controller;
class Portfolio extends Controller
{
    public function index()
    {
        $template = "/portfolio/portfolio";
        return $this->fetch($template);
    }
}