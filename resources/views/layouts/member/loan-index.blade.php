@extends('layouts.global.dashboard')

@section('title', 'Loan')

@section('content')
<main>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">Loan</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Loan Amount</th>
                            <th>Submitted Date</th>
                            <th>Status</th>
                            <!-- <th>Documents</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Loan Amount</th>
                            <th>Submitted Date</th>
                            <th>Status</th>
                            <!-- <th>Documents</th> -->
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @isset($datas)
                            @if ($datas)
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $data->loan_amount }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->loan_request_date)->format('F d Y, l') }}</td>
                                        <td>{{ $data->loan_approved }}</td>
                                        <!-- <td><a href="{{ asset('storage/uploads/' . $data->loan_uploaded_name) }}">View Document</a></td> -->
                                        <td>
                                            @if ($data->loan_approved != "pending")
                                                <a href="{{ route('member.loan-transaction', $data->loan_id) }}">View Transactions</a>
                                            @else
                                                <p class="mb-0">Currently Not Available</p>
                                            @endif
                                        </td>
                                    </tr> 
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