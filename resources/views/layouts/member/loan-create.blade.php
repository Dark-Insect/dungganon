@extends('layouts.global.dashboard')

@section('title', 'New Loan')

@section('content')
<main>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }} <a href="{{ route('admin.member.index') }}">view members</a>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-1">New Loan</h3></div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Type of Loan</label>
                                  <input type="text" class="form-control" id="txt_type_loan" placeholder="Enter type of loan" name="txt_type_loan">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_date">Date</label>
                                  <input type="date" class="form-control" id="txt_date" placeholder="Enter date" name="txt_date" disabled  value="{{ now()->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_amount_to_borrow">Kantidad nga Huwamon</label>
                                  <input type="text" class="form-control" id="txt_amount_to_borrow" placeholder="Enter amount" name="txt_amount_to_borrow">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_weekly_income">Senimana nga Kita</label>
                                  <input type="text" class="form-control" id="txt_weekly_income" placeholder="Enter amount" name="txt_weekly_income">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txt_reason">Katuyu-an sa Huwam</label>
                                <textarea class="form-control" id="txt_reason" rows="1" placeholder="Enter reason" name="txt_reason"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_amount_to_borrow">Katuyu-an sa Huwam</label>
                                  <input type="text" class="form-control" id="txt_amount_to_borrow" placeholder="Enter Amount" name="txt_amount_to_borrow">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_weekly_income">Senimana nga Kita</label>
                                  <input type="text" class="form-control" id="txt_weekly_income" placeholder="Enter Amount">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-header"><h3 class="text-center font-weight-light my-1">New Loan</h3></div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Type of Loan</label>
                                  <input type="text" class="form-control" id="txt_type_loan" placeholder="Enter type of loan" name="txt_type_loan">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_date">Date</label>
                                  <input type="date" class="form-control" id="txt_date" placeholder="Enter date" name="txt_date" disabled  value="{{ now()->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_amount_to_borrow">Kantidad nga Huwamon</label>
                                  <input type="text" class="form-control" id="txt_amount_to_borrow" placeholder="Enter amount" name="txt_amount_to_borrow">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_weekly_income">Senimana nga Kita</label>
                                  <input type="text" class="form-control" id="txt_weekly_income" placeholder="Enter amount" name="txt_weekly_income">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txt_reason">Katuyu-an sa Huwam</label>
                                <textarea class="form-control" id="txt_reason" rows="1" placeholder="Enter reason" name="txt_reason"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_amount_to_borrow">Katuyu-an sa Huwam</label>
                                  <input type="text" class="form-control" id="txt_amount_to_borrow" placeholder="Enter Amount" name="txt_amount_to_borrow">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_weekly_income">Senimana nga Kita</label>
                                  <input type="text" class="form-control" id="txt_weekly_income" placeholder="Enter Amount">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-header"><h3 class="text-center font-weight-light my-1">New Loan</h3></div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Type of Loan</label>
                                  <input type="text" class="form-control" id="txt_type_loan" placeholder="Enter type of loan" name="txt_type_loan">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_date">Date</label>
                                  <input type="date" class="form-control" id="txt_date" placeholder="Enter date" name="txt_date" disabled  value="{{ now()->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_amount_to_borrow">Kantidad nga Huwamon</label>
                                  <input type="text" class="form-control" id="txt_amount_to_borrow" placeholder="Enter amount" name="txt_amount_to_borrow">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_weekly_income">Senimana nga Kita</label>
                                  <input type="text" class="form-control" id="txt_weekly_income" placeholder="Enter amount" name="txt_weekly_income">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txt_reason">Katuyu-an sa Huwam</label>
                                <textarea class="form-control" id="txt_reason" rows="1" placeholder="Enter reason" name="txt_reason"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_amount_to_borrow">Katuyu-an sa Huwam</label>
                                  <input type="text" class="form-control" id="txt_amount_to_borrow" placeholder="Enter Amount" name="txt_amount_to_borrow">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_weekly_income">Senimana nga Kita</label>
                                  <input type="text" class="form-control" id="txt_weekly_income" placeholder="Enter Amount">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection