
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Keterangan Antrian</h2>

              <div class="page_content">

                <div class="contactform">

                <label>No Kendaraan</label>
                <p>{{ $queue->no_kendaraan }}</p>

                <label>Jenis</label>
                <p>{{ $queue->item->name }}</p>

                <label>Status</label>
                <p class="status{{ $queue->id }}">{{ $queue->status }}</p>

                <label>Pilihan</label>
                <a href="{{ route('cashier.create', $queue->id )}}" role="button" class="button button-fill color-blue">Terima</a>

                </div>

              </div>

      </div>


    </div>
  </div>
</div>
