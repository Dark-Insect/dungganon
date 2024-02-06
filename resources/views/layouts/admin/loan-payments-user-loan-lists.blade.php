@extends('layouts.global.dashboard')

@section('title', 'Members')

@section('content')
<main>
    @if (session('deleted'))
        <div class="alert alert-danger text-center">
            {{ session('deleted') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $d->first_name }}'s Loan Lists</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">Loan ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Status</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">Loan ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Status</th>
                            <th scope="col">Option</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @isset($loans)
                            @if ($loans)
                                @foreach ($loans as $loan)
                                    @if ($loan->loan_approved == "approved")
                                        <tr>
                                            <td>{{ $loan->loan_id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($loan->loan_request_date)->format('F d Y, l') }}</td>
                                            <td>{{ $loan->loan_amount }}</td>
                                            <td>{{ $loan->loan_purpose }}</td>
                                            <td>{{ ($loan->loan_status != "Fully Paid") ? "Currently Paying" : "Fully Paid" }}</td>
                                            <td>
                                                <a href="{{ route('admin.loan', $loan->loan_id) }}">View Payment History</a>
                                            </td>
                                        </tr>
                                    @endif
                                    
                                @endforeach
                            @endif
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection