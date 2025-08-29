
<section class="bg-primary text-light cta-azul">
    <div class="container">
        <div class="row">
            <div class="col-12">
               <span>
                    <?php echo get_cta_label(); ?>
               </span>
               <?php $whats = get_afc_by_page_slug('telefone', 'home_config', 'informacoes-de-contato');?>
               <a title="Fala conosco pelo nosso WhatsApp" rel="noreferrer" target="_blank" href="https://wa.me/5551<?php echo str_replace(' ', '', $whats); ?>" class="btn btn-light text-v-center">
                     <i class="fa-brands fa-whatsapp large"></i> WhatsApp
               </a>
            </div>
        </div>
    </div>
</section>


