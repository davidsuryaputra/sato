
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
                  {!! Form::model($showroom, ['method' => 'patch', 'action' => ['OwnerController@updateShowroom', $showroom->id]]) !!}


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

                @if(count($managers) > 0)
                  <label>Pilih Manager</label>
                  <select class="form-control" name="manager">
                    <option>Pilih Manajer</option>
                    @foreach($managers as $manager)
                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                    @endforeach
                  </select>
                @endif


                  <input type="submit" name="submit" class="form_submit" id="submit" value="Update" />

                  {!! Form::close() !!}

                </div>



              </div>

      </div>


    </div>
  </div>
</div>
