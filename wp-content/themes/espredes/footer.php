  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3><?php echo get_option('portal_input_0'); ?></h3>
            <p><?php echo get_option('portal_input_6'); ?>
              <br><br>
              <strong>Telefone:</strong> <?php echo get_option('portal_input_9'); ?><br>
              <strong>E-mail:</strong> <?php echo get_option('portal_input_10'); ?><br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto" href="/#about">Sobre</a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto" href="/#tabs">Informações</a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto" href="/#class">Disciplinas</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto" href="/#team">Professores</a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto" href="/#gallery">Galeria</a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto" href="/#contact">Contato</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Fique por dentro.</h4>
            <?php echo do_shortcode('[contact-form-7 id="213" title="Newsletter"]'); ?>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">        
        <div class="credits">
          Designed by <a target="_blank" href="https://portfolio.evertonm.com/">EvM</a>
        </div>
      </div>
      <div class="social-links text-center text-md-end pt-3 pt-md-0">        
        <a target="_blank" href="<?php echo get_option('portal_input_11'); ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a target="_blank" href="<?php echo get_option('portal_input_12'); ?>" class="instagram"><i class="bx bxl-instagram"></i></a>       
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo SITEPATH; ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo SITEPATH; ?>assets/js/main.js"></script>
  <script src="<?php echo SITEPATH; ?>assets/js/espredes.js"></script>

  <?php wp_footer(); ?>
  </body>

  </html>