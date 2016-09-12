@extends('layouts.mobix')

@section('title', 'Owner')

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
              <div class="user_social">
              <a href="#" data-popup=".popup-social" class="open-popup"><img src="mobix/images/icons/white/twitter.png" alt="" title="" /></a>              </div>
            </div>

              <nav class="user-nav">
                <ul>
                  <li><a href="{{ url('terimaPelanggan') }}" class="close-panel"><i class="fa fa-users"></i>Terima Pelanggan</a></li>
                  <li><a href="{{ url('antrian')}}" class="close-panel"><i class="fa fa-user-plus"></i>Antrian</a></li>
                  <li><a href="{{ url('layarAntrian/1')}}" class="close-panel"><i class="fa fa-user-plus"></i>Layar Antrian</a></li>
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

      <li><a href="#" data-panel="left" class="open-panel"><img src="mobix/images/icons/white/user.png" alt="" title="" /></a></li>
      <li><a href="{{ url('logout') }}" class="external"><img src="mobix/images/icons/white/lock.png" alt="" title="" /></a></li>
      <!-- <li><a href="blog.html"><img src="mobix/images/icons/white/blog.png" alt="" title="" /></a></li> -->
      <!-- <li><a href="contact.html"><img src="mobix/images/icons/white/contact.png" alt="" title="" /></a></li> -->
      </ul>
      </div>
</div>

@endsection
