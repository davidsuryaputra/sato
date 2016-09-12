<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>

     <div id="pages_maincontent">

              <h2 class="page_title">Daftar Transaksi {{ $showroomName }}</h2>

              <div class="page_content">

                <div class="blog-posts">

                <ul class="posts">
                  @foreach($transactions as $transaction)
                  <li>
                      <div class="post_entry">
                          <div class="post_date">
                            <span class="day">#{{ $transaction->id}}</span>
                          </div>
                          <div class="post_title">
                          <h2><a href="{{ route('cashier.show', $transaction->id )}}">{{ $transaction->customer->name }}</a></h2>
                          </div>
                      </div>
                  </li>
                  @endforeach
                </ul>

                </div>
              </div>
      </div>


    </div>
  </div>
</div>
