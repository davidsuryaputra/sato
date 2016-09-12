
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Tambah Manager</h2>

              <div class="page_content">

                <div class="contactform">

                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                <form action="{{ route('owner.managers.store') }}" method="POST">
                  {{ csrf_field() }}

                  <!-- <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}"> -->
                    <label>Nama</label>
                    <input class="form_input" placeholder="Mr. Kika" name="name" type="text">
                  <!--
                    @if($errors->has('name'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('name') }}
                    </label>
                    @endif

                  </div>
                -->

                  <!-- <div class="form-group {{ $errors->has('address') ? 'has-error' : ''  }}"> -->
                    <label>Alamat</label>
                    <input class="form_input" placeholder="JL. Ngagel" name="address" type="text">
                  <!--
                    @if($errors->has('address'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('address') }}
                    </label>
                    @endif

                  </div>
                  -->

                  <!-- <div class="form-group {{ $errors->has('city') ? 'has-error' : ''  }}"> -->
                    <label>Kota</label>
                    <input class="form_input" placeholder="Surabaya" name="city" type="text">
                  <!--
                    @if($errors->has('city'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('city') }}
                    </label>
                    @endif

                  </div>
                  -->

                  <!-- <div class="form-group {{ $errors->has('email') ? 'has-error' : ''  }}"> -->
                    <label>Email</label>
                    <input class="form_input" placeholder="kika@mail.com" name="email" type="text">
                  <!--
                    @if($errors->has('email'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('email') }}
                    </label>
                    @endif

                  </div>
                  -->

                  <!-- <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}"> -->
                    <label>Password</label>
                    <input class="form_input" name="password" type="password">
                  <!--
                    @if($errors->has('password'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('password') }}
                    </label>
                    @endif

                  </div>
                  -->

                  <!-- <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''  }}"> -->
                    <label>Password Confirmation</label>
                    <input class="form_input" name="password_confirmation" type="password">
                  <!--
                    @if($errors->has('password_confirmation'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('password_confirmation') }}
                    </label>
                    @endif

                  </div>
                  -->


                  <!-- <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''  }}"> -->
                    <label>Telepon</label>
                    <input class="form_input" placeholder="03153264" name="phone" type="text">
                  <!--
                    @if($errors->has('phone'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('phone') }}
                    </label>
                    @endif

                  </div>
                  -->

                  <!-- <div class="form-group {{ $errors->has('balance') ? 'has-error' : ''  }}"> -->
                    <label>Gaji</label>
                    <input class="form_input" placeholder="5000000" name="balance" type="text">
                  <!--
                    @if($errors->has('balance'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('balance') }}
                    </label>
                    @endif

                  </div>
                -->


                <input type="submit" name="submit" class="form_submit" id="submit" value="Tambah" />
                </form>
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
