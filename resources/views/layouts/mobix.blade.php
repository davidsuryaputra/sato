
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="mobix/images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="apple-touch-startup-image-640x1096.png">
<title>@yield('title')</title>
<link rel="stylesheet" href="mobix/css/framework7.css">
<link rel="stylesheet" href="mobix/style.css">
<link rel="stylesheet" href="mobix/css/colors/magenta.css">
<link type="text/css" rel="stylesheet" href="mobix/css/swipebox.css" />
<link type="text/css" rel="stylesheet" href="mobix/css/animations.css" />
<!-- <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}"> -->
<link rel="stylesheet" href="{{ url('bootstrap/css/font-awesome.min.css') }}">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
</head>
<body id="mobile_wrap">

  @yield('panel')


    <div class="views">

      <div class="view view-main">

        <div class="pages toolbar-through">

          <div data-page="index" class="page homepage">
            <div class="page-content">
					<div class="logo"><img src="mobix/images/logo.png" alt="" title="" /></div>
            </div>
          </div>
        </div>

        @yield('toolbar')

      </div>
    </div>

    @yield('content')

<script type="text/javascript" src="mobix/js/jquery-1.10.1.min.js"></script>
<script src="mobix/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="mobix/js/framework7.js"></script>
<script type="text/javascript" src="mobix/js/my-app.js"></script>
<script type="text/javascript" src="mobix/js/jquery.swipebox.js"></script>
<script type="text/javascript" src="mobix/js/email.js"></script>
<!-- <script type="text/javascript" src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script> -->
  </body>
</html>
