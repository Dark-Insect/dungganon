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
                            <th scope="col">Amount</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($balances)
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($balances as $balance)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ \Carbon\Carbon::parse($balance->date)->format('F d Y, l') }}</td>
                                    <td>{{ $balance->loan_id }}</td>
                                    <td>{{ $balance->amount_pay }}</td>
                                    <td>{{ $balance->balance }}</td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection