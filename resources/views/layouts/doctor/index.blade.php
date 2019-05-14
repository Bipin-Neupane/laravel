@include('layouts.partials.header')
@if($data->registration_status === 'pending')
@if ($data->submit_status === 'submitted')
<p class="lead text-center">We are currently reviewing your account.</p>
@else
<h1 class="p-4"> Fill the form below to complete the registration process </h1>
<div class="container">
  <form method="POST" action='{{route('doctor')}}' enctype="multipart/form-data">
    @csrf
    <div class="card mb-4">
      <div class="card-body text-center">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="md-form">
                  <input type="text" name='first_name' id='first_name'
                    class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"
                    required>
                  <label for="first_name">First name</label>
                  @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>Field required</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form">
                  <input type="text" name='last_name' id='last_name'
                    class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"
                    required>
                  <label for="last_name">Last name</label>
                  @error('last_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>Field required</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="md-form mt-1">
              <div class="file-field">
                <div class="btn aqua-gradient btn-sm float-left mx-0">
                  <span>Choose Image</span>
                  <input type="file" name='image' id='image'>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path" disabled type="text" placeholder="Upload your profile image">
                </div>
              </div>
            </div>

            <div class="md-form">
              <input type="text" name='country' id='country' class="form-control @error('country') is-invalid @enderror"
                value="{{ old('country') }}" required>
              <label for="country">Country</label>
              @error('country')
              <span class="invalid-feedback" role="alert">
                <strong>Field required</strong>
              </span>
              @enderror
            </div>

            <div class="md-form">
              <input type="text" name='state' id='state' class="form-control @error('state') is-invalid @enderror"
                value="{{ old('state') }}" required>
              <label for="state">State</label>
              @error('state')
              <span class="invalid-feedback" role="alert">
                <strong>Field required</strong>
              </span>
              @enderror
            </div>

            <div class="md-form">
              <input type="text" name='address' id='address' class="form-control @error('address') is-invalid @enderror"
                value="{{ old('address') }}" required>
              <label for="address">Address</label>
              @error('address')
              <span class="invalid-feedback" role="alert">
                <strong>Field required</strong>
              </span>
              @enderror
            </div>

            <div class="md-form">
              <input type="text" name='contact' id='contact' class="form-control @error('contact') is-invalid @enderror"
                value="{{ old('contact') }}" required>
              <label for="contact">Contact</label>
              @error('contact')
              <span class="invalid-feedback" role="alert">
                <strong>Field required</strong>
              </span>
              @enderror
            </div>

            <div class="md-form">
              <select class="mdb-select md-form" id='gender' name='gender' required>
                <option value="" selected disabled>Gender</option>
                <option value="male"> Male </option>
                <option value="female"> Female </option>
              </select>
            </div>

            <div class="md-form">
              <input type="date" name='birth_date' id="birth_date"
                class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" required>
              <label for="birth_date">Date of Birth</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="md-form">
              <input type="text" name='cur_work' id='cur_work'
                class="form-control @error('cur_work') is-invalid @enderror" value="{{ old('cur_work') }}" required>
              <label for="cur_work">Currently Working At</label>
              @error('cur_work')
              <span class="invalid-feedback" role="alert">
                <strong>Field required</strong>
              </span>
              @enderror
            </div>

            <div class="md-form">
              <input type="text" name='prev_work' id='prev_work'
                class="form-control @error('prev_work') is-invalid @enderror" value="{{ old('prev_work') }}" required>
              <label for="prev_work">Previouly Worked At</label>
              @error('prev_work')
              <span class="invalid-feedback" role="alert">
                <strong>Field required</strong>
              </span>
              @enderror
            </div>

            <div class="md-form">
              <select class="mdb-select md-form" id='category' name='category' required>
                <option value="" selected disabled>Choose your field of expertise</option>
                <option value="0">Physician</option>
                <option value="1">Psychiatrist</option>
              </select>
            </div>

            <div class="md-form">
              <div class="file-field">
                <div class="btn aqua-gradient btn-sm float-left mx-0">
                  <span>Choose Image</span>
                  <input type="file" name='citizenship' id='citizenship' required>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path" disabled type="text" placeholder="Upload your citizenship">
                </div>
              </div>
            </div>

            <div class="md-form">
              <select class="mdb-select md-form" id='experience' name='experience' required>
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
                  <input type="file" name='certificate' id='certificate' required>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path" disabled type="text" placeholder="Upload your license[Doctor certificate]">
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
@endif
@else
@include('layouts.doctor.main');
@endif