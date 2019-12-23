@extends('layouts.show')
    @section('title', '车')
    @section('content')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">            
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                                账号
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="">
                                头像
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                退出
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2><a href="scriptjava:;">管理员列表</a></h2>
                                <h4><a href="{{url('admin/create')}}">管理员添加</a></h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead  >
                                        <th style='font-size:28px'>管理员id</th>
                                    	<th style='font-size:28px'>账号</th>
                                    	<th style='font-size:28px'>头像</th>
                                    	<th style='font-size:28px'>密码</th>
                                    	<th style='font-size:28px'>操作</th>
                                    </thead>
                                    <tbody>
                                        @foreach($adminInfo as $v)
                                        <tr admin_id='{{$v->id}}'>
                                        	<td>{{$v->id}}</td>
                                        	<td>{{$v->account}}</td>
                                        	<td><img src="{{env('URL_img')}}{{$v->photo}}" width='120px'></td>
                                        	<td>{{$v->pwd}}</td>
                                        	<!-- <td><a href="{{url('admin/destroy/'.$v->id)}}">删除</a>|<a href="{{url('admin/edit/'.$v->id)}}">修改</a></td> -->
                                            <td><a href="scriptjava:;" class='del'>删除</a>|<a href="{{url('admin/edit/'.$v->id)}}">修改</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src='/jq.js'></script>
<script>
    $('.del').click(function(){
        if(confirm('确定删除？？')){
            var _this = $(this);
            var  _id = _this.parents('tr').attr('admin_id');
            $.post(
                "{{url('admin/del')}}",
                {_id:_id,_token:'{{csrf_token()}}'},
                function(res){
                    if(res==1){
                        _this.parents('tr').remove();
                    }
                }
            )
        }
    })
</script>
@endsection
