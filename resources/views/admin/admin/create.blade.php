@extends('layouts.show')
    @section('title', '车')
    @section('content')
    
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
            
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                           <a href="">
                           <h3 align="right" class="text-primary"  >1907phpA班3组</h3>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               管理员
                            </a>
                        </li>
                        <li>
                            <a href="#">
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
                            <div class="typo-line">
                                <h2 align="left" class="text-primary" ><a href="scripyjava:;">管理员添加</a></h2>
                                <h3 align="left" class="text-primary" ><a href="{{url('admin/index')}}">管理员列表</a></h3>
                            </div>
                                <form action="{{url('/admin/store')}}" method='post' id='myform' enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                    <table align='left'>
                                        <tr>
                                            <td class="text-primary" ><b style='font-size:25px'>账号:</b></td>
                                            <td><input type="text" name='account' id='account'><span style='color:red ; font-size:15px' id='account_span'>*</span></td>
                                        </tr>
                                        @csrf
                                        <tr>
                                            <td class="text-primary" ><b style='font-size:25px'>密码:</b></td>
                                            <td ><input type="password" name='pwd' id='pwd'><span style='color:red ; font-size:15px' id='pwd_span'>*</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-primary" ><b style='font-size:25px  '>头像:</b></td>
                                            <td><input type="file" name='photo[]'></td>
                                        </tr>
                                        <tr>
                                            <td class="text-primary" ><b style='font-size:30px'></b></td>
                                            <td><input type="submit" class='btn btn-info btn-fill' value='添加'></td>
                                        </tr>                                       
                                    </table>
                                </form> 
                            </div>
                            <div class="typo-line">  
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
    $(function(){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /** 账号栏绑定失去焦点事件 */
        $(document).on('blur','#account',function(){
            checkAccount();
        })
        /** 密码框绑定失去焦点事件 */
        $(document).on('blur','#pwd',function(){
            checkPwd();
        })
        /** 绑定表单提交事件 */
        $(document).on('submit','#myform',function(){
           var res =  checkAccount();
              
            var res2 = checkPwd();
            return res&&res2;
        })
        /**检测账号 */
        function checkAccount(){
            var account = $("#account").val();
            var reg = /^[a-z][a-z0-9_]{4,9}$/;
                if(account==''){
                    $("#account_span").text('账号必填');
                    return false;
                }else if(!reg.test(account)){
                    $("#account_span").text('账号必须为数字字母下划线组成且不能数字开头5-10位数');
                    return false;
                }else{
                    var results = false;
                    
                    $.ajax({
                        method:"post",
                        url:"{{url('/admin/checkAccount')}}",
                        data:{account:account, _token:'{{csrf_token()}}'},
                        async:false
                    }).done(function(res){
                        if(res==1){
                            $("#account_span").text('账号已存在');
                            results = false;
                        }else{
                            $("#account_span").text('√');
                            results = true;
                        }
                    })
                    return results;
                }   
        }
        /**检测密码 */
        function checkPwd(){
            var pwd = $("#pwd").val();
            var reg = /^[a-z0-9_]{6,10}$/;
                if(pwd==''){
                    $("#pwd_span").text('密码必填');
                    return false;
                }else if(!reg.test(pwd)){
                    $("#pwd_span").text('密码必须以字母数字下滑线组成不能含中文 6-10位');
                    return false;
                }else{
                    $("#pwd_span").text('√');
                    return true;
                }
        }
    })
</script>
@endsection