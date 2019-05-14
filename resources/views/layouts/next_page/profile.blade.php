@include('includes.head')
@include('layouts.partials.header')
<div class="grey lighten-4 py-4 text-center">
    <img src="{{url('img/doctor/profile/'.$profile->image)}}" alt="" class="rounded-circle"
        style="height:150px; width:150px;">
    <p class="lead py-2">{{$profile->first_name}} {{$profile->last_name}}</p>
</div>
<div class="container py-4">
    <h4 class="lead"> Category: {{$profile->category === 0 ? 'Physicain' : 'Psychiatrist'}}</h4>
</div>
@include('includes.footer')