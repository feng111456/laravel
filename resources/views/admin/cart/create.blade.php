@extends('layouts.show')
@section('title', '添加')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-16">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">汽车添加</h4>
                            </div>
                            <div class="content">
                                <form action="{{url('cart/store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>汽车名称</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="请输入汽车名称">
                                                <b style="color: #9d0006 ">{{$errors->first('name')}}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>汽车价格</label>
                                                <input type="text" class="form-control" name="price" id="price" placeholder="请输入汽车价格">
                                                <b style="color: #9d0006 ">{{$errors->first('price')}}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>库存</label>
                                                <input type="text" class="form-control" name="bumber" id="bumber" placeholder="请输入库存">
                                                <b style="color: #9d0006 ">{{$errors->first('bumber')}}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>汽车图片</label>
                                                <input type="file" class="form-control" name="img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>汽车相册</label>
                                                <input type="file" class="form-control" name="imgs[]" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>是否新品&nbsp;&nbsp;&nbsp;</label>
                                                <input type="radio" name="is_new" value="1" checked>是&nbsp;
                                                <input type="radio" name="is_new" value="2">否&nbsp;
                                            </div>
                                        </div>
                                    </div><div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>是否热卖&nbsp;&nbsp;&nbsp;</label>
                                                <input type="radio" name="is_hot" value="1" checked>是&nbsp;
                                                <input type="radio" name="is_hot"value="2">否&nbsp;
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

                                    <button type="submit" class="btn btn-info btn-fill ">添加</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="/jq.js"></script>
<script>
    $(function(){
        $('#name').blur(function(){
            $(this).next().text('');
            var name = $(this).val();

            var reg = /^[\u4e00-\u9fa5\w -]{2,100}$/;
            if(!reg.test(name)){
                $(this).next().text('汽车名称需要是中文.数字.字母.下划线组成2-100位');
                return;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //唯一性验证
            $.ajax({
                method: "POST",
                url: "/cart/checkonly",
                data: { name:name}
            }).done(function( msg ) {
                //alert( "Data Saved:"+msg );
                if(msg>0){
                    $('#name').next().text('汽车名称已存在');
                }
            });
        });

        $('#price').blur(function(){
            $('#price').next().text('');
            var price = $('#price').val();
            var reg = /^\d+$/;
            if(!reg.test(price)){
                $('#price').next().text('价格必须是纯数字');
            }
        })

        $('#bumber').blur(function(){
            $('#bumber').next().text('');
            var price = $('#bumber').val();
            var reg = /^\d+$/;
            if(!reg.test(bumber)){
                $('#bumber').next().text('库存必须是纯数字');
            }
        })
    })
</script>
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

@endsection