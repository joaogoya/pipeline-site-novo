<!--====== FOOTER PART START ======-->
<footer>

	<div class="footer-top">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-4">
					<div class="logo text-center text-sm-left">
						<a href="index.html">
							<?php
							$logo_azul_id = get_afc_by_page_slug('logo_fundo_azul', 'home_config', 'logos');
							echo pipe_get_img($logo_azul_id, false, 'small', '');
							?>
						</a>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="social-icon text-center text-sm-right">

						<a title="Fale conos por whatsapp" href="https://wa.me/55<?php echo str_replace(' ', '', get_afc_by_page_slug('telefone', 'home_config', 'informacoes-de-contato')); ?>">
							<i class="fa-brands fa-whatsapp"></i>
						</a>

						<a title="Visite nosso Facebook." href="<?php echo get_afc_by_page_slug('facebook', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
							<i class="fa-brands fa-facebook-f"></i>
						</a>

						<a title="Visite nosso Facebook." href="<?php echo get_afc_by_page_slug('instagram', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
							<i class="fa-brands fa-instagram"></i>
						</a>

						<a title="Visite nosso Facebook." href="<?php echo get_afc_by_page_slug('linkedin', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
							<i class="fa-brands fa-linkedin-in"></i>
						</a>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- widgets -->
	<div class="footer-widget-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="widget nav-widget d-flex justify-content-start">
						<div>
							<h5 class="widget-title">Categorias</h5>
							<ul>
								<li><a href="#">Sucesso dos clientes</a></li>
								<li><a href="#">Google Meu Negócio</a></li>
								<li><a href="#">Sites</a></li>
								<li><a href="#">Gooogle ADS</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="widget nav-widget d-flex justify-content-start justify-content-lg-center">
						<div>
							<h5 class="widget-title">Planos</h5>
							<ul>
								<li><a href="#">Basico</a></li>
								<li><a href="#">Profissional</a></li>
								<li><a href="#">Premium</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="widget nav-widget d-flex justify-content-start justify-content-lg-center">
						<div>
							<h5 class="widget-title">Serviços</h5>
							<ul>
								<li><a href="#">Google Meu Negócio</a></li>
								<li><a href="#">Sites</a></li>
								<li><a href="#">Google ADS</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="widget recent-post">
						<div>
							<h5 class="widget-title">Posts Recentes</h5>
							<div class="post-loop">


								<?php
								$next_args = array(
									'post_type' => 'post',
									'post_status' => 'publish',
									'posts_per_page' => 2,
									'order' => 'DESC',
									'orderby' => 'date',
								);

								$the_query = new WP_Query($next_args);

								if ($the_query->have_posts()) :
									while ($the_query->have_posts()) : $the_query->the_post();

										$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

										$dia = get_the_date('d');
										$mes = get_the_date('F');
										$ano = get_the_date('Y');
								?>
										<div class="post">
											<div class="post-img">
												<?php echo pipe_get_img(get_the_ID(), true, 'small', ''); ?>
											</div>
											<div class="post-desc">
												<span class="time"><i class="fal fa-calendar-alt"></i> <?php echo $dia; ?> de <?php echo $mes; ?> de <?php echo $ano; ?></span>
												<h5><a href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
													</a></h5>
											</div>
										</div>
								<?php endwhile;
									wp_reset_postdata();
								endif;
								?>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- copyright -->
	<div class="copy-right-area">
		<div class="container">
			<div class="copyrigt-text d-sm-flex justify-content-between">
				<p>Copyright By@<a href="#">AndroThemes</a> - 2020</p>
				<!-- <p>Design By@<a href="#">AndroThemes</a> - 2020</p> -->
			</div>
		</div>
	</div>
</footer>
<!--====== FOOTER PART END ======-->

</body>
<?php wp_footer(); ?>

</html>