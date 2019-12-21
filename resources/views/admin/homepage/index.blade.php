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
                                <h1 align="center" class="text-primary" >汽车之家首页</h1>
                            </div>
                            <div class="typo-line">
                                <table align='center'>
                                    <tr>
                                        <td><img src="{{env('URL_IMG')}}{{$cartInfo->img}}" width='800px'></td>
                                    </tr>
                                    <tr class="text-primary">
                                        <td><h2>名称</h2></td>
                                    </tr>
                                    <tr class="text-primary">
                                        <td><h2>价格</h2></td>
                                    </tr>
                                    <tr class="text-primary">
                                        <td>汽车介绍</td>
                                    </tr>
                                    <tr class="text-primary">
                                        <td><textarea name="" id="" cols="80px" rows="15px"></textarea></td>
                                    </tr>
                                </table> 
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