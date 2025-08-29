<form role="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <div class="input-group">

        <input type="search" name="s" aria-label="Pesquisar no site" class="form-control" placeholder="Pesquisar no site" value="<?php echo get_search_query(); ?>" />

        <div class="input-group-append">

            <button class="btn btn-form-menu" type="submit"><i class="fas fa-search"></i></button>

        </div>

    </div>

</form>