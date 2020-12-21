<?php

namespace app\api\controller;

use think\Controller;
use think\Db;
use think\Request;

class Api extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        //
        $data = [
            'name'  => 'thinkphp',
            'email' => 'thinkphp@qq.com',
        ];

        $validate = new \app\api\validate\Api();

        if (!$validate->check($data)) {
            return dump($validate->getError());
        }
        $arr = [
            'name' => $request->param('name'),
            'email' => $request->param('email'),
            'phone' => $request->param('phone'),
        ];
        $as = Db::name('member')->insert($arr);
        if ($as){
            return json(['code'=>200,'msg'=>'添加成功','date'=>$arr]);
        }else{
            return json(['code'=>201,'msg'=>'添加失败','date'=>'']);
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create(Request $request)
    {
        //
        $name = $request->param('name');
        $phone = $request->param('phone');
        $arr = Db::name('member')->where('name','like',"%$name%")
            ->whereOr('phone',"like","%$phone%")->select();
        if ($arr){
            return json(['code'=>200,'msg'=>'查询成功','date'=>$arr]);
        }else{
            return json(['code'=>201,'msg'=>'展示失败','date'=>'']);
        }
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
        $arr = [
            'name' => $request->param('name'),
            'email' => $request->param('email'),
            'phone' => $request->param('phone'),
        ];
        $as = Db::name('member')->where('id','=',$id)->update($arr);
        if ($as){
            return json(['code'=>200,'msg'=>'修改成功','date'=>$arr]);
        }else{
            return json(['code'=>201,'msg'=>'修改失败','date'=>'']);
        }
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
        $arr = Db::name('member')->where('id','=',$id)->delete();
        if ($arr){
            return json(['code'=>200,'msg'=>'删除成功','date'=>$arr]);
        }else{
            json(['code'=>201,'msg'=>'删除失败','date'=>'']);
        }
    }
}
