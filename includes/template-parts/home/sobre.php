 <section class="about-section about-style-three pt-120 pb-120">
     <div class="container">
         <div class="row align-items-center justify-content-center">
             <div class="col-lg-6 col-md-10">
                 <div class="about-text pr-30">
                     <div class="section-title left-border mb-40">
                         <span class="title-tag">Seja bem vindo!</span>
                         <h2><?php echo get_afc_by_page_slug('titulo_quem_somos', 'home_config', 'quem-somos'); ?></h2>
                     </div>
                     <p>
                         <?php echo get_afc_by_page_slug('texto_quem_somos', 'home_config', 'quem-somos'); ?>
                     </p>
                     <div class="experience-tag mt-40">
                         <?php
                            $thumb_qs = get_afc_by_page_slug('miniatura_quem_somos', 'home_config', 'quem-somos');
                            echo pipe_get_img($thumb_qs, false, 'medium', 'img-fluid');
                            ?>

                     </div>
                 </div>
             </div>
             <div class="col-lg-6 col-md-10 order-first order-lg-last">
                 <div class="about-img">
                     <?php
                        $img_qs = get_afc_by_page_slug('imagem_quem_somos', 'home_config', 'quem-somos');
                        echo pipe_get_img($img_qs, false, 'medium', 'img-fluid');
                        ?>
                 </div>
             </div>
         </div>
     </div>
 </section>