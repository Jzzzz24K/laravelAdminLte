<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('admin.title')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.header')
    @include('layouts.left')
    <div class="content-wrapper">
        <iframe name="mainiframe" id="mainiframe" width="100%"  src="/index"
                frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"
                onload="changeFrameHeight()"
        ></iframe>
    </div>
    @include('layouts.footer')
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="{{asset('js/app.js')}}"></script>
<script>
    function changeFrameHeight(){
        var ifm= document.getElementById("mainiframe");
        ifm.height=document.documentElement.clientHeight - 50 - 60;
    }
    window.onresize=function(){
        var ua = navigator.userAgent.toLowerCase();

        var screenwidth = window.screen.width;
        // console.log("屏幕宽度为", screenwidth);
        if (!/iphone|ipad|ipod/.test(ua)) {
        } else {
            document.getElementById("mainiframe").width = screenwidth;
        }
        changeFrameHeight();
    }
</script>
</body>
</html>
