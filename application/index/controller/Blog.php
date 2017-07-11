<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Blog extends Controller
{
    public function index()
    {
        $template = "/blog/blog";
        return $this->fetch($template);
    }

    public function bloglist() {
        $list = Db::name('page p,category c')->where("c.id=p.cate_id")
            ->field('p.id,p.title,p.abstract,p.content,p.add_time,p.pic_url,c.name')->paginate(10);
        var_dump($list);
    }
}