
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Update Stock</h2>

              <div class="page_content">

                <div class="contactform">
                <form action="{{ route('manager.materials.updatestock', $material->id) }}" method="POST">
                  {{ csrf_field() }}

                    <label>Nama</label>
                    <input class="form_input" name="name" type="text" value="{{ $material->name }}" disabled>

                    <label>Tambah Jumlah</label>
                    <input class="form_input" placeholder="Tambah dengan jumlah yang diinginkan" name="quantity" type="text">

                <input type="submit" name="submit" class="form_submit" id="submit" value="Update" />
                </form>
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
