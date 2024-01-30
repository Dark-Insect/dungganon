@extends('layouts.global.dashboard')

@section('title', 'Members')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<main>
    @if (session('deleted'))
        <div class="alert alert-danger text-center">
            {{ session('deleted') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-4 mb-4">
            <div class="d-flex align-items-center">
                <h4>Loan Payment History</h4>
            </div>
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Update
                </button>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Loan ID</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Interest</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($loans)
                            @if ($loans)
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td>{{ $loan->history_id }}</td>
                                        <td>{{ $loan->loan_id }}</td>
                                        <td>{{ $loan->amount_pay }}</td>
                                        <td>{{ $loan->balance }}</td>
                                        <td>{{ $loan->interest }}</td>
                                        <td>{{ \Carbon\Carbon::parse($loan->date)->format('F d Y, l') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No Payment History Yet!</td>
                                </tr>
                            @endif
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.pay.loan', $loan_id) }}" method="POST" >
                @csrf
                @method('POST')
                <input type="text" value="{{ $user_id->user_id }}" name="txt_user_id" style="display: none;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Payments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col">
                          <input type="number" class="form-control" placeholder="Amount to Pay" name="txt-amount">
                        </div>
                        <div class="col">
                          <input type="number" class="form-control" placeholder="Interest" name="txt-interest">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection