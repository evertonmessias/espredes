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
						<div class="icon-box" data-aos="fade-up" data-aos-delay="50">
							<a class="btn-accordion btn-accordion<?php echo $x ?>" title="Expandir" onclick="accordion(<?php echo $x ?>)"><i class="ri-draft-line"></i>
								<h4><?php echo get_the_title() ?></h4>
							</a>
							<div class="block block<?php echo $x ?>">
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

			<div class="row">

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="100">
						<div class="member-img">
							<img src="<?php echo SITEPATH; ?>assets/img/team/team-1.jpg" class="img-fluid" alt="">
							<div class="social">
								<a href=""><i class="bi bi-twitter"></i></a>
								<a href=""><i class="bi bi-facebook"></i></a>
								<a href=""><i class="bi bi-instagram"></i></a>
								<a href=""><i class="bi bi-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>Walter White</h4>
							<span>Chief Executive Officer</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="200">
						<div class="member-img">
							<img src="<?php echo SITEPATH; ?>assets/img/team/team-2.jpg" class="img-fluid" alt="">
							<div class="social">
								<a href=""><i class="bi bi-twitter"></i></a>
								<a href=""><i class="bi bi-facebook"></i></a>
								<a href=""><i class="bi bi-instagram"></i></a>
								<a href=""><i class="bi bi-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>Sarah Jhonson</h4>
							<span>Product Manager</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="300">
						<div class="member-img">
							<img src="<?php echo SITEPATH; ?>assets/img/team/team-3.jpg" class="img-fluid" alt="">
							<div class="social">
								<a href=""><i class="bi bi-twitter"></i></a>
								<a href=""><i class="bi bi-facebook"></i></a>
								<a href=""><i class="bi bi-instagram"></i></a>
								<a href=""><i class="bi bi-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>William Anderson</h4>
							<span>CTO</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="400">
						<div class="member-img">
							<img src="<?php echo SITEPATH; ?>assets/img/team/team-4.jpg" class="img-fluid" alt="">
							<div class="social">
								<a href=""><i class="bi bi-twitter"></i></a>
								<a href=""><i class="bi bi-facebook"></i></a>
								<a href=""><i class="bi bi-instagram"></i></a>
								<a href=""><i class="bi bi-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>Amanda Jepson</h4>
							<span>Accountant</span>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section><!-- End Team Section -->

	<!-- ======= Portfolio Section ======= -->
	<section id="portfolio" class="portfolio section-bg">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Fotos</h2>
			</div>

			<div class="row" data-aos="fade-up" data-aos-delay="100">
				<div class="col-lg-12 d-flex justify-content-center">
					<ul id="portfolio-flters">
						<li data-filter="*" class="filter-active">All</li>
						<li data-filter=".filter-app">App</li>
						<li data-filter=".filter-card">Card</li>
						<li data-filter=".filter-web">Web</li>
					</ul>
				</div>
			</div>

			<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

				<div class="col-lg-4 col-md-6 portfolio-item filter-app">
					<div class="portfolio-wrap">
						<img src="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>App 1</h4>
							<p>App</p>
							<div class="portfolio-links">
								<a href="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-web">
					<div class="portfolio-wrap">
						<img src="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Web 3</h4>
							<p>Web</p>
							<div class="portfolio-links">
								<a href="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-app">
					<div class="portfolio-wrap">
						<img src="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>App 2</h4>
							<p>App</p>
							<div class="portfolio-links">
								<a href="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-card">
					<div class="portfolio-wrap">
						<img src="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Card 2</h4>
							<p>Card</p>
							<div class="portfolio-links">
								<a href="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-web">
					<div class="portfolio-wrap">
						<img src="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Web 2</h4>
							<p>Web</p>
							<div class="portfolio-links">
								<a href="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-app">
					<div class="portfolio-wrap">
						<img src="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>App 3</h4>
							<p>App</p>
							<div class="portfolio-links">
								<a href="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-card">
					<div class="portfolio-wrap">
						<img src="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Card 1</h4>
							<p>Card</p>
							<div class="portfolio-links">
								<a href="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-card">
					<div class="portfolio-wrap">
						<img src="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Card 3</h4>
							<p>Card</p>
							<div class="portfolio-links">
								<a href="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-web">
					<div class="portfolio-wrap">
						<img src="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Web 3</h4>
							<p>Web</p>
							<div class="portfolio-links">
								<a href="<?php echo SITEPATH; ?>assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section><!-- End Portfolio Section -->

	<!-- ======= Testimonials Section ======= -->
	<section id="testimonials" class="testimonials">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2>Depoimentos</h2>
			</div>

			<div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
				<div class="swiper-wrapper">

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="<?php echo SITEPATH; ?>assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
								<h3>Saul Goodman</h3>
								<h4>Ceo &amp; Founder</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="<?php echo SITEPATH; ?>assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
								<h3>Sara Wilsson</h3>
								<h4>Designer</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="<?php echo SITEPATH; ?>assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
								<h3>Jena Karlis</h3>
								<h4>Store Owner</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="<?php echo SITEPATH; ?>assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
								<h3>Matt Brandon</h3>
								<h4>Freelancer</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="<?php echo SITEPATH; ?>assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
								<h3>John Larson</h3>
								<h4>Entrepreneur</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat esse veniam culpa fore nisi cillum quid.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->

				</div>
				<div class="swiper-pagination"></div>
			</div>

		</div>
	</section><!-- End Testimonials Section -->

	<!-- ======= Frequently Asked Questions Section ======= -->
	<section id="faq" class="faq section-bg">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Perguntas Frequentes</h2>
			</div>

			<ul class="faq-list accordion" data-aos="fade-up">

				<li>
					<a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq1" class="collapse" data-bs-parent=".faq-list">
						<p>
							Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
						</p>
					</div>
				</li>

				<li>
					<a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq2" class="collapse" data-bs-parent=".faq-list">
						<p>
							Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
						</p>
					</div>
				</li>

				<li>
					<a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq3" class="collapse" data-bs-parent=".faq-list">
						<p>
							Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
						</p>
					</div>
				</li>

				<li>
					<a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq4" class="collapse" data-bs-parent=".faq-list">
						<p>
							Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
						</p>
					</div>
				</li>

				<li>
					<a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq5" class="collapse" data-bs-parent=".faq-list">
						<p>
							Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
						</p>
					</div>
				</li>

				<li>
					<a data-bs-toggle="collapse" data-bs-target="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
					<div id="faq6" class="collapse" data-bs-parent=".faq-list">
						<p>
							Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
						</p>
					</div>
				</li>

			</ul>

		</div>
	</section><!-- End Frequently Asked Questions Section -->

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Contato</h2>
			</div>

			<div class="row" data-aos="fade-up" data-aos-delay="100">

				<div class="col-lg-6">

					<div class="row">
						<div class="col-md-12">
							<div class="info-box">
								<i class="bx bx-map"></i>
								<h3>Our Address</h3>
								<p>A108 Adam Street, New York, NY 535022</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="info-box mt-4">
								<i class="bx bx-envelope"></i>
								<h3>Email Us</h3>
								<p>info@example.com<br>contact@example.com</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="info-box mt-4">
								<i class="bx bx-phone-call"></i>
								<h3>Call Us</h3>
								<p>+1 5589 55488 55<br>+1 6678 254445 41</p>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-6">
					<form action="forms/contact.php" method="post" role="form" class="php-email-form">
						<div class="row">
							<div class="col form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
							</div>
							<div class="col form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
						</div>
						<div class="my-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your message has been sent. Thank you!</div>
						</div>
						<div class="text-center"><button type="submit">Send Message</button></div>
					</form>
				</div>

			</div>

		</div>
	</section><!-- End Contact Section -->

</main><!-- End #main -->
<?php get_footer(); ?>