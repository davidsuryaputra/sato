<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>

     <div id="pages_maincontent">

              <h2 class="page_title">Daftar Antrian {{ $showroomName }}</h2>

              <div class="page_content">

                <div class="blog-posts">

                <ul class="posts">
                  @foreach($queues as $queue)
                  <li>
                      <div class="post_entry">
                          <div class="post_date">
                            <span class="day">#{{ $queue->id}}</span>
                          </div>
                          <div class="post_title">
                          <h2>{{ $queue->no_kendaraan }}</h2>
                          </div>

                          <div class="buttons_container">
                            <!--
                            <a href="#" class="button button-fill color-green tombol">Proses Cuci</a>
                            <a href="#" class="button button-fill color-yellow tombol">Pengeringan</a>
                            <a href="#" class="button button-fill color-purple tombol">Selesai</a>
                          -->
                          @if($queue->status == 'Menunggu')
                            <a href="#" onclick="dicuci({{ $queue->id }}, 'Dicuci')" id="Dicuci{{ $queue->id }}" role="button" class="button button-fill color-blue tombol">Proses Cuci</a>
                            <br />
                            <a href="#" onclick="pengeringan({{ $queue->id }}, 'Pengeringan')" id="Pengeringan{{ $queue->id }}" role="button" class="button button-fill color-blue tombol disabled">Pengeringan</a>
                            <br />
                            <a href="#" onclick="selesai({{ $queue->id }}, 'Selesai')" id="Selesai{{ $queue->id }}" role="button" class="button button-fill color-blue tombol disabled">Selesai</a>
                            <br />
                            <!-- <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="button button-fill color-green disabled"><i class="fa fa-money"></i> Kasir</a> -->
                          @elseif($queue->status == 'Dicuci')
                          <a href="#" onclick="pengeringan({{ $queue->id }}, 'Pengeringan')" id="Pengeringan{{ $queue->id }}" role="button" class="button button-fill color-blue tombol">Pengeringan</a>
                          <br />
                          <a href="#" onclick="selesai({{ $queue->id }}, 'Selesai')" id="Selesai{{ $queue->id }}" role="button" class="button button-fill color-blue tombol disabled">Selesai</a>
                          <br />
                          <!-- <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="button button-fill color-green disabled"><i class="fa fa-money"></i> Kasir</a> -->
                          @elseif($queue->status == 'Pengeringan')
                            <a href="#" onclick="selesai({{ $queue->id }}, 'Selesai')" id="Selesai{{ $queue->id }}" role="button" class="button button-fill color-blue tombol">Selesai</a>
                            <br />
                            <!-- <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="button button-fill color-green disabled"><i class="fa fa-money"></i> Kasir</a> -->
                          @endif
                          </div>

                      </div>
                  </li>
                  @endforeach
                </ul>

                <div class="clear"></div>
                <div id="loadMore"><img src="mobix/images/load-more.png" alt="" title="" /></div>


                </div>
              </div>
      </div>


    </div>
  </div>
</div>
