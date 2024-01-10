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
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Member</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.member.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="{{ $firstName }}" id="txt-fname" name="txt-fname" type="text" placeholder="Enter your first name" required/>
                                        <label for="inputFirstName">First name</label>
                                    </div>
                                    @error('txt-fname')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" value="{{ $lastName }}" id="txt-lname" name="txt-lname" type="text" placeholder="Enter your last name" required/>
                                        <label for="inputLastName">Last name</label>
                                    </div>
                                    @error('txt-lname')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="txt-email" value="{{ $user->email }}" name="txt-email" type="email" placeholder="name@example.com" required/>
                                <label for="inputEmail">Email address</label>
                                @error('txt-email')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="txt-phone" value="{{ $user->phone }}" name="txt-phone" type="text" placeholder="+63 123 931 1234" required/>
                                <label for="inputEmail">Phone</label>
                                @error('txt-phone')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="txt-pass" name="txt-pass" type="password" placeholder="Create a password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    @error('txt-pass')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="txt-cpass" name="txt-cpass" type="password" placeholder="Confirm password" />
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                    @error('txt-cpass')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Update Account"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection