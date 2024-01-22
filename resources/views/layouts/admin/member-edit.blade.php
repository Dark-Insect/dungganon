@extends('layouts.global.dashboard')

@section('title', 'Update Member')

@section('content')
<main>
    @if (session('warning'))
        <div class="alert alert-danger text-center">
            {{ session('warning') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Member</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.member.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan">Personal Information</label>
                                <div class="form-group col-md-4">
                                  <label for="txt_type_loan">First name</label>
                                  <input value="{{ $user->first_name }}" type="text" class="form-control" id="txt_first_name" placeholder="Enter First name" name="txt_first_name" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Middle name</label>
                                  <input value="{{ $user->middle_name }}" type="text" class="form-control" id="txt_middle_name" placeholder="Enter Middle name" name="txt_middle_name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Last name</label>
                                    <input value="{{ $user->last_name }}" type="text" class="form-control" id="txt_last_name" placeholder="Enter Last name" name="txt_last_name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-4">
                                  <label for="txt_type_loan">Date of Birth</label>
                                  <input value="{{ $user->date_of_birth }}" type="date" class="form-control" id="dtr_date_of_birth" name="dtr_date_of_birth" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Civil Status</label>
                                  <select class="form-select" name="civil_status">
                                    <option value="married" @selected($user->civil_status == 'married') >Married</option>
                                    <option value="single" @selected($user->civil_status == 'single')>Single</option>
                                    <option value="divorced" @selected($user->civil_status == 'divorced')>Divorced</option>
                                    <option value="widowed" @selected($user->civil_status == 'widowed')>Widowed</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Gender</label>
                                    <select class="form-select" name="gender">
                                        <option value="male" @selected($user->gender == 'male')>Male</option>
                                        <option value="female" @selected($user->gender == 'female')>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txt_reason">Place of Birth</label>
                                <input value="{{ $user->place_of_birth }}" type="text" class="form-control" id="txt_place_of_birth" placeholder="Enter Place of Brith" name="txt_place_of_birth" required>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Religion</label>
                                    <select class="form-select" name="religion">
                                      <option value="Roman Catholic" @selected($user->religion == 'roman_catholic')>Roman Catholic</option>
                                      <option value="Islam" @selected($user->religion == 'Islam')>Islam</option>
                                      <option value="Iglesia ni Cristo (INC)" @selected($user->religion == 'iglesia_ni_cristo')>Iglesia ni Cristo (INC)</option>
                                      <option value="Evangelical Christianity" @selected($user->religion == 'evangelical_christianity')>Evangelical Christianity</option>
                                      <option value="Seventh-day Adventist" @selected($user->religion == 'seventh-day_adventist')>Seventh-day Adventist</option>
                                    </select>
                                  </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Educational Attainment</label>
                                  <select class="form-select" name="educational_attainment">
                                    <option value="elementary" @selected($user->educational_attainment == 'elementary')>Elementary</option>
                                    <option value="secondary" @selected($user->educational_attainment == 'secondary')>Secondary</option>
                                    <option value="vocational" @selected($user->educational_attainment == 'vocational')>Vocational</option>
                                    <option value="college undergrad" @selected($user->educational_attainment == 'college undergrad')>College Undergrad</option>
                                    <option value="college graduate" @selected($user->educational_attainment == 'college graduate')>College Graduate</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Contact No.</label>
                                    <input value="{{ $user->phone }}" type="text" class="form-control" id="txt_contact" placeholder="Enter Contact" name="txt_contact" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txt_reason">Present Address</label>
                                <input value="{{ $user->present_address }}" type="text" class="form-control" id="txt_present_address" placeholder="Enter Present Address" name="txt_present_address" required>
                            </div>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan">Permanent Address</label>
                                <div class="form-group col-md-4">
                                  <label for="txt_type_loan">Sitio/Prk/St</label>
                                  <input value="{{ $street }}" type="text" class="form-control" id="txt_permanent_st" placeholder="Enter Sitio/Prk/St" name="txt_permanent_st">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Barangay</label>
                                  <input value="{{ $barangay }}" type="text" class="form-control" id="txt_permanent_barangay" placeholder="Enter Barangay" name="txt_permanent_barangay" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">City/Municipality</label>
                                    <input value="{{ $city }}" type="text" class="form-control" id="txt_permanent_city" placeholder="Enter City/Municipality" name="txt_permanent_city" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Province</label>
                                    <input value="{{ $province }}" type="text" class="form-control" id="txt_permanent_province" placeholder="Enter Province" name="txt_permanent_province" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">No. of  Years in the Community</label>
                                    <input value="{{ $user->no_of_years }}" type="number" class="form-control" id="txt_no_years" placeholder="Enter No of Years" name="txt_no_years" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan bold">Mother's Maiden Name (Name of mother when she was still single)</label>
                                <div class="form-group col-md-4">
                                  <label for="txt_type_loan">First name</label>
                                  <input value="{{ $user->mother_first_name }}" type="text" class="form-control" id="txt_m_first_name" placeholder="Enter First name" name="txt_m_first_name" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Middle name</label>
                                  <input value="{{ $user->mother_middle_name }}" type="text" class="form-control" id="txt_m_middle_name" placeholder="Enter Middle name" name="txt_m_middle_name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Last name</label>
                                    <input value="{{ $user->mother_last_name }}" type="text" class="form-control" id="txt_m_last_name" placeholder="Enter Last name" name="txt_m_last_name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan fw-bold">Other Information: Husband/Spouse</label>
                                <div class="form-group col-md-4">
                                  <label for="txt_type_loan">First name</label>
                                  <input value="{{ $user->hs_first_name }}" type="text" class="form-control" id="txt_hs_first_name" placeholder="Enter First name" name="txt_hs_first_name" >
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Middle name</label>
                                  <input value="{{ $user->hs_middle_name }}" type="text" class="form-control" id="txt_hs_middle_name" placeholder="Enter Middle name" name="txt_hs_middle_name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Last name</label>
                                    <input value="{{ $user->hs_last_name }}" type="text" class="form-control" id="txt_hs_last_name" placeholder="Enter Last name" name="txt_hs_last_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Extension (Suffix)</label>
                                    <input value="{{ $user->extension }}" type="text" class="form-control" id="txt_hs_extention" placeholder="Enter Last name" name="txt_hs_extention">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Date of Birth</label>
                                    <input value="{{ $user->hs_date_of_birth }}" type="date" class="form-control" id="txt_hs_date_of_birth" placeholder="Enter Last name" name="txt_hs_date_of_birth">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Client's Present Source of income</label>
                                  <input value="{{ $user->client_source_income }}" type="text" class="form-control" id="txt_client_source_income" placeholder="Enter Source" name="txt_client_source_income">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_date">Husband's Present Source of income</label>
                                  <input value="{{ $user->hs_source_income }}" type="text" class="form-control" id="hs_present_source_of_income" placeholder="Enter Source" name="hs_present_source_of_income">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Total Family Income (weekly)</label>
                                    <input value="{{ $user->total_income }}" type="text" class="form-control" id="txt_total_family_income" placeholder="Enter Last name" name="txt_total_family_income">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Total PPI Score</label>
                                    <input value="{{ $user->total_ppi_score }}" type="text" class="form-control" id="txt_total_ppi_score" placeholder="Enter Last name" name="txt_total_ppi_score">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan">Email & Password</label>
                                <div class="form-group col-md-4">
                                  <label for="txt_type_loan">Email</label>
                                  <input value="{{ $user->email }}" type="email" class="form-control" id="txt_email" placeholder="Enter Email" name="txt_email">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Password</label>
                                  <input type="password" class="form-control" id="txt_password" placeholder="Enter Password" name="txt_password">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Confirm Password</label>
                                    <input type="password" class="form-control" id="txt_cpassword" placeholder="Enter Confirm Password" name="txt_cpassword">
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Create Account"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection