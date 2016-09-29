
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="{{ url('mobix/images/apple-touch-icon.png') }}" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="apple-touch-startup-image-640x1096.png">
<title>@yield('title')</title>
<link rel="stylesheet" href="{{ url('mobix/css/framework7.css') }}">
<link rel="stylesheet" href="{{ url('mobix/style.css') }}">
<link rel="stylesheet" href="{{ url('mobix/css/colors/magenta.css') }}">
<link type="text/css" rel="stylesheet" href="{{ url('mobix/css/swipebox.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ url('mobix/css/animations.css') }}" />
<link rel="stylesheet" href="{{ url('bootstrap/css/jquery-ui.css') }}">
<!-- <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}"> -->
<link rel="stylesheet" href="{{ url('bootstrap/css/font-awesome.min.css') }}">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
</head>
<body id="mobile_wrap">

  @yield('panel')


    <div class="views">

      <div class="view view-main">

        @yield('anu')
        <!--
        <div class="pages toolbar-through">
        <div data-page="projects" class="page no-toolbar no-navbar">
        <div class="page-content">

        <div class="page_content_menu">
         <nav class="main-nav">
          <ul>
            <li><a href="{{ url('terimaPelanggan') }}"><img src="mobix/images/icons/white/user.png" alt="" title="" /><span>Terima Pelanggan</span></a></li>
            <li><a href="{{ url('antrian') }}"><img src="mobix/images/icons/white/team.png" alt="" title="" /><span>Lihat Antrian</span></a></li>
            <li><a href="{{ url('layarAntrian/1') }}" target="_blank" class="external"><img src="mobix/images/icons/white/toogle.png" alt="" title="" /><span>Layar Antrian</span></a></li>
          </ul>
        </nav>
        <div class="close_popup_button"><a href="#" class="backbutton"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
        </div>

        </div>

        </div>
        </div>
        -->


        <!--
        <div class="pages toolbar-through">

          <div data-page="index" class="page homepage">
            <div class="page-content">
					<div class="logo"><img src="{{ url('mobix/images/logo.png') }}" alt="" title="" /></div>
            </div>
          </div>
        </div>
      -->

        @yield('toolbar')

      </div>
    </div>

    @yield('content')

    <script type="text/javascript" src="{{ url('mobix/js/jquery-1.10.1.min.js') }}"></script>
    <!-- jQuery 2.2.0 -->
    <!-- <script src="{{ url('plugins/jQuery/jQuery-2.2.0.min.js') }}"></script> -->
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
    <script src="{{ url('mobix/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('mobix/js/framework7.js') }}"></script>
    <script type="text/javascript" src="{{ url('mobix/js/my-app.js') }}"></script>
    <script type="text/javascript" src="{{ url('mobix/js/jquery.swipebox.js') }}"></script>
    <script type="text/javascript" src="{{ url('mobix/js/email.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script> -->
    @yield('script')
    <script>
    function dicuci(id, status)
    {
      var cuciData = {
        'id' : id,
        @if(Auth::user() && Auth::user()->showroom != null)
        'showroom_id' : {{ Auth::user()->showroom->id }},
        @else
        'showroom_id' : 0,
        @endif
        'status' : status,
      };
      $.get("updateStatus", cuciData, function (data){
        var id = data.status+""+data.id;
        // alert(id);
        $("a[id="+id+"]").remove();
        $("a[id=Pengeringan"+data.id+"]").removeClass('disabled');
        $("p[class=status"+data.id+"]").html(data.status);
      });
    }

    function pengeringan(id, status)
    {
      var pengeringanData = {
        'id' : id,
        @if(Auth::user() && Auth::user()->showroom != null)
        'showroom_id' : {{ Auth::user()->showroom->id }},
        @else
        'showroom_id' : 0,
        @endif
        'status' : status,
      };
      $.get("updateStatus", pengeringanData, function (data){
        var id = data.status+""+data.id;
        $("a[id="+id+"]").remove();
        $("a[id=Selesai"+data.id+"]").removeClass('disabled');
        $("p[class=status"+data.id+"]").html(data.status);
      });
    }

    function selesai(id, status)
    {
      var selesaiData = {
        'id' : id,
        @if(Auth::user() && Auth::user()->showroom != null)
        'showroom_id' : {{ Auth::user()->showroom->id }},
        @else
        'showroom_id' : 0,
        @endif
        'status' : status,
      };
      $.get("updateStatus", selesaiData, function (data){
        //loading animation
        var id = data.status+""+data.id;
        $("a[id="+id+"]").remove();
        // $("a[id=Kasir"+data.id+"]").removeClass('disabled');
        $("p[class=status"+data.id+"]").html(data.status);
        setTimeout(function (){
          // $("tr[id="+data.id+"]").remove();
          window.location.href = "{{ route('home') }}";
          // window.location.href = "{{ route('home') }}" + "#!/" + "{{ route('operator.antrian') }}";
        }, 5000);
      });
    }

    function kasir(id, status)
    {
      var kasirData = {
        'id' : id,
        @if(Auth::user() && Auth::user()->showroom != null)
        'showroom_id' : {{ Auth::user()->showroom->id }},
        @else
        'showroom_id' : 0,
        @endif
        'status' : status,
      };

      $.get("updateStatus", kasirData, function (data){
        var id = data.status+data.id;
        $("a[id="+id+"]").remove();
        $("p[class=status"+data.id+"]").html(data.status);
        setTimeout(function (){
          // $("tr[id="+data.id+"]").remove();
          window.location.href = "{{ route('home') }}";
          // window.location.href = "{{ route('home') }}" + "#!/" + "{{ route('operator.antrian') }}";
        }, 5000);

      });
    }

    </script>
  </body>
</html>
