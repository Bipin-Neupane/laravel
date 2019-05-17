@include('includes.head')
<header style="margin-top: -55px;">

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
      <a class="navbar-brand" href="#"><strong>Virtual Clinic</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!--Links-->
        <ul class="navbar-nav ml-auto smooth-scroll">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about" data-offset="80">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features" data-offset="80">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#testimonials" data-offset="80">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/Navbar-->

  <!--Intro Section-->
  <section id="home" class="min-vh-100"
    style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/37.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask">
      <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row pt-5 mt-3">
          <div class="col-12 col-md-6 text-center text-md-left">
            <div class="white-text">
              <h1 class="h1-responsive font-weight-bold mt-md-5 mt-0 wow fadeInLeft" data-wow-delay="0.3s">Virtal Clinic
              </h1>
              <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
              <p class="wow fadeInLeft mb-3" data-wow-delay="0.3s">
                We provide a way for non emergency medical treatment to the patients through telecommunication. Our
                service is reliable, secure and easy to use.
                Register Now to get full feature available through this website.
              </p>
              <br>
              <a href="{{route('login')}}" class="btn btn-unique btn-rounded font-weight-bold ml-lg-0 wow fadeInLeft"
                data-wow-delay="0.3s">Login</a>
              <a href="{{route('register')}}" class="btn btn-outline-white btn-rounded font-weight-bold wow fadeInLeft"
                data-wow-delay="0.3s">Register
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Modal Info-->
  <div class="modal fade modal-ext" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 py-3" id="myModalLabel">Information about clinic</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body text-center">

          <!--Title-->
          <h5 class="title mb-3 font-weight-bold">Opening hours:</h5>

          <!--Opening hours table-->
          <table class="table">
            <tbody>
              <tr>
                <td>Monday - Friday:</td>
                <td>8 AM - 9 PM</td>
              </tr>
              <tr>
                <td>Saturday:</td>
                <td>9 AM - 6 PM</td>
              </tr>
              <tr>
                <td>Sunday:</td>
                <td>11 AM - 6 PM</td>
              </tr>
            </tbody>
          </table>

          <!--Title-->
          <h5 class="title mb-4 font-weight-bold">Addresses:</h5>

          <!--First row-->
          <div class="row">

            <!--First column-->
            <div class="col-md-6">

              <p>125 Street<br> New York, NY 10012</p>

            </div>
            <!--/First column-->

            <!--Second column-->
            <div class="col-md-5">

              <p>Allen Street 5<br> New York, NY 10012</p>

            </div>
            <!--/Second column-->

          </div>
          <!--/First row-->

        </div>
        <!--Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-rounded btn-info waves-effect" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!--/Content-->
    </div>
  </div>
  <!--/Modal Info-->

</header>
<!--/Navigation & Intro-->

