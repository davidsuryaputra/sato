
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Tambah Tarif</h2>

              <div class="page_content">

                <div class="contactform">
                <form action="{{ route('manager.pricings.store') }}" method="POST">
                  {{ csrf_field() }}

                    <label>Nama</label>
                    <input class="form_input" placeholder="Cuci Sepeda" name="name" type="text">

                    <label>Harga</label>
                    <input class="form_input" placeholder="2000" name="value" type="text">

                <input type="submit" name="submit" class="form_submit" id="submit" value="Tambah" />
                </form>
                </div>



              </div>

      </div>


    </div>
  </div>
</div>