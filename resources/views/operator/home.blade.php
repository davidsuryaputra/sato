@extends('layouts.mobix')
@section('title', 'Operator')

@section('panel')
@if(Auth::check())
<div class="panel-overlay"></div>

<div class="panel panel-left panel-cover">
      <div class="user_login_info">
            <div class="user_thumb">
            <img src="mobix/images/profile.jpg" alt="" title="" />
              <div class="user_details">
               <p>Hi, <span>{{ Auth::user()->name }}</span></p>
              </div>
              <!--
              <div class="user_social">
              <a href="#" data-popup=".popup-social" class="open-popup"><img src="mobix/images/icons/white/twitter.png" alt="" title="" /></a>
              </div>
              -->
            </div>

              <nav class="user-nav">
                <ul>
                  <li><a href="{{ url('terimaPelanggan') }}" class="close-panel"><i class="fa fa-users"></i>Terima Pelanggan</a></li>
                  <li><a href="{{ url('antrian')}}" class="close-panel"><i class="fa fa-user-plus"></i>Antrian</a></li>
                  <li><a href="{{ url('layarAntrian/1')}}" target="_blank" class="external close-panel"><i class="fa fa-user-plus"></i>Layar Antrian</a></li>
                  <!-- <li><a href="index.html" class="close-panel"><i class="fa fa-sign-out"></i>Logout</a></li> -->
                  <!-- <li><a href="features.html" class="close-panel"><img src="mobix/images/icons/white/briefcase.png" alt="" title="" /><span>Account</span></a></li> -->
                  <!-- <li><a href="features.html" class="close-panel"><img src="mobix/images/icons/white/message.png" alt="" title="" /><span>Messages</span><strong class="green">12</strong></a></li> -->
                  <!-- <li><a href="features.html" class="close-panel"><img src="mobix/images/icons/white/download.png" alt="" title="" /><span>Downloads</span><strong class="blue">5</strong></a></li> -->
                </ul>
              </nav>
      </div>
</div>
@endif
@endsection

@section('toolbar')
<!-- Bottom Toolbar-->
<div class="toolbar">
      <div class="toolbar-inner">
      <ul class="toolbar_icons">

      <li><a href="#" data-panel="left" class="open-panel"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></li>
      <li><a href="{{ url('logout') }}" class="external"><img src="mobix/images/icons/white/lock.png" alt="" title="" /></a></li>
      <!-- <li><a href="blog.html"><img src="mobix/images/icons/white/blog.png" alt="" title="" /></a></li> -->
      <!-- <li><a href="contact.html"><img src="mobix/images/icons/white/contact.png" alt="" title="" /></a></li> -->
      </ul>
      </div>
</div>
@endsection

@section('anu')
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
<!-- <div class="close_popup_button"><a href="#" class="backbutton"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div> -->
</div>

</div>

</div>
</div>
@endsection
