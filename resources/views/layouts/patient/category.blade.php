@include('includes.head')
@include('layouts.partials.header')
<div class="container-fluid py-5" id="category">
  <div class="row">
    <div class="col-md-8 ml-5">
      <div class="row">
        @foreach ($category as $cat)
        <div class="col-md-4">
          <div class="card card-cascade narrower">
            <div class="view view-cascade overlay">
              <img class="card-img-top" src='{{url('img/doctor/profile/'.$cat->image)}}' alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <div class="card-body card-body-cascade">
              <h4>
                {{ucfirst($cat->first_name)}} {{ucfirst($cat->last_name)}}
              </h4>
              {{-- <p class="font-weight-normal mb-0">
                @if ($cat->category === 0)
                Physician
                @else
                Psychiatrist
                @endif
              </p> --}}
              <p class="font-weight-normal mb-0">
                Experience:
                @switch($cat->experience)
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
                @endswitch
              </p>
              <p class="font-weight-normal">Rating: {{$cat->rating}}</p>
              <button class="btn blue-gradient btn-rounded btn-block">Consult</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-md-3 mr-5">
      <div class="card">
        <div class="card-header">Recommended Docotors</div>
        <div class="card-body">
          <p></p>
          <p>{{$cat->first_name}}</p>
          <p>{{$cat->first_name}}</p>
          <p>{{$cat->first_name}}</p>
          <p>{{$cat->first_name}}</p>
          <p>{{$cat->first_name}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')