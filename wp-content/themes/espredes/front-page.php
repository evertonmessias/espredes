<?php get_header(); ?>
<?php
if ($_SERVER['REMOTE_ADDR'] != "143.106.16.179" && $_SERVER['REMOTE_ADDR'] != "177.55.129.61") {
	registerdb($_SERVER['REMOTE_ADDR']);
}
?>

<!-- ======= Hero Section ======= -->

<!-- ======= Hero Section ======= -->
<section id="hero" style="background: url('<?php echo get_option('portal_input_2'); ?>') top center no-repeat;" class="d-flex align-items-center">

	<div class="container" data-aos="zoom-out" data-aos-delay="100">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="center"><?php echo get_option('portal_input_3'); ?></h1>
				<hr class="Center">
				<h2 class="center"><?php echo get_option('portal_input_4'); ?></h2>
				<a href="#about" class="btn-get-started scrollto Center">Saiba mais</a>
			</div>
		</div>
	</div>

</section><!-- End Hero -->

<main id="main">

	<!-- ======= About Section ======= -->
	<section id="about" class="about">
		<div class="container" data-aos="fade-up">

			<div class="row no-gutters">
				<div class="col-xl-1">
				</div>
				<div class="col-xl-10">
					<?php echo get_option('portal_input_5'); ?>
				</div>
				<div class="col-xl-1">
				</div>
			</div>
		</div>
	</section><!-- End About Section -->

	<!-- ======= Counts Section ======= -->
	<section id="counts" class="counts section-bg">
		<div class="container" data-aos="fade-up">

			<div class="row">

				<div class="col-lg-4">
					<div class="count-box">
						<i class="ri-book-3-fill"></i>
						<span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="2" class="purecounter"></span>
						<p><a href="#tabs" class="get-started-btn scrollto">Cursos</a></p>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="count-box">
						<i class="ri-draft-line"></i>
						<span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2" class="purecounter"></span>
						<p><a href="#class" class="get-started-btn scrollto">Disciplinas</a></p>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="count-box">
						<i class="ri-team-fill"></i>
						<span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="2" class="purecounter"></span>
						<p><a href="#team" class="get-started-btn scrollto">Professores</a></p>
					</div>
				</div>

			</div>

		</div>
	</section><!-- End Counts Section -->

	<!-- ======= Tabs Section ======= -->
	<section id="tabs" class="tabs">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Informações</h2>
			</div>

			<ul class="nav nav-tabs row d-flex">
				<?php
				$x = 1;
				$args = array(
					'post_type' => 'informacoes',
					'orderby' => 'ID',
					'order' => 'ASC'
				);
				$loop = new WP_Query($args);
				while ($loop->have_posts()) {
					$loop->the_post();
				?>
					<li class="nav-item col-4">
						<a class="nav-link <?php if ($x == 1) echo "active show"; ?>" data-bs-toggle="tab" data-bs-target="#tab-<?php echo $x; ?>">
							<i class="<?php echo get_post_meta($post->ID, 'informacoes_icone', true); ?>"></i>
							<h4 class="d-none d-lg-block"><?php echo get_the_title() ?></h4>
						</a>
					</li>
				<?php $x++;
				}
				wp_reset_postdata();	?>
			</ul>

			<div class="tab-content">
				<?php
				$x = 1;
				while ($loop->have_posts()) {
					$loop->the_post();
				?>
					<div class="tab-pane <?php if ($x == 1) echo "active show"; ?>" id="tab-<?php echo $x; ?>">
						<div class="row">
							<?php if ($post->post_name != "calendario") { ?>
								<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
									<?php the_content() ?>
								</div>
								<div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
									<img src="<?php if (has_post_thumbnail()) the_post_thumbnail_url('full');
												else echo SITEPATH . "assets/img/semimagem.png"; ?>" class="img-fluid" title="<?php the_title() ?>">
								</div>
							<?php } else { ?>
								<div class="col-lg-12 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
									<?php the_content() ?>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php $x++;
				}
				wp_reset_postdata();	?>
			</div>

		</div>
	</section><!-- End Tabs Section -->

	<!-- ======= Services Section ======= -->
	<section id="class" class="services section-bg">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Disciplinas</h2>
			</div>

			<div class="row">
				<?php
				$x = 1;
				$args = array(
					'post_type' => 'disciplina',
					'posts_per_page' => 100
				);
				$loop = new WP_Query($args);
				while ($loop->have_posts()) {
					$loop->the_post();
				?>
					<div class="col-md-12 box">
						<div class="icon-box">
							<a class="btn-accordion btn-accordion2 btn-accordion2<?php echo $x ?>" title="Expandir" data-section="2" data-accordion="<?php echo $x ?>">
								<i class="ri-draft-line"></i>
								<h4><?php echo get_the_title() ?><i class="bx bx-caret-down"></i></h4>
							</a>
							<div class="block block2 block2<?php echo $x ?>">
								<h5><strong>Professor(es):</strong>&ensp;<?php echo get_post_meta($post->ID, 'disciplina_professor', true); ?></h5>
								<h5><strong>Carga Horária:</strong>&ensp;<?php echo get_post_meta($post->ID, 'disciplina_carga', true); ?> h</h5>
								<?php the_content() ?>
							</div>
						</div>
					</div>

				<?php $x++;
				}
				wp_reset_postdata();
				?>

			</div>

		</div>
	</section><!-- End Services Section -->

	<!-- ======= Team Section ======= -->
	<section id="team" class="team">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Professores</h2>
			</div>
			<br>
			<div class="team-slider swiper">
				<div class="swiper-wrapper align-items-center">

					<?php
					$args = array(
						'post_type' => 'professor',
						'posts_per_page' => 100,
						'orderby' => 'name',
						'order' => 'ASC'
					);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) {
						$loop->the_post();
						if (has_post_thumbnail()) {
							$imagem = get_the_post_thumbnail_url($post->ID, 'full');
						} else {
							$imagem = SITEPATH . "assets/img/semimagem.png";
						}
					?>
						<div class="swiper-slide">
							<div class="member">
								<div class="member-img">
									<img src="<?php echo $imagem; ?>" class="img-fluid" title="<?php echo get_the_title() ?>">
									<?php if (get_post_meta($post->ID, 'professor_url', true) != "") { ?>
										<div class="social">
											<a target="_blank" href="<?php echo get_post_meta($post->ID, 'professor_url', true); ?>"><i class="ri-external-link-fill"></i></a>
										</div>
									<?php } ?>
								</div>
								<div class="member-info">
									<h4><?php echo get_the_title() ?></h4>
									<span><?php echo get_post_meta($post->ID, 'professor_local', true); ?></span>
								</div>
							</div>
						</div>

					<?php
					}
					wp_reset_postdata();
					?>

				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section><!-- End Team Section -->

	<!-- ======= Portfolio ======= -->
	<section id="gallery" class="portfolio section-bg">
		<div class="container" data-aos="fade-up">
			<?php
			$argsCat = array(
				'orderby'       => 'id',
				'order'         => 'DESC'
			);
			$categories = get_terms('category', $argsCat);
			foreach ($categories as $category) {
				$cat_portfolio[] = $category->slug;
			}
			?>

			<div class="section-title">
				<h2>Galeria</h2>
			</div>

			<div class="row" data-aos="fade-up" data-aos-delay="100">
				<div class="col-lg-12 d-flex justify-content-center">
					<ul id="portfolio-flters" class="portfolio-ul">
						<li data-filter="*" class="filter-active">Todos</li>
						<?php
						foreach ($categories as $category) {
							if ($category->slug != "sem-categoria") { ?>
								<li data-filter=".filter-<?php echo $category->slug; ?>"><?php echo $category->name; ?></li>
						<?php }
						} ?>
					</ul>
				</div>
			</div>

			<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

				<?php foreach ($categories as $category) {
					$args = array(
						'category_name' => $category->slug,
						'post_type' => 'post',
						'orderby' => 'id',
						'order' => 'DESC',
						'posts_per_page' => 10
					);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) {
						$loop->the_post();
						if (has_post_thumbnail()) {
							$imagem = get_the_post_thumbnail_url(get_the_ID(), 'full');
						} else {
							$imagem = SITEPATH . "assets/img/semimagem.png";
						}
				?>
						<div class="col-lg-4 portfolio-item filter-<?php echo $category->slug; ?>">
							<div class="portfolio-wrap">
								<img src="<?php echo $imagem; ?>" class="img-fluid" title="<?php echo get_the_title() ?>">
								<div class="portfolio-info">
									<div class="portfolio-links">
										<a href="<?php echo $imagem; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo get_the_title() ?>"><i class="bx bx-plus"></i></a>
									</div>
								</div>
							</div>
						</div>
				<?php }
					wp_reset_postdata();
				} ?>
			</div>
		</div>
	</section><!-- End Portfolio Section -->

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container">
			<div class="section-title">
				<h2>CONTATO</h2>
			</div>
		</div>
		<div class="container">

			<div class="row mt-5">

				<div class="col-lg-6">

					<div class="row">
						<div class="col-md-12">
							<div class="info-box">
								<i class="bx bx-map"></i>
								<h3>Endereço</h3>
								<p><?php echo get_option('portal_input_6'); ?></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="info-box mt-4">
								<i class="bx bx-envelope"></i>
								<h3>E-mail</h3>
								<p><a href="mailto:<?php echo get_option('portal_input_10'); ?>"><?php echo get_option('portal_input_10'); ?></a></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="info-box mt-4">
								<i class="bx bx-phone-call"></i>
								<h3>Telefone</h3>
								<p><?php echo get_option('portal_input_9'); ?></p>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-6">
					<div class="php-email-form">
						<?php echo do_shortcode('[contact-form-7 id="130" title="Contato"]'); ?>
					</div>
				</div>

			</div>

		</div>
		<div class="google-maps">
			<iframe style="border:0; width: 100%; height: 350px;" src="<?php echo get_option('portal_input_7'); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
	</section><!-- End Contact Section -->

</main><!-- End #main -->
<?php get_footer(); ?>