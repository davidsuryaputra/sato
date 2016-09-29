
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Edit Manager</h2>

              <div class="page_content">

                <div class="contactform">
                  {!! Form::model($manager, ['method' => 'patch', 'action' => ['OwnerController@updateManager', $manager->id]]) !!}


                  <!-- <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}"> -->
                    <label>Nama</label>
                    <!-- <input class="form_input" placeholder="Sato 1 Klampis Jaya" name="name" type="text" value=> -->
                    {!! Form::text('name', null, ['class' => 'form_input']) !!}

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
                    <!-- <input class="form_input" placeholder="Sato 1 Klampis Jaya" name="name" type="text" value=> -->
                    {!! Form::text('address', null, ['class' => 'form_input']) !!}

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
                    <!-- <input class="form_input" placeholder="Sato 1 Klampis Jaya" name="name" type="text" value=> -->
                    {!! Form::text('city', null, ['class' => 'form_input']) !!}

                  <!--
                    @if($errors->has('city'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('city') }}
                    </label>
                    @endif
                  </div>
                -->

                  <!-- <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''  }}"> -->
                    <label>Telepon</label>
                    <!-- <input class="form_input" placeholder="Sato 1 Klampis Jaya" name="name" type="text" value=> -->
                    {!! Form::text('phone', null, ['class' => 'form_input']) !!}

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
                    <!-- <input class="form_input" placeholder="Sato 1 Klampis Jaya" name="name" type="text" value=> -->
                    {!! Form::text('balance', null, ['class' => 'form_input']) !!}
                  <!--
                    @if($errors->has('balance'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('balance') }}
                    </label>
                    @endif
                  </div>
                -->

                  <!-- select -->
                  @if($showroomKosong > '0' && $manager->showroom_id == null)
                  <!-- <div class="form-group {{ $errors->has('showroom') ? 'has-error' : ''  }}"> -->
                    <label>Pilih Showroom</label>
                    <select class="form_select" name="showroom">
                      <option>Pilih Showroom</option>
                      @foreach($showrooms as $showroom)
                        @if(!isset($showroom->manager->name))
                          <option value="{{ $showroom->id }}">{{ $showroom->name }}</option>
                        @endif
                      @endforeach
                    </select>

                    <!--
                    @if($errors->has('showroom'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('showroom') }}
                    </label>
                    @endif
                  </div>
                -->
                  @endif

                  <!-- text input -->
                  <!-- <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}"> -->
                    <label>Password</label>
                    <!-- <input class="form_input" placeholder="Sato 1 Klampis Jaya" name="name" type="text" value=> -->
                    {!! Form::password('password', ['class' => 'form_input']) !!}

                    <label>Password Confirmation</label>
                    <!-- <input class="form_input" placeholder="Sato 1 Klampis Jaya" name="name" type="text" value=> -->
                    {!! Form::password('password_confirmation', ['class' => 'form_input']) !!}

                <!--
                    @if($errors->has('password'))
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    {{ $errors->first('password') }}
                    </label>
                    @endif
                  </div>
                -->


                  <input type="submit" name="submit" class="form_submit" id="submit" value="Update" />
                  </form>
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
