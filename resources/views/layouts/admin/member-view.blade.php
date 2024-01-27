@extends('layouts.global.dashboard')

@section('title', $user->first_name . ' ' . $user->last_name)

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-1">{{ $user->first_name . " " . $user->last_name . "'s' Details" }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr class="bg-dark text-white text-center">
                                <th colspan="6">Personal Information</th>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{ $user->first_name }}</td>
                                <th>Middle Name</th>
                                <td>{{ $user->middle_name }}</td>
                                <th>Last Name</th>
                                <td>{{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{ $user->date_of_birth }}</td>
                                <th>Civil Status</th>
                                <td>{{ $user->civil_status }}</td>
                                <th>Gender</th>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <th>Religion</th>
                                <td>{{ $user->religion }}</td>
                                <th>Educational Attainment</th>
                                <td>{{ $user->education_attainment }}</td>
                                <th>Contact Number</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th colspan="1">Email</th>
                                <td colspan="5">{{ $user->email }}</td>
                            </tr>
                            <tr class="bg-dark text-white text-center">
                                <th colspan="6">Present and Current Address</th>
                            </tr>
                            <tr>
                                <th colspan="1">Present Address</th>
                                <td colspan="5">{{ $user->present_address }}</td>
                            </tr>
                            <tr>
                                <th colspan="1">Current Address</th>
                                <td colspan="5">{{ ($temp[0] != "") ? $temp[0] .", " : "" }} {{ $temp[1] . ", " . $temp[2] . ", " .$temp[3]}}</td>
                            </tr>
                            <tr>
                                <th colspan="1">No. of Years in the Community</th>
                                <td colspan="5">{{ $user->no_of_years }}</td>
                            </tr>
                            {{-- MOPTHER INFO --}}
                            @if ($user->mother_first_name != null || $user->mother_middle_name != null || $user->mother_last_name != null)
                            <tr class="bg-dark text-white text-center">
                                <th colspan="6">Mother Informations</th>
                            </tr>
                            <tr>
                                <th>Mother First Name</th>
                                <td>{{ $user->mother_first_name }}</td>
                                <th>Mother Middle Name</th>
                                <td>{{ $user->mother_middle_name }}</td>
                                <th>Mother Last Name</th>
                                <td>{{ $user->mother_last_name }}</td>
                            </tr>
                            @endif
                            {{-- Husband INFO --}}
                            @if ($user->hs_first_name != null || $user->hs_middle_name != null || $user->hs_last_name != null)
                            <tr class="bg-dark text-white text-center">
                                <th colspan="6">Husband/Spouse Informations</th>
                            </tr>
                            <tr>
                                <th>Husband/Spouse First Name</th>
                                <td>{{ $user->hs_first_name }}</td>
                                <th>Husband/Spouse Middle Name</th>
                                <td>{{ $user->hs_middle_name }}</td>
                                <th>Husband/Spouse Last Name</th>
                                <td>{{ $user->hs_last_name }}</td>
                            </tr>
                            <tr>
                                <th>H/S Extension (Suffix)</th>
                                <td>{{ $user->hs_extension }}</td>
                                <th>H/S Date of Birth</th>
                                <td>{{ $user->hs_date_of_birth }}</td>
                                <th>H/S Source of Income</th>
                                <td>{{ $user->hs_source_income }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Client Source Income</th>
                                <td>{{ $user->client_source_income }}</td>
                                <th>Total Family Income</th>
                                <td>{{ $user->total_income }}</td>
                                <th>Total PPI Score</th>
                                <td>{{ $user->total_ppi_score }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection