<form role="search" class="form-inline search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">     
        <input type="search" name="s" class="form-control" placeholder="Pesquisar" id="search" value="<?php echo get_search_query(); ?>" />
        <div class="input-group-append">
            <input type="submit" value="Pesquisar" class="btn btn-primary" >
        </div>
    </div>
</form>