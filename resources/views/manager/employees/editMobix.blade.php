
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Edit Pegawai</h2>

              <div class="page_content">

                <div class="contactform">
                  {!! Form::model($employee, ['method' => 'patch', 'action' => ['ManagerController@updateEmployee', $employee->id]]) !!}


                    <label>Nama</label>
                    {!! Form::text('name', null, ['class' => 'form_input']) !!}

                    <label>Alamat</label>
                    {!! Form::text('address', null, ['class' => 'form_input']) !!}

                    <label>Kota</label>
                    {!! Form::text('city', null, ['class' => 'form_input']) !!}

                    <label>Telepon</label>
                    {!! Form::text('phone', null, ['class' => 'form_input']) !!}

                    <label>Gaji</label>
                    {!! Form::text('balance', null, ['class' => 'form_input']) !!}

                    <label>Password</label>
                    {!! Form::password('password', ['class' => 'form_input']) !!}

                    <label>Password Confirmation</label>
                    {!! Form::password('password_confirmation', ['class' => 'form_input']) !!}

                  <input type="submit" name="submit" class="form_submit" id="submit" value="Update" />
                  </form>
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
