<?php
     add_action( 'wp', 'ta_na_home' );
    function ta_na_home() {
        $home = true;
        if ( is_front_page() ) {
            $home = true;
        } else{
            $home = false;
        }
        return $home;
    }

?>