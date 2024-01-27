@extends('layouts.global.dashboard')

@section('title', 'Loan Request')

@section('content')
<main>
    @if (session('deleted'))
        <div class="alert alert-danger text-center">
            {{ session('deleted') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between">
          <div>
            <h1 class="mt-4">Review Loan</h1>
          </div>
          <div class="d-flex justify-content-between" style="gap: 20px;">
            <form action="" class="mt-4">
              <a href="" class="btn btn-success">Approved</a>
            </form>
            <form action="" class="mt-4">
              <a href="" class="btn btn-danger">Decline</a>
            </form>
          </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
              <table class="table table-bordered mb-0">
                <tr>
                  <th class="w-25">Fullname</th>
                  <td class="w-25"><a href="{{ route('admin.member.show', $data->id) }}">{{ $data->first_name . " " . $data->last_name }}</a></td>
                  <th class="w-25">Date Submitted</th>
                  <td class="w-25">{{ \Carbon\Carbon::parse($data->loan_request_date)->format('F d Y, l') }}</td>
                </tr>
                <tr>
                  <th class="w-25">Loan Amount</th>
                  <td class="w-25">{{ $data->loan_amount }}</td>
                  <th class="w-25">Loan Purpose</th>
                  <td class="w-25">{{ $data->loan_purpose }}</td>
                </tr>
                <tr>
                  <th class="w-25">Weekly Income</th>
                  <td class="w-25">{{ $data->loan_weekly_earn }}</td>
                  <th class="w-25">Loan Term</th>
                  <td class="w-25">{{ $data->loan_term }}</td>
                </tr>
                </tr>
              </table>
            </table>
            </div>
        </div>

        <h1 class="mt-4">Documents</h1>
        <p><a target="_blank" href="{{ asset('storage/uploads/' . $data->loan_uploaded_name) }}">View Full Size</a></p>
        <div class="card mb-4">
            <div class="card-body">
              <div class="embed-responsive embed-responsive-21by9">
                <iframe style="height: 80vh" class="w-100 embed-responsive-item" src="{{ asset('storage/uploads/' . $data->loan_uploaded_name) }}"></iframe>
              </div>
            </div>
        </div>
    </div>
</main>
@endsection
