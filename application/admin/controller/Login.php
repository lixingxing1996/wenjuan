<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Config;
use think\Db;
use think\Session;




class Login extends Controller
{
    /**
     * 登录页面
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        // echo md5('admin').Config::get('salt');exit;

        return $this->fetch();
    }


    /**
     * 登陆验证
     *
     * @return \think\Response
     */
    public function login()
    {
        //判断传入的数据
        if ($this->request->isPost()) {
            // 只获取这些数据
            $data            = $this->request->only(['username', 'password', 'verify']);
            // 验证
            $validate_result = $this->validate($data, 'Login');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                $where['username'] = $data['username'];
                $where['password'] = md5($data['password']). Config::get('salt');
                // 获取用户数据信息
                $admin = Db::name('admin')->field('id,username,status')->where($where)->find();

                if (!empty($admin)) {
                    // 如果状态不为"1",则为禁用用户
                    if ($admin['status'] != 1) {
                        $this->error('当前用户已禁用');
                    } else {
                        // 设置admin_id
                        Session::set('admin_id', $admin['id']);
                        Session::set('admin_name', $admin['username']);
                        Db::name('admin')->update(
                            [
                                // 最后登录的时间
                                // 'last_login_time' => date('Y-m-d H:i:s', time()),
                                // 'last_login_ip'   => $this->request->ip(),
                                'id'              => $admin['id']
                            ]
                        );
                        // 登录成功
                        $this->success('登录成功', 'admin/index/index');
                    }
                } else {
                    // 登录失败
                    $this->error('用户名或密码错误');
                }
            }
        }
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        Session::delete('admin_id');
        Session::delete('admin_name');
        $this->success('退出成功', 'admin/login/index');
    }
}
