
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Terima Pelanggan</h2>

              <div class="page_content">

                <div class="contactform">
                <form action="{{ route('operator.clientStore') }}" method="POST">
                  {{ csrf_field() }}

                    <label>Nama</label>
                    <select class="form_select" name="title">
                      <option value="Mr.">Mr.</option>
                      <option value="Mrs.">Mrs.</option>
                    </select>
                    <input class="form_input" placeholder="Kika" name="name" type="text">

                    <label>Alamat</label>
                    <input class="form_input" placeholder="JL. Ngagel" name="address" type="text">

                    <label>Kota</label>
                    <input class="form_input" placeholder="Surabaya" name="city" type="text">

                    <label>No Kendaraan</label>
                    <input class="form_input" placeholder="L 5758 XY" name="no_kendaraan" type="text">

                    <label>Jenis</label>
                    <select class="form_select" name="jenis">
                      <option value="">Pilih Jenis</option>
                      @foreach($pricings as $pricing)
                      <option value="{{ $pricing->id }}">{{ $pricing->name }}</option>
                      @endforeach
                    </select>

                    <label>Telepon</label>
                    <input class="form_input" placeholder="03153264" name="phone" type="text">

                    <label>Email</label>
                    <input class="form_input" placeholder="kika@mail.com" name="email" type="text">

                <input type="submit" name="submit" class="form_submit" id="submit" value="Tambah" />
                </form>
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
