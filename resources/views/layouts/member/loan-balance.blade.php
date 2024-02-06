@extends('layouts.global.dashboard')

@section('title', 'Loan Balance')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Loan Balance</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Loan ID</th>
                            <th scope="col">Loan Purpose</th>
                            <th scope="col">Loan Amount</th>
                            <th>Balance Left</th>
                            <th>Loan Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($loans)
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($loans as $loan)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ \Carbon\Carbon::parse($loan->loan_request_date)->format('F d Y, l') }}</td>
                                    <td>{{ $loan->loan_id }}</td>
                                    <td>{{ $loan->loan_purpose }}</td>
                                    <td>₱{{ $loan->loan_amount }}</td>
                                    <td>
                                        @isset($balances)
                                            @if ($balances[$count] == "Pending for Approval")
                                                {{ $balances[$count] }}
                                            @else
                                                {{ '₱'.$balances[$count] }}
                                            @endif
                                        @endisset
                                    </td>
                                    <td>
                                        @isset($balances)
                                            @if ($balances[$count] == "Pending for Approval")
                                                {{ $balances[$count] }}
                                            @else
                                                {{ ($loan->loan_status != "Fully Paid") ? "Currently Paying" : "Fully Paid" }}
                                            @endif
                                        @endisset
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection