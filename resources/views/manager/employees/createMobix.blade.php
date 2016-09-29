
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Tambah Pegawai</h2>

              <div class="page_content">

                <div class="contactform">
                <form action="{{ route('manager.employees.store') }}" method="POST">
                  {{ csrf_field() }}

                    <label>Nama</label>
                    <input class="form_input" placeholder="Mr. Kika" name="name" type="text">

                    <label>Alamat</label>
                    <input class="form_input" placeholder="JL. Ngagel" name="address" type="text">

                    <label>Kota</label>
                    <input class="form_input" placeholder="Surabaya" name="city" type="text">

                    <label>Email</label>
                    <input class="form_input" placeholder="kika@mail.com" name="email" type="text">

                    <label>Telepon</label>
                    <input class="form_input" placeholder="03153264" name="phone" type="text">

                    <label>Gaji</label>
                    <input class="form_input" placeholder="5000000" name="balance" type="text">

                    <label>Jabatan</label>
                    <select name="role" class="form_select">
                      <option>Pilih Jabatan</option>
                        <option value="3">Kasir</option>
                        <option value="4">Operator</option>
                    </select>

                    <label>Password</label>
                    <input class="form_input" name="password" type="password">

                    <label>Password Confirmation</label>
                    <input class="form_input" name="password_confirmation" type="password">

                <input type="submit" name="submit" class="form_submit" id="submit" value="Tambah" />
                </form>
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
