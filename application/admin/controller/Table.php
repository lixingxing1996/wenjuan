<?php

namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\Request;
// 数据库
use think\Db;

class Table extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        // 查询数据表table中的所有内容
        $table = Db::name('table')->where('status',1)->paginate(10);
        //
        return $this->fetch('table/index',['table'=>$table]);
    }

    /**
     * 创建一个调查问卷
     *
     * @return \think\Response
     */
    public function create()
    {

        // 展开视图
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
        //
        // dump($_POST);
        // foreach($_POST['question'] as $vo){
        //     if(isset($vo['option'])){
        //         dump($vo['option']);
        //     }
        // }
        // exit;
        // 数据储存
        if ($this->request->isPost()) {
            $data            = $this->request->param();
            // 验证数据
            // $validate_result = $this->validate($data, 'Link');
            // 添加到table表中的内容
            $table = [
                        'title'       =>    $data['title'],
                        'description' =>    $data['description'],
                        'author'      =>    $data['author'],
                        'starttime'   =>    time(),
                        'endtime'     =>    strtotime($data['endtime']),
                        'status'      =>    '1'
                    ];  
            // 保存数据值，并返回主键值
            $t_id = Db::name('table')->insertGetId($table);

            // 添加到question并且添加option
            foreach ($data['question'] as $value) {
                // 添加一个问题
                $question = [
                                'name'      => $value['name'],
                                't_id'      => $t_id,
                                'type'      => $value['type'],
                                'require'   => $value['require']
                            ];
                // 保存数据，并且返回问题id
                $q_id = Db::name('question')->insertGetId($question);
                // 如果不是文本题
                if($value['type']!=2){
                $option =[];
                   foreach($value['option'] as $vo)
                   {
                    $option[] = [
                                'name'      =>  $vo,
                                't_id'      =>  $t_id,
                                'q_id'      =>  $q_id,

                            ];

                   }
                   // dump($option);exit;
                   $result = Db::name('option')->insertAll($option);

                }
            }
            // 判断数据库存储成功后返回           
            $this->success('保存成功','/admin/table/index');
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

        return $this->fetch('table/edit',['table'=>$table]);
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
