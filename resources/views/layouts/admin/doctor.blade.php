<div id="tab-2-panel" class="doctors tab-panel">
  <div class="row text-center py-3">
    <div class="col-lg-4 col-md-12 mb-1 add">
      <a class="btn peach-gradient py-2 btn-block" data-toggle="modal" data-target="#modalAddDoctor">Add
        Doctors</a>
      <div class="modal fade" id="modalAddDoctor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            @include('layouts.admin.add_doctor_form')
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-1 high">
      <a class="btn purple-gradient text-white py-2 btn-block">
        Highly Rated:
        @if ($highly_rated)
        {{$highly_rated->first_name.' '.$highly_rated->last_name.' ('.$highly_rated->rating.')'}}
        @else
        0
        @endif
      </a>
    </div>
    <div class="col-lg-4 col-md-12 low">
      <a class="btn purple-gradient text-white py-2 btn-block">
        Low Rated:
        @if ($low_rated)
        {{$low_rated->first_name.' '.$low_rated->last_name.' ('.$low_rated->rating.')'}}
        @else
        0
        @endif
      </a>
    </div>
  </div>
  <hr>
  <div class="container">
    <h2>List of Doctors</h2>
    <table class="table">
      <tbody>
        @foreach ($approved as $key=>$app)
        <tr class="">
          <th scope="row" class="">{{ ++$key }}</th>
          <td class="">{{$app->first_name.' '.$app->last_name}}</td>
          <td>
            <a href="{{ route('delete', $app->email) }}" class="btn-link text-danger" onclick="event.preventDefault();
              document.getElementById('delete-form').submit();">
              Delete
            </a>
            <form id="delete-form" action="{{ route('delete', $app->email) }}" method="POST" style="display: none;">
              @csrf
            </form>
          </td>
          <td>
            <a href="{{route('admin_profile', $app->email)}}" class="btn-link text-primary">Go to Profile</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>