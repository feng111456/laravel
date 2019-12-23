<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Admin as admin_model;
class Admin extends Controller
{
    /**管理员展示页面 */
    public function index()
    {
       //实例化model
       $admin_model = new admin_model;
       $adminInfo = $admin_model::get();
       return view('admin.admin.index',['adminInfo'=>$adminInfo]);   
    }

    /** 管理员添加视图*/
    public function create()
    {
        return view('admin.admin.create');
    }

    /** 管理员添加执行*/
    public function store(Request $request)
    {
        //接收值
        $data = $request->except('_token');
        if($files = $request->file('photo')){
            $imgs =upload($files);
            $imgs =  implode('|',$imgs);  
            $data['photo']=$imgs;
        }else{
            echo "<script>alert('文件上传有误');location.href='create'</script>";
        }
        $data['add_time']=time();
        //实例化model
        $admin_model = new admin_model;
        $res = $admin_model::create($data);
            if($res){
                echo "<script>alert('成功');location.href='index';</script>";
            }else{
                echo "<script>alert('失败');location.href='create';</script>";
            }  
    }

    /**详情 */
    public function show($id)
    {
        //
    }

    /**修改1 */
    public function edit($id)
    {
        //实例化model
       $admin_model = new admin_model;
       $adminInfo = $admin_model::find($id);
       return view('admin.admin.edit',['adminInfo'=>$adminInfo]);   
    }

    /**修改2 */
    public function update(Request $request, $id)
    {
        //接收值
        $data = $request->except('_token');
        if($files = $request->file('photo')){
            $imgs =upload($files);
            $imgs =  implode('|',$imgs);  
            $data['photo']=$imgs;
        }
        $data['add_time']=time();
        //实例化model
        $admin_model = new admin_model;
        $res = $admin_model::where('id','=',$id)->update($data);
            if($res!==false){
                echo "<script>alert('成功');location.href='/admin/index';</script>";
            }else{
                echo "<script>alert('失败');location.href='/admin/edit/'+$id;</script>";
            } 
    }

    /**管理员删除 */
    public function destroy($id)
    {
        $admin_model = new admin_model;
        $res = $admin_model::destroy($id);
            if($res){
                echo "<script>alert('成功');location.href='/admin/index';</script>";
            }else{
                echo "<script>alert('失败');location.href='/admin/index';</script>";
            } 
    }
    /** 检测账号唯一 */
    public function checkAccount(){
        $account = request()->account;
        $admin_model = new admin_model;
        $count = $admin_model::where('account',$account)->count();
        if($count>0){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**ajav 删除 */
    public function del(){
        $id = request()->_id;
        $admin_model = new admin_model;
        $res = $admin_model::destroy($id);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
    }
}
