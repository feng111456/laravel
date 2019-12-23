@extends('layouts.show')
@section('title', '编辑')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-16">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Hello</h4>
                            </div>
                            <div class="content">
                                <form action="{{url('cart/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>汽车名称</label>
                                                <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="请输入汽车名称">
                                                <b style="color: #9d0006 ">{{$errors->first('name')}}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>汽车价格</label>
                                                <input type="text" class="form-control" name="price" value="{{$data->price}}" placeholder="请输入汽车价格">
                                                <b style="color: #9d0006 ">{{$errors->first('price')}}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>库存</label>
                                                <input type="text" class="form-control" name="bumber" value="{{$data->bumber}}" placeholder="请输入库存">
                                                <b style="color: #9d0006 ">{{$errors->first('bumber')}}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>汽车图片</label>
                                                <img src="{{env('UPLOAD_URL')}}{{$data->img}}" width="120" height="80">
                                                <input type="file" class="form-control" name="img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>汽车相册</label>
                                                @foreach($data->imgs as $v)
                                                    <img src="{{env('UPLOAD_URL')}}{{$v}}" width="120" height="80">
                                                @endforeach
                                                <input type="file" class="form-control" name="imgs[]" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>是否新品&nbsp;&nbsp;&nbsp;</label>
                                                @if(($data->is_new)==1)
                                                    <input type="radio"  name="is_new" value="1" id="firstname" checked>是
                                                    <input type="radio"  name="is_new" value="2" id="firstname">否
                                                @else
                                                    <input type="radio"  name="is_new" value="1" id="firstname">是
                                                    <input type="radio"  name="is_new" value="2" id="firstname" checked>否
                                                @endif
                                            </div>
                                        </div>
                                    </div><div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>是否热卖&nbsp;&nbsp;&nbsp;</label>
                                                @if(($data->is_hot)==1)
                                                    <input type="radio"  name="is_hot" value="1" id="firstname" checked>是
                                                    <input type="radio"  name="is_hot" value="2" id="firstname">否
                                                @else
                                                    <input type="radio"  name="is_hot" value="1" id="firstname">是
                                                    <input type="radio"  name="is_hot" value="2" id="firstname" checked>否
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>所属分类</label>
                                                <select name="c_id"  class="form-control">
                                                    @foreach($cate as $v)
                                                    <option value="{{$v->c_id}}">{{$v->c_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>所属品牌</label>
                                                <select name="b_id" id="" class="form-control">
                                                    @foreach($brand as $v)
                                                        <option value="{{$v->b_id}}">{{$v->b_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill ">修改</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
    <!--   Core JS Files   -->
    <script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="/assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<!--  Charts Plugin -->
	<script src="/assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/assets/js/bootstrap-notify.js"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="/assets/js/light-bootstrap-dashboard.js"></script>
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="/assets/js/demo.js"></script>

