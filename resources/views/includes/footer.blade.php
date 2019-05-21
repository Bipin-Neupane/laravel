<footer class="page-footer text-center text-md-left elegant-color pt-0">

  <div class="top-footer-color">
    <div class="container">
      <!--Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!--Grid column-->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-md-0">
          <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 col-lg-7 text-center text-md-right">
          <!--Facebook-->
          <a href="https://www.facebook.com/" target="_blank" class="p-2 m-2 fa-lg fb-ic ml-0"><i
              class="fab fa-facebook-f white-text mr-lg-4"> </i></a>
          <!--Twitter-->
          <a href="https://twitter.com/" target="_blank" class="p-2 m-2 fa-lg tw-ic"><i
              class="fab fa-twitter white-text mr-lg-4">
            </i></a>
          <!--Instagram-->
          <a href="https://www.instagram.com/" target="_blank" class="p-2 m-2 fa-lg ins-ic"><i
              class="fab fa-instagram white-text mr-lg-4"> </i></a>
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
    </div>
  </div>

  <!--Footer Links-->
  <div class="container mt-5 mb-4 text-center text-md-left">
    <div class="row mt-3">

      <!--First column-->
      <div class="col-md-5 mb-4">
        <h6 class="text-uppercase font-weight-bold"><strong>Virtual Clinic</strong></h6>
        <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>We provide a way for non emergency medical treatment to the patients through telecommunication. Our service
          is reliable, secure and easy to use. </p>
        <p>Our only objective is to provide quality medical services online for your convenience, engagement and
          satisfaction.</p>
      </div>
      <!--/.First column-->

      <!--Second column-->
      <div class="col-md-3 mx-auto mb-4">
        <h6 class="text-uppercase font-weight-bold"><strong>Technology Used</strong></h6>
        <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p><a href="https://laravel.com/" target="_blank">Laravel</a></p>
        <p><a href="https://reactjs.org/" target="_blank">React</a></p>
        <p><a href="https://www.mysql.com/" target="_blank">MySql</a></p>
        <p><a href="https://mdbootstrap.com/" target="_blank">Bootstrap</a></p>
      </div>
      <!--/.Second column-->

      <!--Third column-->
      <div class="col-md-4">
        <h6 class="text-uppercase font-weight-bold"><strong>Contact</strong></h6>
        <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p><i class="fas fa-home mr-3"></i>Kathmand, Nepal</p>
        <p><i class="fas fa-envelope mr-3"></i>clinic@virtual.com</p>
        <p><i class="fas fa-phone mr-3"></i> + 977 XXX XXXX XXX</p>
        <p><i class="fas fa-phone mr-3"></i> + 977 XXX XXXX XXX</p>
      </div>
      <!--/.Third column-->

    </div>
  </div>
  <!--/.Footer Links-->

  <!-- Copyright-->
  <div class="footer-copyright py-3 text-center wow fadeIn" data-wow-delay="0.3s">
    <div class="container-fluid">
      © 2019 Copyright: <span class="white-text">Virtual Clinic</span>
    </div>
  </div>
  <!--/.Copyright -->

</footer>
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script>
  // Animation init
    new WOW().init();
    // Select initiate
    $(document).ready(function() {
      $('.mdb-select').materialSelect();
    });
    $(function () {
      $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });
</script>
@if (Auth::user())
<script>
  window.user = {
    id: {{auth()->id()}},
    name: '{{auth()->user()->name}}'
  };
  window.csrfToken = "{{ csrf_token() }}";
</script>
@endif

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>

</html>