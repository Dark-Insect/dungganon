@extends('layouts.global.dashboard')

@section('title', 'Create Member')

@section('content')
<main>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }} <a href="{{ route('admin.member.index') }}">view members</a>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-1">Create Member</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.member.store') }}" id="form_validate">
                            @csrf
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan">Personal Information</label>
                                <div class="form-group col-md-4">
                                    <label for="txt_type_loan">First name</label>
                                    <input type="text" class="form-control" id="txt_first_name" placeholder="Enter First name" name="txt_first_name" required>
                                    @error('txt_first_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>First name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Middle name</label>
                                    <input type="text" class="form-control" id="txt_middle_name" placeholder="Enter Middle name" name="txt_middle_name" required>
                                    @error('txt_first_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Middle name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Last name</label>
                                    <input type="text" class="form-control" id="txt_last_name" placeholder="Enter Last name" name="txt_last_name" required>
                                    @error('txt_first_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Last name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-4">
                                  <label for="txt_type_loan">Date of Birth</label>
                                  <input type="date" class="form-control" id="dtr_date_of_birth" name="dtr_date_of_birth" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Civil Status</label>
                                  <select class="form-select" name="civil_status">
                                    <option value="married">Married</option>
                                    <option value="single">Single</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Gender</label>
                                    <select class="form-select" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                    <label for="txt_reason">Place of Birth</label>
                                    <input type="text" class="form-control" id="txt_place_of_birth" placeholder="Enter Place of Brith" name="txt_place_of_birth" required>
                                    @error('txt_place_of_birth')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Birthplace is required</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Religion</label>
                                    <select class="form-select" name="religion">
                                        <option value="roman_catholic">Roman Catholic</option>
                                        <option value="islam" >Islam</option>
                                        <option value="iglesia_ni_Cristo">Iglesia ni Cristo (INC)</option>
                                        <option value="evangelical_christianity">Evangelical Christianity</option>
                                        <option value="seventh-day_adventist">Seventh-day Adventist</option>
                                    </select>
                                  </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Educational Attainment</label>
                                  <select class="form-select" name="educational_attainment">
                                    <option value="elementary">Elementary</option>
                                    <option value="secondary">Secondary</option>
                                    <option value="vocational">Vocational</option>
                                    <option value="college undergrad">College Undergrad</option>
                                    <option value="college graduate">College Graduate</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Contact No.</label>
                                    <input type="tel" class="form-control" id="txt_contact" placeholder="123-45-678" name="txt_contact" required>
                                    @error('txt_contact')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Contact No is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txt_reason">Present Address</label>
                                <input type="text" class="form-control" id="txt_present_address" placeholder="Enter Present Address" name="txt_present_address">
                                @error('txt_present_address')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>Permanent address is required</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan">Permanent Address</label>
                                <div class="form-group col-md-4">
                                    <label for="txt_type_loan">Sitio/Prk/St</label>
                                    <input type="text" class="form-control" id="txt_permanent_st" placeholder="Enter Sitio/Prk/St" name="txt_permanent_st">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Barangay</label>
                                    <input type="text" class="form-control" id="txt_permanent_barangay" placeholder="Enter Barangay" name="txt_permanent_barangay" required>
                                    @error('txt_permanent_barangay')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Barangay is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">City/Municipality</label>
                                    <input type="text" class="form-control" id="txt_permanent_city" placeholder="Enter City/Municipality" name="txt_permanent_city" required>
                                    @error('txt_permanent_city')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>City/Municipality is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Province</label>
                                    <input type="text" class="form-control" id="txt_permanent_province" placeholder="Enter Province" name="txt_permanent_province" required>
                                    @error('txt_permanent_province')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Province is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">No. of  Years in the Community</label>
                                    <input type="number" class="form-control" id="txt_no_years" placeholder="Enter No of Years" name="txt_no_years" required>
                                    @error('txt_no_years')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>No of years is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan bold">Mother's Maiden Name (Name of mother when she was still single)</label>
                                <div class="form-group col-md-4">
                                    <label for="txt_type_loan">First name</label>
                                    <input type="text" class="form-control" id="txt_m_first_name" placeholder="Enter First name" name="txt_m_first_name" required>
                                    @error('txt_m_first_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>First name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Middle name</label>
                                    <input type="text" class="form-control" id="txt_m_middle_name" placeholder="Enter Middle name" name="txt_m_middle_name" required>
                                    @error('txt_m_middle_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Middle name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Last name</label>
                                    <input type="text" class="form-control" id="txt_m_last_name" placeholder="Enter Last name" name="txt_m_last_name" required>
                                    @error('txt_m_last_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Last name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan fw-bold">Other Information: Husband/Spouse</label>
                                <div class="form-group col-md-4">
                                  <label for="txt_type_loan">First name</label>
                                  <input type="text" class="form-control" id="txt_hs_first_name" placeholder="Enter First name" name="txt_hs_first_name" >
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Middle name</label>
                                  <input type="text" class="form-control" id="txt_hs_middle_name" placeholder="Enter Middle name" name="txt_hs_middle_name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Last name</label>
                                    <input type="text" class="form-control" id="txt_hs_last_name" placeholder="Enter Last name" name="txt_hs_last_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Extension (Suffix)</label>
                                    <input type="text" class="form-control" id="txt_hs_extention" placeholder="Enter Last name" name="txt_hs_extention">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Date of Birth</label>
                                    <input type="date" class="form-control" id="txt_hs_date_of_birth" placeholder="Enter Last name" name="txt_hs_date_of_birth">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="txt_type_loan">Client's Present Source of income</label>
                                    <input type="text" class="form-control" id="txt_client_source_income" placeholder="Enter Source" name="txt_client_source_income" required>
                                    @error('txt_client_source_income')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Client Source is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Husband's Present Source of income</label>
                                    <input type="text" class="form-control" id="hs_present_source_of_income" placeholder="Enter Source" name="hs_present_source_of_income">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Total Family Income (weekly)</label>
                                    <input type="text" class="form-control" id="txt_total_family_income" placeholder="Enter Last name" name="txt_total_family_income" required>
                                    @error('txt_total_family_income')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Total income is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <label for="txt_date">Total PPI Score</label>
                                    <input type="text" class="form-control" id="txt_total_ppi_score" placeholder="Enter Last name" name="txt_total_ppi_score" required>
                                    @error('txt_total_ppi_score')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Total PPI Score is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->

                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan">Email & Password</label>
                                <div class="form-group col-md-4">
                                    <label for="txt_type_loan">Email</label>
                                    <input type="email" class="form-control" id="txt_email" placeholder="Enter Email" name="txt_email" required>
                                    @error('txt_email')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Email is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_password">Password</label>
                                    <input type="password" class="form-control" id="txt_password" placeholder="Enter Password" name="txt_password" required>
                                    @error('txt_password')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_cpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="txt_cpassword" placeholder="Enter Confirm Password" name="txt_cpassword" required>
                                    @error('txt_cpassword')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Create Account"></div>
                            </div>
                            {{-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="{{ old('txt-fname') }}" id="txt-fname" name="txt-fname" type="text" placeholder="Enter your first name" required/>
                                        <label for="inputFirstName">First name</label>
                                    </div>
                                    @error('txt-fname')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" value="{{ old('txt-lname') }}" id="txt-lname" name="txt-lname" type="text" placeholder="Enter your last name" required/>
                                        <label for="inputLastName">Last name</label>
                                    </div>
                                    @error('txt-lname')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="txt-email" value="{{ old('txt-email') }}" name="txt-email" type="email" placeholder="name@example.com" required/>
                                <label for="inputEmail">Email address</label>
                                @error('txt-email')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="txt-phone" value="{{ old('txt-phone') }}" name="txt-phone" type="text" placeholder="+63 123 931 1234" required/>
                                <label for="inputEmail">Phone</label>
                                @error('txt-phone')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="txt-pass" name="txt-pass" type="password" placeholder="Create a password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    @error('txt-pass')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="txt-cpass" name="txt-cpass" type="password" placeholder="Confirm password" />
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                    @error('txt-cpass')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Create Account"></div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- <script>
$(document).ready(function(){
  $('#form_validate').submit(function(event){
    event.preventDefault();
    if($('#txt_cpassword').val() != $('#txt_password').val()){
        alert("Password and Confirm Password do not match!");
    }
  })
});   
</script> --}}
@endsection