<div id="tab-3-panel" class="patients tab-panel py-3">
  <div class="container">
    <h2>List of Patients</h2>
    <table class="table">
      <tbody>
        @foreach ($patients as $key=>$pat)
        <tr class="">
          <th scope="row" class="">{{ ++$key }}</th>
          <td class="">{{$pat->first_name.' '.$pat->last_name}}</td>
          <td>
            <a href="{{ route('delete', $pat->email) }}" class="btn-link text-danger" onclick="event.preventDefault();
              document.getElementById('delete-form-p').submit();">
              Delete
            </a>
            <form id="delete-form-p" action="{{ route('delete', $pat->email) }}" method="POST" style="display: none;">
              @csrf
            </form>
          </td>
          <td>
            <a href="{{route('admin_profile', $pat->email)}}" class="btn-link text-primary">Go to Profile</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>