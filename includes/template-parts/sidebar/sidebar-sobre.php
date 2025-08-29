 <?php

    // Substitua 'seu-login-de-usuario' pelo seu nome de usuário de login real
    $autor_do_blog = get_user_by('login', 'pipeline');
   
    $author_id = $autor_do_blog->ID;
    $avatar_data = get_the_author_meta('simple_local_avatar', $author_id);
    $avatar_id = $avatar_data['media_id'];
    $author_first_name = get_the_author_meta('first_name', $author_id);
    $author_last_name  = get_the_author_meta('last_name', $author_id);
    $author_desc       = get_the_author_meta('description', $author_id);

    ?>

 <!-- About Author Widget -->
 <div class="widget about-author-widget mb-40">
     <h5 class="widget-title">Sobre</h5>
     <div class="author-box">
        <?php  //print_var($autor_do_blog); ?>
         <?php echo pipe_get_img($avatar_id, false, 'small', 'lg-total'); ?>
         <h6>
             <?php echo esc_html($author_first_name); ?> <?php echo esc_html($author_last_name); ?>
         </h6>
         <p>
             <?php echo esc_html($author_desc); ?>
         </p> 

     </div>
 </div>