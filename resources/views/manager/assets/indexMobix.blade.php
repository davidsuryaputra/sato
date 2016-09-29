<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>

     <div id="pages_maincontent">

              <h2 class="page_title">Semua Aktiva Tetap</h2>

              <div class="page_content">

                <div class="blog-posts">

                <ul class="posts">
                  @foreach($assets as $asset)
                  <li>
                      <div class="post_entry">
                          <div class="post_title">
                          <h2><a href="{{ route('manager.assets.show', $asset->id )}}">{{ $asset->name }}</a></h2>
                          </div>
                      </div>
                  </li>
                  @endforeach
                </ul>

                <div class="clear"></div>
                <div id="loadMore"><a href="{{ route('manager.assets.create') }}"><img src="mobix/images/load_posts.png" alt="" title="" /></a></div>

                </div>
              </div>
      </div>


    </div>
  </div>
</div>
