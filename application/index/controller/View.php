<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
// 数据库
use think\Db;

class View extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取表的id
        $t_id  = $this->request->param('id/d');
        // dump($t_id);exit;
        // 获取表的内容
        $table = Db::name('table')->field(['title','description','author'])->where(['id'=>$t_id,'status'=>'1'])->find();
        // 获取问题的内容
        $question = Db::name('question')->field(['id','name','type','require'])->where(['t_id'=>$t_id])->order(['id' => 'DESC'])->select();
        
        foreach($question as $k=>$vo){
            $question[$k]['option'] = Db::name('option')->field(['name'])->where(['q_id'=>$vo['id'],'t_id'=>$t_id])->order(['id' => 'DESC'])->select();
        }
        // dump($question);exit;
        $table['question'] = $question;

        if($table){
            return $this->fetch('view/index',['table'=>$table]);
        }else{
            $this->error('抱歉，您所选择的表格已经失效，请登陆后台查看','/admin/login/index');
        }     
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
