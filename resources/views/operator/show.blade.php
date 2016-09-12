
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
                @if($queue->status == 'Menunggu')
                  <a href="#" onclick="dicuci({{ $queue->id }}, 'Dicuci')" id="Dicuci{{ $queue->id }}" role="button" class="button button-fill color-blue">Dicuci</a>
                  <br />
                  <a href="#" onclick="pengeringan({{ $queue->id }}, 'Pengeringan')" id="Pengeringan{{ $queue->id }}" role="button" class="button button-fill color-blue disabled">Pengeringan</a>
                  <br />
                  <a href="#" onclick="selesai({{ $queue->id }}, 'Selesai')" id="Selesai{{ $queue->id }}" role="button" class="button button-fill color-blue disabled">Selesai</a>
                  <br />
                  <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="button button-fill color-green disabled"><i class="fa fa-money"></i> Kasir</a>
                @elseif($queue->status == 'Dicuci')
                <a href="#" onclick="pengeringan({{ $queue->id }}, 'Pengeringan')" id="Pengeringan{{ $queue->id }}" role="button" class="button button-fill color-blue">Pengeringan</a>
                <br />
                <a href="#" onclick="selesai({{ $queue->id }}, 'Selesai')" id="Selesai{{ $queue->id }}" role="button" class="button button-fill color-blue disabled">Selesai</a>
                <br />
                <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="button button-fill color-green disabled"><i class="fa fa-money"></i> Kasir</a>
                @elseif($queue->status == 'Pengeringan')
                  <a href="#" onclick="selesai({{ $queue->id }}, 'Selesai')" id="Selesai{{ $queue->id }}" role="button" class="button button-fill color-blue">Selesai</a>
                  <br />
                  <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="button button-fill color-green disabled"><i class="fa fa-money"></i> Kasir</a>
                @elseif($queue->status == 'Selesai')
                  <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="button button-fill color-green"><i class="fa fa-money"></i> Kasir</a>
                @endif

                </div>

              </div>

      </div>


    </div>
  </div>
</div>
