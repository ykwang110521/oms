<?php
namespace app\index\controller;

use think\Request;

class Error extends Common
{
    public function index(Request $request)
    {
        $param= $request->controller();
        return $this->errorFetch($param);
    }

    protected function errorFetch($param)
    {
        $template = "public/404";
        return $this->fetch($template);
    }
}