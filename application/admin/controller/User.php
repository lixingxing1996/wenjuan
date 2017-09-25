<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\Config;
use think\Request;
// 数据库
use think\Db;


class User extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        // 查询数据表users中的所有内容
        $users = Db::name('users')->where('status',1)->paginate(10);
        return $this->fetch('user/index',['users'=>$users]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {

        if ($this->request->isPost()) {
            //数据获取
            $data            = $this->request->post();
            //验证
            $validate_result = $this->validate($data, 'User');
            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                if ($data['password'] == $data['repassword'])
                {
                    // $data['password'] = md5($data['password'] . Config::get('salt'));
                    $data['status'] = '1';
                    unset($data['repassword']);
                    if (Db::name('users')->insert($data)) {
                        $this->success('保存成功','/admin/user/index');
                    } else {
                        $this->error('保存失败');
                    }
                }else{
                    $this->error('两次密码输入不一致！'); 
                }

                
            }
        }
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
