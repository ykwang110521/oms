<?php
namespace app\index\controller;

use think\Controller;
class Blog extends Controller
{
    public function index()
    {
        $template = "/blog/blog";
        return $this->fetch($template);
    }
}