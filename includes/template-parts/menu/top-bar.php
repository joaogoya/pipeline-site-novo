<!--====== HEADER START ======-->
<header class="header-two sticky-header">
    <div class="header-top-area">
        <div class="container-fluid custom-container-two">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-7">
                    <ul class="contact-list">
                        <li>
                            <a title="Fale conosco por e-mail." href="mailto:<?php echo get_afc_by_page_slug('e-mail', 'home_config', 'informacoes-de-contato'); ?>">
                                <?php echo get_afc_by_page_slug('e-mail', 'home_config', 'informacoes-de-contato'); ?>
                            </a>
                        </li>
                        <li>
                            <a title="Fale conos por whatsapp" href="https://wa.me/55<?php echo str_replace(' ', '', get_afc_by_page_slug('telefone', 'home_config', 'informacoes-de-contato')); ?>">
                                <?php echo get_afc_by_page_slug('telefone', 'home_config', 'informacoes-de-contato'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-5">
                    <ul class="social-link">

                        <li>
                            <a title="Visite nosso Facebook." href="<?php echo get_afc_by_page_slug('facebook', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
                                fb
                            </a>
                        </li>
                        <li>
                            <a title="Visite nosso Linkedin." href="<?php echo get_afc_by_page_slug('linkedin', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
                                link
                            </a>
                        </li>
                        <li>
                            <a title="Visite nosso instagram." href="<?php echo get_afc_by_page_slug('instagram', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
                                inst
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- fim topbar -->