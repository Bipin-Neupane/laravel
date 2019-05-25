<div id="tab-4-panel" class="pending tab-panel py-3">
  <div class="container">
    <h2>List of Pending Doctors</h2>
    <table class="table">
      <tbody>
        @foreach ($pending as $key=>$pen)
        <tr class="">
          <th scope="row" class="">{{ ++$key }}</th>
          <td class="">{{$pen->first_name.' '.$pen->last_name}}</td>
          <td>
            <a href="{{ route('delete', $pen->email) }}" class="btn-link text-danger" onclick="event.preventDefault();
                document.getElementById('delete-form').submit();">
              Delete
            </a>
            <form id="delete-form" action="{{ route('delete', $pen->email) }}" method="POST" style="display: none;">
              @csrf
            </form>
          </td>
          <td>
            <a href="{{route('admin_profile', $pen->email)}}" class="btn-link text-primary">Approve</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>