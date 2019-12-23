@extends('layouts.show')
    @section('title', '车')
    @section('content')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
            
                <div class="collapse navbar-collapse">
                    

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
                                <h3 align="center" class="text-primary" >管理员修改</h3>
                            </div>
                                <form action="{{url('/admin/update/'.$adminInfo->id)}}" method='post' enctype="multipart/form-data">
                                    <table align='center'>
                                        <tr>
                                            <td class="text-primary" ><b style='font-size:25px'>账号:</b></td>
                                            <td ><input type="text" name='account' value="{{$adminInfo->account}}"></td>
                                        </tr>
                                        @csrf
                                        <tr>
                                            <td class="text-primary" ><b style='font-size:25px'>密码:</b></td>
                                            <td ><input type="password" name='pwd' value="{{$adminInfo->pwd}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-primary" ><b style='font-size:25px  '>头像:</b></td>
                                            <td ><input type="file" name='photo[]'><img src="{{env('URL_IMG')}}{{$adminInfo->photo}}" width='180px'></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-primary" ><b style='font-size:30px'></b></td>
                                            <td ><input type="submit" class='btn btn-info btn-fill ' value='修改'></td>
                                        </tr>                                       
                                    </table>
                                </form> 
                            </div>
                            <div class="typo-line">
                                <h3 align="right" class="text-primary" >1907phpA班3组</h3>
                            </div>                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>

        


    </div>
</div>


</body>

        <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <!---<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>--->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
@endsection