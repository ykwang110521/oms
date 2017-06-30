<?php
namespace app\admin\controller;


class Dashboard extends  Common {

    /**
     * @dashboard
     */
    public  function index() {
        $admin_info = $this->adminInfo();
        $template = 'dashboard/index';
        if (empty($admin_info)) {
            $this->redirect('admin/user');
        }
        $this->assign('admin_info',$admin_info);

        return $this->fetch($template);
    }
}