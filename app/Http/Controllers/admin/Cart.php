<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Model\admin\Brand;
use App\Model\admin\Cate;
use App\Model\admin\Cart as cart_model;

class Cart extends Controller
{
    /**
     * 列表展示
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cart.index');
    }

    /**
     * 添加页面
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::get();
        $cate = Cate::get();
        return view('admin.cart.create',['brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * 执行添加
     *Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收所有值
        $post = $request->except('_token');
        //第三种验证
        $validator = Validator::make($post, [
            'name' => 'required|unique:cart',
            'price' => 'required',
            'bumber' => 'required',
        ],[
            'name.required'=>'❦汽车名称必填❦',
            'name.unique'=>'❦汽车名称已存在❦',
            'price.required'=>'❦汽车价格必填❦',
            'bumber.required'=>'❦库存必填❦',
        ]);
        if ($validator->fails()) {
            return redirect('cart/create')
                ->withErrors($validator)
                ->withInput();
        }

        //文件上传
        if($request->hasFile('img') ){
            $post['img'] = $this->upload('img');
        }
        //多文件上传
        if ($request->hasFile('imgs')) {
            $imgs =$this->upload('imgs');
            $post['imgs'] = implode('|',$imgs);
        }
        $res=DB::table('cart')->insert($post);
        if($res){
            echo "<script>alert('添加成功');location.href='/cart';</script>";
        }else{
            echo "失败";
        }

    }

    /**
     * 展示详情
     *Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 修改页面
     *Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //根据记录id查询
        $data = cart_model::find($id);

        //将多图分割
        $data['imgs'] = explode('|',$data['imgs']);

        $brand = Brand::get();
        $cate = Cate::get();
        return view('admin.cart.edit',['data'=>$data,'brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * 执行修改
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request->except('_token');

        //文件上传
        if($request->hasFile('img') ){
            $post['img'] = $this->upload('img');
        }
        //多文件上传
        if ($request->hasFile('imgs')) {
            $imgs =$this->upload('imgs');
            $post['imgs'] = implode('|',$imgs);
        }

        $res = cart_model::where('id', '=',$id)->update($post);
        if($res>0){
            echo "<script>alert('修改成功');location.href='/cart';</script>";
        }else if($res==0){
            echo "<script>alert('未修改');location.href='/cart';</script>";
        }else{
            echo "<script>alert('修改失败');location.href='/cart';</script>";
        }
    }

    /**
     * 执行删除
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = cart_model::find($id);
        $res -> delete();

        if($res){
            echo "<script>alert('删除成功');location.href='/';</script>";
        }else{
            echo "删除失败";
        }
    }

    /**
     * 支持单、多文件上传
     * @param type $file
     * @return typed
     */
    public function upload($file){
        $imgs = request()->file($file);
        if(is_array($imgs)){
            //多文件上传
            $result = [];
            foreach($imgs as $v){
                //验证文件是否上传成功
                if ($v->isValid()){
                    //接收文件并上传
                    $result[] = $v->store('uploads');
                    //返回上传的文件路径
                }
            }
            return $result;
        }else{
            //单文件上传
            //验证文件是否上传成功
            if ($imgs->isValid()){
                //接收文件并上传
                $path = request()->file($file)->store('uploads');
                //返回上传的文件路径
                return $path;
            }
        }
        exit('文件上传出错！');
    }

    //ajax唯一性
    public function checkonly(){
        $name = request()->name;
        $where = [];
        if($name){
            $where['name'] = $name;
        }
        $count = DB::table('cart')->where($where)->count();
        echo $count;
    }
}
