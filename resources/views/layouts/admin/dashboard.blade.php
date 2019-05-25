<div id="tab-1-panel" class="dashboard tab-panel show-tab">
  <div class="row">
    <div class="col-md-4">
      <div class="card chart-card peach-gradient">
        <div class="card-body pb-0">
          <h4 class="card-title font-weight-bold">Users</h4>
          <p class="card-text mb-4">Till date: {{Carbon\Carbon::now()}}</p>
          <div class="d-flex justify-content-between">
            <p class="display-4 align-self-end"> {{$total_user}} Users</p>
          </div>
          <div class="d-flex justify-content-between">
            <p class="align-self-end">{{$total_doc}} Docs</p>
            <p class="align-self-end">{{$total_pat}} Patients</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card chart-card aqua-gradient">
        <div class="card-body pb-0">
          <h4 class="card-title font-weight-bold">Doctors</h4>
          <div class="d-flex justify-content-between">
            <p class="display-4 align-self-end">{{$total_doc}} Docs</p>
            <p class="align-self-end pb-2">{{$total_user.' ('.$doc_percent.'%)'}}</p>
          </div>
          <p class="card-text my-2">Approved Doctors: {{$approved->count().' ('.$approved_percent.'%)'}}</p>
          <p class="card-text mb-4">Pending Doctors: {{$pending->count().' ('.$pending_percent.'%)'}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card chart-card purple-gradient">
        <div class="card-body pb-0">
          <h4 class="card-title font-weight-bold">Patients</h4>
          <div class="d-flex justify-content-between">
            <p class="display-4 align-self-end">{{$total_pat}} Patients</p>
            <p class="align-self-end pb-2">{{$total_user.' ('.$pat_percent.'%)'}}</p>
          </div>
          {{-- <p class="card-text mb-4">No of Appointments:</p> --}}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card chart-card purple-gradient">
        <div class="card-body pb-0">
          <h4 class="card-title font-weight-bold">Total Appointments</h4>
          <div class="d-flex justify-content-between">
            <p class="display-4 align-self-end">{{$total_app}} Cases</p>
            {{-- <p class="align-self-end pb-2">122(12%)</p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card chart-card blue-gradient">
        <div class="card-body pb-0">
          <h4 class="card-title font-weight-bold">Completed Appointments</h4>
          <div class="d-flex justify-content-between">
            <p class="display-4 align-self-end">{{$completed_appointments->count()}}</p>
            <p class="align-self-end pb-2">{{($total_app.' ('.$comp_app_percent.'%)')}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card chart-card peach-gradient">
        <div class="card-body pb-0">
          <h4 class="card-title font-weight-bold">Pending Appointments</h4>
          <div class="d-flex justify-content-between">
            <p class="display-4 align-self-end">{{$pending_appointments->count()}}</p>
            <p class="align-self-end pb-2">{{$total_app.' ('.$pend_app_percent.'%)'}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>