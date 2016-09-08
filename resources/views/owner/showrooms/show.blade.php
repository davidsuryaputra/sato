
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Custom form inputs</h2>

              <div class="page_content">

                <div class="contactform">

                <label>Nama:</label>
                <p>{{ $showroom->name }}</p>

                <label>Alamat</label>
                <p>{{ $showroom->address }}</p>

                <label>Kota</label>
                <p>{{ $showroom->city }}</p>

                <label>Telepon</label>
                <p>{{ $showroom->phone }}</p>

                <label>Pilihan</label>
                <a href="{{ route('owner.showrooms.destroy', $showroom->id) }}" role="button" class="btn btn-danger">Delete</a>
                <a href="{{ route('owner.showrooms.edit', $showroom->id) }}" role="button" class="btn btn-warning">Edit</a>
                <!-- <input type="submit" name="submit" class="form_submit" id="submit" value="Send" /> -->
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
