
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
                  {!! Form::model($pricing, ['method' => 'patch', 'action' => ['ManagerController@updatePricing', $pricing->id]]) !!}


                    <label>Nama</label>
                    {!! Form::text('name', null, ['class' => 'form_input']) !!}

                    <label>Harga</label>
                    {!! Form::text('value', null, ['class' => 'form_input']) !!}

                  <input type="submit" name="submit" class="form_submit" id="submit" value="Update" />
                  </form>
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
