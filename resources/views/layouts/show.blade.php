<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Home</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    汽车之家
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="#" class='click'>
                        <i class="pe-7s-user"></i>
                        <p id=''>管理员</p>
                    </a>
                    <a href="#" class='none' sta='1'>
                        <i class="pe-7s-map-marker"></i>
                        <p id=''>管理员</p>
                    </a>
                    <a href="#" class='none' sta='1'>
                        <i class="pe-7s-map-marker"></i>
                        <p id=''>管理员</p>
                    </a>
                </li>
                <li>
                    <a href="#" class='click'>
                        <i class="pe-7s-car"></i>
                        <p>汽车详情</p>
                    </a>
                    <a href="#" class='none' sta='1'>
                        <i class="pe-7s-map-marker"></i>
                        <p id=''>汽车展示</p>
                    </a>
                    <a href="#" class='none' sta='1'>
                        <i class="pe-7s-map-marker"></i>
                        <p id=''>汽车添加</p>
                    </a>
                </li>
                <li>
                    <a href="#" class='click' >
                        <i class="pe-7s-help2"></i>
                        <p>汽车品牌</p>
                    </a>
                    <a href="#" class='none' sta='1'>
                        <i class="pe-7s-map-marker"></i>
                        <p id=''>品牌展示</p>
                    </a>
                    <a href="#" class='none' sta='1'>
                        <i class="pe-7s-map-marker"></i>
                        <p id=''>品牌添加</p>
                    </a>
                </li>
                <!-- <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li> -->
                <li>
                    <a href="#">
                        <i class="pe-7s-diamond"></i>
                        <p>汽车类型</p>
                    </a>
                    <a href="#" class='none' sta='1'>
                        <i class="pe-7s-map-marker"></i>
                        <p id=''>类型展示</p>
                    </a>
                    <a href="#" class='none' sta='1'>
                        <i class="pe-7s-map-marker"></i>
                        <p id=''>类型添加</p>
                    </a>
                </li>
                
            </ul>
    	</div>
    </div>
    <script src="/jq.js"></script>
    <script>
        $(function(){
            
             $('a[sta=1]').hide();
            $('.click').click(function(){
                var _this = $(this);
                var status=_this.nextAll().attr('sta');
                if(status==1){
                   var aa =  _this.nextAll();
                     _this.nextAll().attr('sta','2').show();
                }else{
                    _this.nextAll().attr('sta','1').hide();
                }
                
            })    
        })
    </script>
        <!-- 身体-->
 @yield('content')