<!--Main content-->
<main>

  <div class="container">

    <!--Section: Features v.1-->
    <section id="features" class="mt-4 mb-5 pb-5">

      <!--Section heading-->
      <h1 class="text-center mb-5 mt-5 pt-5 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
        Professional
        treatments</h1>
      <!--Section sescription-->
      <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">
        Virtual Clinic provide a way for non emergency medical treatment to the patients through telecommunication. Our
        service is reliable, secure and easy to use.
      </p>

      <!--First row-->
      <div class="row features-big my-4 text-center">
        <!--First column-->
        <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
          <div class="card hoverable">
            <i class="fas fa-heart blue-text mt-3 fa-3x my-4"></i>
            <h5 class="font-weight-bold mb-4"">Experience</h5>
              <p class=" grey-text font-small mx-3">
              We have doctors who are experienced in their field from 2 years to 10 years or more. You have
              choice to choose doctors of your choice.
              </p fa-3x mb-4>
          </div>
        </div>
        <!--/First column-->

        <!--Second column-->
        <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
          <div class="card hoverable">
            <i class="far fa-eye blue-text mt-3 fa-3x my-4"></i>
            <h5 class="font-weight-bold mb-4">Reliable</h5>
            <p class="grey-text font-small mx-3">
              Since we have experienced doctors they are more reliable and have vision to provide high quality
              treatments.
            </p>
          </div>
        </div>
        <!--/Second column-->

        <!--Third column-->
        <div class="col-md-4 mb-1 wow fadeIn" data-wow-delay="0.4s">
          <div class="card hoverable">
            <i class="fas fa-briefcase-medical blue-text mt-3 fa-3x my-4"></i>
            <h5 class="font-weight-bold mb-4"">Qualifications</h5>
              <p class=" grey-text font-small mx-3">
              For doctors who want to part of our program, you should have at least 2 years of experience in your field
              and provide legit documents.
              </p>
          </div>
        </div>
        <!--/Third column-->
      </div>
      <!--/First row-->

    </section>
    <!--/Section: Features v.1-->
  </div>

  <div id="home" class="container-fluid">

    <!--Grid row-->
    <div class="row my-5">

      <!--Grid column-->
      <div class="col-md-12">

        <!--Tiles blog-->
        <div>
          <!--First row-->
          <div class="row">
            <!--First column-->
            <div class="col-xl-3 col-md-6 px-0">
              <!--Single blog post-->
              <div class="waves-effect waves-light">
                <!--Blog post link-->
                <a href="#!">
                  <!--Image-->
                  <div class="view overlay">

                    <img src="https://mdbootstrap.com/img/Photos/Others/images/40.jpg" class="img-fluid" alt="">

                    <div class="mask flex-center rgba-blue-strong">
                      <h4 class="white-text font-weight-bold">Secure</h4>
                    </div>
                  </div>
                  <!--/Image-->
                </a>
                <!--Blog post link-->

              </div>
              <!--/Single blog post-->
            </div>
            <!--/First column-->

            <!--Second column-->
            <div class="col-xl-3 col-md-6 px-0">
              <!--Single blog post-->
              <div class="waves-effect waves-light">
                <!--Blog post link-->
                <a href="#!">
                  <!--Image-->
                  <div class="view overlay">

                    <img src="https://mdbootstrap.com/img/Photos/Others/images/39.jpg" class="img-fluid" alt="">

                    <div class="mask flex-center rgba-blue-strong">
                      <h4 class="white-text font-weight-bold">Fast</h4>
                    </div>
                  </div>
                  <!--/Image-->
                </a>
                <!--Blog post link-->

              </div>
              <!--/Single blog post-->
            </div>
            <!--/Second column-->

            <!--Third column-->
            <div class="col-xl-3 col-md-6 px-0">
              <!--Single blog post-->
              <div class="waves-effect waves-light">
                <!--Blog post link-->
                <a href="#!">
                  <!--Image-->
                  <div class="view overlay">

                    <img src="https://mdbootstrap.com/img/Photos/Others/images/38.jpg" class="img-fluid" alt="">

                    <div class="mask flex-center rgba-blue-strong">
                      <h4 class="white-text font-weight-bold">Modern</h4>
                    </div>
                  </div>
                  <!--/Image-->
                </a>
                <!--Blog post link-->

              </div>
              <!--/Single blog post-->
            </div>
            <!--/Third column-->

            <!--Fourth column-->
            <div class="col-xl-3 col-md-6 px-0">
              <!--Single blog post-->
              <div class="waves-effect waves-light">
                <!--Blog post link-->
                <a href="#!">
                  <!--Image-->
                  <div class="view overlay">

                    <img src="https://mdbootstrap.com/img/Photos/Others/images/41.jpg" class="img-fluid" alt="">

                    <div class="mask flex-center rgba-blue-strong">
                      <h4 class="white-text font-weight-bold">Reliable</h4>
                    </div>
                  </div>
                  <!--/Image-->
                </a>
                <!--Blog post link-->
              </div>
              <!--/Single blog post-->
            </div>
            <!--/Fourth column-->
          </div>
          <!--/First row-->

        </div>

      </div>
      <!--/Grid column-->

    </div>
    <!--/Grid row-->

  </div>

  <div class="container">

    <!--Section: About-->
    <section id="about" class="info-section mb-5 mt-5 pt-4">

      <!--First row-->
      <div class="row pt-5">

        <!--First column-->
        <div class="col-md-7 mb-2 smooth-scroll wow fadeIn" data-wow-delay="0.2s">

          <!--Heading-->
          <h2 class="mb-3 font-weight-bold">We Provide High Quality services</h2>
          <!--Description-->
          <h4 class="mb-5 dark-grey-text">Register to Virtual Clinic</h4>
          <!--Content-->
          <p class="grey-text" align="justify">
            There is no reason to deny joining us. We become better with your support side by side. Our only objective
            is to provide quality medical services online for your convenience, engagement and satisfaction. We hold
            highly of your opinions and be better as time passes.
          </p>

          <p class="grey-text" align="justify">
            Tired of visiting hospitals in non emergency cases? Make sure you try us.
          </p>
          <br>
          <!--Button-->
          <a href="{{route('register')}}" class="btn btn-rounded btn-blue mb-4">Register today</a>

        </div>
        <!--/First column-->

        <!--Second column-->
        <div class="col-lg-4 flex-center ml-lg-auto col-md-5 mb-5 wow fadeIn" data-wow-delay="0.3s">

          <!--Image-->
          <img src="https://mdbootstrap.com/img/Photos/Vertical/People/img%20%282%29.jpg" class="img-fluid z-depth-1">

        </div>
        <!--/Second column-->

      </div>
      <!--/First row-->

    </section>
    <!--Section: About-->

  </div>

  <!--Streak-->
  <div class="streak streak-photo streak-long-2"
    style="background-image: url('https://mdbootstrap.com/img/Others/doctor.jpg');">
    <div class="flex-center mask rgba-blue-strong">
      <div class="container text-center white-text">
        <h3 class="text-center text-white text-uppercase font-weight-bold mt-5 mb-5 pt-3 wow fadeIn"
          data-wow-delay="0.2s">Great
          people trusted our services</h3>

        <!--First row-->
        <div class="row text-white text-center wow fadeIn" data-wow-delay="0.2s">

          <!--First column-->
          <div class="col-md-3 mt-2">
            <h1 class="white-text font-weight-bold">+950</h1>
            <p>Doctors</p>
          </div>
          <!--/First column-->

          <!--Second column-->
          <div class="col-md-3 mt-2">
            <h1 class="white-text font-weight-bold">+150</h1>
            <p>University</p>
          </div>
          <!--/Second column-->

          <!--Third column-->
          <div class="col-md-3 mt-2">
            <h1 class="white-text font-weight-bold">+85</h1>
            <p>Hospitals</p>
          </div>
          <!--/Third column-->

          <!--Fourth column-->
          <div class="col-md-3 mt-2 mb-5 pb-3">
            <h1 class="white-text font-weight-bold">+6K</h1>
            <p>People</p>
          </div>
          <!--/Fourth column-->

        </div>
        <!--/First row-->

      </div>
    </div>
  </div>
  <!--/Streak-->


  <div class="container">

    <!--Section: Testimonials v.2-->
    <section id="testimonials" class="mb-5 pb-4">

      <!--Section heading-->
      <h1 class="text-center mb-5 mt-5 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">What
        Clients said:</h1>

      <div class="wrapper-carousel-fix">

        <!--Carousel Wrapper-->
        <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade wow fadeIn"
          data-wow-delay="0.4s" data-ride="carousel" data-interval="false">

          <!--Slides-->
          <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">

              <div class="testimonial text-center">
                <!--Avatar-->
                <div class="avatar mx-auto mb-4">
                  <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2820%29.jpg"
                    class="rounded-circle img-fluid">
                </div>
                <!--Content-->
                <p><i class="fas fa-quote-left"></i>
                  Today, Virtual Clinic and telemedicine are converging to make web telemedicine a reality.
                </p>

                <h4>Anna Deynah</h4>
              </div>

            </div>
            <!--/First slide-->

            <!--Second slide-->
            <div class="carousel-item">

              <div class="testimonial text-center">
                <!--Avatar-->
                <div class="avatar mx-auto mb-4">
                  <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2817%29.jpg"
                    class="rounded-circle img-fluid">
                </div>
                <!--Content-->
                <p><i class="fas fa-quote-left"></i>
                  It provides great service and is very reliable. I am totally satisfied with their service and
                  recommend to others too.
                </p>

                <h4>Maria Kate</h4>
              </div>

            </div>
            <!--/Second slide-->

            <!--Third slide-->
            <div class="carousel-item">

              <div class="testimonial text-center">
                <!--Avatar-->
                <div class="avatar mx-auto mb-4">
                  <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg"
                    class="rounded-circle img-fluid">
                </div>
                <!--Content-->
                <p><i class="fas fa-quote-left"></i>
                  Better technology has helped make tele health more user friendly and accessible for people like us.
                </p>

                <h4>John Doe</h4>
              </div>

            </div>
            <!--/Third slide-->
          </div>
          <!--/Slides-->

          <!--Controls-->
          <a class="carousel-control-prev left carousel-control" href="#carousel-example-1" role="button"
            data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <!--/.Controls-->
        </div>
        <!--/Carousel Wrapper-->
      </div>

    </section>
    <!--/Section: Testimonials v.2-->

  </div>

</main>
@include('includes.footer')