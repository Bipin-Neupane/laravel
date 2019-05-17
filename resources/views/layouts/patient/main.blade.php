<div class="text-white text-center py-5" id="intro"
  style="background:url('https://mdbootstrap.com/img/Photos/Others/images/37.jpg');background-attachment:fixed;background-size:cover;">
  <div class="container px-5">
    <h1 style="font-family:Arial, Helvetica, sans-serif">
      ASK A DOCTOR ONLINE
    </h1>
    <p class="lead"> Get treatment from doctor online. Select doctors based on your health issues for online
      consultation through a simple chat or audio chat or video chat.</p>
  </div>
</div>

<div class="container">
  <section id="team" class="mt-4 mb-2">

    <!--Section heading-->
    <h1 class="text-center mb-5 mt-5 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">Meet
      our doctors</h1>
    <!--Section description-->
    <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">
      We have wide range of experienced doctors. Choose one whom you prefer. For more filter, go to category dropdown
      and choose from variety of doctors.<br />
      Click the name below to view more data about the doctor.
    </p>

    <!--First row-->
    <div class="row wow fadeIn" data-wow-delay="0.4s">

      <!--First column-->
      <div class="col-md-12">

        <div class="mb-2">

          <!-- Nav tabs -->
          <ul class="nav md-pills pills-primary flex-center" role="tablist">
            @foreach ($docs as $doc)
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#panel{{$doc->id}}" role="tab"><i
                  class="fas fa-heartbeat fa-2x"></i><br>
                {{$doc->first_name}}</a>
            </li>
            @endforeach
          </ul>

        </div>

        <!--Tab panels-->
        <div class="tab-content">

          @foreach ($docs as $doc)
          <div class="tab-pane fade" id="panel{{$doc->id}}" role="tabpanel">
            <br>

            <!--First row-->
            <div class="row d-flex justify-content-center">

              <!--First column-->
              <div class="col-lg-3 col-md-6 pb-5">

                <!--Featured image-->
                <div class="view overlay z-depth-1 z-depth-2">
                  @if ($doc->image)
                  <img src="{{url('img/doctor/profile/'.$doc->image)}}" class="img-fluid" alt="avatar image">
                  @else
                  <img src="{{url('img/avatar-d.png')}}" class="img-fluid" alt="avatar image">
                  @endif
                </div>
              </div>
              <!--/First column-->

              <!--Second column-->
              <div class="col-lg-6 col-md-12 text-left">

                <!--Title-->
                <h4 class="mb-3">{{$doc->first_name}} {{$doc->last_name}}</h4>

                <!--Description-->
                <p class="grey-text" align="justify">Speciality:
                  @switch($doc->category)
                  @case(0)
                  Physician
                  @break
                  @case(1)
                  Psychiatrist
                  @break
                  @default
                  --
                  @endswitch
                </p>

                <p class="grey-text" align="justify">Experience:
                  @switch($doc->experience)
                  @case(0)
                  1-2 yrs
                  @break
                  @case(1)
                  2-5 yrs
                  @break
                  @case(2)
                  5-10yrs
                  @break
                  @default
                  10+ yrs
                  @endswitch</p>

                <p class="grey-text" align='justify'>Rating: {{$doc->rating}}</p>
                <p class="grey-text mb-1" align='justify'>Email: {{$doc->email}}</p>
                <a href="{{route('profile', $doc->email)}}" class="btn blue-gradient">View
                  Profile</a>

              </div>
              <!--/Second column-->
            </div>
            <!--/First row-->

          </div>
          @endforeach
        </div>
        <!--/Tab panels-->

      </div>
      <!--/First column-->

    </div>
    <!--/First row-->

  </section>
</div>

<div class="py-5 grey lighten-4" id="user_manual">
  <div class="container">
    <h3 class=""> User Manual</h3>
    <div class="container">
      <ul>
        <li>
          <p> <strong>Step 1:</strong> Select Doctor's Category to find your specific doctor.</p>
          <img src="{{asset('img/step1.png')}}" class="img-fluid" alt="">
        </li>
        <li>
          <p>
            <strong>Step 2:</strong> After selecting Doctor's Category, you will be redirected to respective
            doctor's category page where you will be able to see all the doctor's profile. Furthermore,
            based on
            patient's rating, you will be provided with best reccommendations.
          </p>
          <img src="{{asset('img/aaa.jpg')}}" class="img-fluid" alt="">
        </li>
        <li>
          <p> <strong>Step 3:</strong> Choose one who you want to be your caretaker. You will be asked to
            confirm
            the treatment process.
          </p>
          <img src="{{asset('img/step1.png')}}" class="img-fluid" alt="">
        </li>
        <li>
          <p> <strong>Step 1:</strong> Once you confirm the selection process, you should wait for doctor's
            schedule for your online treatment. Doctor will see your request and provide you a date and time
            for
            your treatment. </p>
          <img src="{{asset('img/step1.png')}}" class="img-fluid" alt="">

        </li>

      </ul>
    </div>
  </div>
</div>