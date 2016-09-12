
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Keterangan Manajer</h2>

              <div class="page_content">

                <div class="contactform">

                <label>Nama:</label>
                <p>{{ $manager->name }}</p>

                <label>Alamat</label>
                <p>{{ $manager->address }}</p>

                <label>Kota</label>
                <p>{{ $manager->city }}</p>

                <label>Telepon</label>
                <p>{{ $manager->phone }}</p>

                <label>Gaji</label>
                <p>{{ $manager->balance }}</p>

                <label>Tanggal Registrasi</label>
                <p>{{ $manager->created_at }}</p>

                <label>Pilihan</label>
                <a href="{{ route('owner.managers.destroy', $manager->id) }}" role="button" class="external button button-fill color-red">Delete</a>
                <br />
                <a href="{{ route('owner.managers.edit', $manager->id) }}" role="button" class="button button-fill color-red">Edit</a>
                <!-- <input type="submit" name="submit" class="form_submit" id="submit" value="Send" /> -->
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
@section('script')
@endsection
