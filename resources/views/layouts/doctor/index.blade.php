@include('layouts.partials.header')
@if($data->registration_status === 'pending')
<h1 class="p-4"> Fill the form below to complete the registration process </h1>
<div class="container-fluid">
  <form method="POST" action=''>
    <div class="card mb-4">
      <div class="card-body text-center">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="md-form">
                  <input type="text" name='fname' id='fname' class="form-control">
                  <label for="fname">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form">
                  <input type="text" name='lname' id='lname' class="form-control">
                  <label for="lname">Last name</label>
                </div>
              </div>
            </div>

            <div class="md-form mt-1">
              <div class="file-field">
                <div class="btn aqua-gradient btn-sm float-left mx-0">
                  <span>Choose Image</span>
                  <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate disabled" name='image' id='image' type="text"
                    placeholder="Upload your profile image here">
                </div>
              </div>
            </div>

            <div class="md-form">
              <input type="text" name='contact' id='contact' class="form-control">
              <label for="contact">Contact</label>
            </div>
            <div class="md-form">
              <input type="text" name='address' id='address' class="form-control">
              <label for="address">Address</label>
            </div>
            <div class="md-form">
              <input type="date" id="birth_date" class="form-control">
              <label for="birth_date">Date of Birth</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="md-form">
              <select class="mdb-select md-form" id='category' name='category'>
                <option value="" selected disabled>Choose your field of expertise</option>
                <option value="0">Eye</option>
                <option value="1">Physical</option>
              </select>
            </div>

            <div class="md-form">
              <div class="file-field">
                <div class="btn aqua-gradient btn-sm float-left mx-0">
                  <span>Choose Image</span>
                  <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate disabled" name='citizenship' id='citizenship' type="text"
                    placeholder="Upload your citizenship showing both side in a single image">
                </div>
              </div>
            </div>

            <div class="md-form">
              <select class="mdb-select md-form" id='experience' name='experience'>
                <option value="" selected disabled>Experience</option>
                <option value="0">1-2 yrs</option>
                <option value="1">2-5 yrs</option>
                <option value="2">5-10 yrs</option>
                <option value="3">10+ yrs</option>
              </select>
            </div>

            <div class="md-form mt-1">
              <div class="file-field">
                <div class="btn aqua-gradient btn-sm float-left mx-0">
                  <span>Choose Image</span>
                  <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate disabled" name='certificate' id='certificate' type="text"
                    placeholder="Upload your license[Doctor certificate]">
                </div>
              </div>
            </div>

          </div>
        </div>
        <button type="submit" class="btn blue-gradient">Submit</button>
      </div>
    </div>
  </form>
</div>
@else
doctor
@endif