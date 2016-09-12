
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Keterangan Aktiva Tetap</h2>

              <div class="page_content">

                <div class="contactform">

                <label>Nama</label>
                <p>{{ $asset->name }}</p>

                <label>Harga Pembelian</label>
                <p>{{ $asset->value }}</p>

                <label>Stock</label>
                <p>{{ $asset->stock }}</p>

                <label>Pilihan</label>
                <a href="{{ route('manager.assets.destroy', $asset->id) }}" role="button" class="external button button-fill color-red">Delete</a>
                <br />
                <a href="{{ route('manager.assets.stock', $asset->id) }}" role="button" class="button button-fill color-red">Tambah Stock</a>
                <!-- <input type="submit" name="submit" class="form_submit" id="submit" value="Send" /> -->
                </div>

              </div>

      </div>


    </div>
  </div>
</div>
