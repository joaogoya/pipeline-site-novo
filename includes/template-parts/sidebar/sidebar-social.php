<!-- Social Icon Widget -->
<div class="widget socail-widget mb-40">
    <h5 class="widget-title">Siga-nos e fale conosco</h5>
    <ul>
        <li>
            <a title="Fale conos por whatsapp" href="https://wa.me/55<?php echo str_replace(' ', '', get_afc_by_page_slug('telefone', 'home_config', 'informacoes-de-contato')); ?>">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </li>

        <li>
            <a title="Visite nosso Facebook." href="<?php echo get_afc_by_page_slug('facebook', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
        </li>

        <li>
            <a title="Visite nosso Facebook." href="<?php echo get_afc_by_page_slug('instagram', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>
        </li>

        <li>
            <a title="Visite nosso Facebook." href="<?php echo get_afc_by_page_slug('linkedin', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>
        </li>
    </ul>
</div>