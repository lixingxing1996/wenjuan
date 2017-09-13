<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;

class Base extends Controller
{

    protected function _initialize()
    {
        parent::_initialize();

        $this->checkAuth();
    }
    /**
     * 权限检查
     * @return bool
     */
    protected function checkAuth()
    {
        // 判断session是否存在id
        if (!Session::has('admin_id')) {
            $this->redirect('admin/login/index');
        }

        // $module     = $this->request->module();
        // $controller = $this->request->controller();
        // $action     = $this->request->action();

        // // 排除权限（只有在超级管理员下，才能访问）
        // $not_check = ['', 'admin/AuthGroup/getjson', 'admin/System/clear'];
        // // 这里超级管理员id是1
        // if (!in_array($module . '/' . $controller . '/' . $action, $not_check)) {
        //     $auth     = new Auth();
        //     $admin_id = Session::get('admin_id');
        //     if (!$auth->check($module . '/' . $controller . '/' . $action, $admin_id) && $admin_id != 1) {
        //         $this->error('没有权限');
        //     }
        // }
    }




    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
