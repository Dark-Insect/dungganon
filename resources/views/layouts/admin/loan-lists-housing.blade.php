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
        <h1 class="mt-4">Housing Loan Lists</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @isset($loans)
                            @if ($loans)
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td>{{ $loan->first_name . " " . $loan->last_name }}</td>
                                        <td>{{ $loan->email }}</td>
                                        <td>{{ $loan->phone }}</td>
                                        <td>{{ ($loan->loan_approved === "pending") ? "Pending" : "Approved" }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.loan-review', $loan->loan_id) }}">Review</a>
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