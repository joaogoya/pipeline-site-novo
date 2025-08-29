 <!-- Search Widget -->
 <div class="widget search-widget mb-40">
     <h5 class="widget-title">Pesquise no site</h5>
     <form action="<?php echo esc_url(home_url('/')); ?>" role="search">
         <input type="search" name="s" placeholder="Pesquisar" id="search" value="<?php echo get_search_query(); ?>" />
         <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
     </form>
 </div>