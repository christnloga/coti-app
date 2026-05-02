<div class="fixed-action-btn smooth-scroll animated bounceInUp" style="bottom: 45px; right: 24px;">
    <a href="#back-to-top" class="btn-floating btn-large cyan">
        <i class="fa fa-arrow-up"></i>
    </a>
</div>
<!-- Footer -->
<footer class="page-footer font-small altechs-gradient pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left wow fadeIn slow">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-lg-3 col-xl-3 mx-auto text-center mb-md-5">
        <img class="" src="<?php echo base_url(); ?>assets/images/logo/Logo-minimal-sm.png" style="max-height: 150px;" alt="">
        <h5 class="text-white text-uppercase font-weight-bold mt-3">Altechs Engineering Sarl</h5>
        <p>For Africa's Growth</p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Navigation</h6>
        <p>
          <a href="<?php echo base_url(); ?>home">Acceuil</a>
        </p>
        <p>
          <a href="">Qui sommes nous ?</a>
        </p>
        <p>
          <a href="">Services</a>
        </p>
        <p>
          <a href="">Portfolio</a>
        </p>
        <p>
          <a href="">Notre Equipe</a>
        </p>
        <p>
          <a href="">Contact</a>
        </p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
        <p>
          <a href="#!">Your Account</a>
        </p>
        <p>
          <a href="#!">Become an Affiliate</a>
        </p>
        <p>
          <a href="#!">Shipping Rates</a>
        </p>
        <p>
          <a href="#!">Help</a>
        </p>
      </div> -->

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fas fa-home mr-3"></i> Yaoundé, Cameroun</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> info@altechs.africa</p>
        <p>
          <i class="fas fa-phone mr-3"></i> (+237) 222 218 458</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row container d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <!--Copyright-->
        <p class="text-center text-md-left">Copyright © <?php echo Date('Y'); ?>
          <a href="<?php echo base_url() ?>">
            <strong> Altechs.africa</strong>
          </a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">

        <!-- Social buttons -->
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" target="_blank">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

</footer>
<!-- Footer -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parallax.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>


<script>
  $(document).ready(function() {

    $('.jarallax').jarallax({
      speed: 0.2
    });

  });

  new WOW().init();

  CKEDITOR.replace('mytext');
</script>

</body>

</html>