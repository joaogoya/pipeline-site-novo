<!--====== LATEST POST START ======-->
<section id="portfolio" class="latetest-post pt-120 pb-90">
	<div class="container">
		<div class="section-title text-center both-border mb-80">
			<span class="title-tag">Nosso</span>
			<h2>Portfólio</h2>
		</div>

		<!-- Blog Loop -->
		<div class="row justify-content-center">

			<?php
			$args = array(
				'post_type'      => 'portfolio', // CPT dos posts filhos. Ajuste se for outro CPT (ex: 'plano')
				'posts_per_page' => 3,            // Traz todos os filhos (no seu caso, os 3)
				'orderby'        => 'date',  // Opcional: ordena pela ordem que você definiu no painel
				'order'          => 'ASC',         // Ordem ascendente
				'post_status'    => 'publish',     // Apenas posts publicados
			);
			$loop_portifa = new WP_Query($args);

			?>

			<?php if ($loop_portifa->have_posts()) {

				while ($loop_portifa->have_posts()) {
					$loop_portifa->the_post();

					if (get_field('banner_do_projeto')) {
						$featured_img_url = wp_get_attachment_image_url( get_field('banner_do_projeto'), 'full' );
					} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
					}

			?>

					<div class="col-lg-4 col-md-6 col-sm-10">
						<div class="latest-post-box mb-30 text-center">
							<ul class="post-meta">
								<li><?php the_field('solucao'); ?></li>
							</ul>
							<div class="post-img mb" style="background-image: url( <?php echo $featured_img_url; ?> );"></div>
							<div class="post-desc mt-35">
								<h3>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h3>
								<p>
									<?php the_excerpt(); ?>
								</p>
								<a href="<?php the_permalink(); ?>" class="post-link"> Saiba Mais </a>
							</div>
						</div>
					</div>


			<?php

				} //fecha while

				wp_reset_postdata(); // Restaura os dados originais do post global
			}

			?>

		</div>

	</div>
</section>
<!--====== LATEST POST END ======-->