<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Test extends Controller {

    public  function  test() {
        $re = Db::name('page')->select();
        var_dump($re);die;
    }
}