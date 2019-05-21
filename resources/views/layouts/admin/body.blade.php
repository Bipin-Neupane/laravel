<div class="container-fluid py-4">
  <h3> Actions</h3>
  <div class="container-fluid">
    <h2> Doctors </h2>
    <a class="btn z-depth-0 elegant-color text-white py-2 ml-0" data-toggle="modal" data-target="#modalAddDoctor">Add
      Doctors</a>
    <a href=""> Approve Doctors</a>

    <div class="modal fade" id="modalAddDoctor" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          @include('layouts.admin.add_doctor_form')
        </div>
      </div>
    </div>
  </div>
</div>