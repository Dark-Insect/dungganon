@extends('layouts.global.dashboard')

@section('title', 'New Loan')

@section('content')
<style>
#regForm {
  background-color: #ffffff;
  font-family: Raleway;
  padding: 5px 40px;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
<main>
    @if (session('danger'))
        <div class="alert alert-danger text-center">
            {{ session('danger') }} <a href="{{ route('admin.member.index') }}">view members</a>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                    <div class="card-header"><h6 class="text-center font-weight-light my-1">New Loan</h6></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('member.loan-request') }}" id="regForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                              <div class="form-group col-md-6">
                                <label for="txt_type_loan">Loan Amount</label>
                                <input type="number" class="form-control" id="txt_loan_amount" name="txt_loan_amount">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="txt_type_loan">Loan Purpose</label>
                                <input type="text" class="form-control" id="txt_purpose" name="txt_purpose">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="form-group col-md-6">
                                <label for="txt_type_loan">Weekly Earnings</label>
                                <input type="number" class="form-control" id="txt_weekly_earnings" name="txt_weekly_earnings">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="txt_type_loan">Loan Term</label>
                                {{-- <input type="date" class="form-control" id="dtr_term" name="dtr_term"> --}}
                                <select class="form-select" name="dtr_term" id="dtr_term">
                                  <option value="0.3">3 Months</option>
                                  <option value="0.6">6 Months</option>
                                  <option value="1">1 Years</option>
                                  <option value="2">2 Years</option>
                                  <option value="3">3 Years</option>
                                  <option value="4">4 Years</option>
                                  <option value="5">5 Years</option>
                                  <option value="6">6 Years</option>
                                  <option value="7">7 Years</option>
                                  <option value="8">8 Years</option>
                                  <option value="9">9 Years</option>
                                  <option value="10">10 Years</option>
                                </select>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="form-group col-md-12">
                                <label for="txt_type_loan">Upload Form</label>
                                <input class="form-control" type="file" id="formFile" name="formFile">
                              </div>
                            </div>
                            <div class="form-group mb-3">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{-- LOAN PROPOSAL SHEET --}}
                            {{-- <div class="tab">
                              <h3 class="h4 mb-5 text-center font-weight-bold">LOAN PROPOSAL SHEET</h3>
                              <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Kantidad nga Hulamon:</label>
                                  <input type="number" class="form-control" id="txt_type_loan" name="txt_type_loan">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Senimana nga Kita:</label>
                                  <input type="number" class="form-control" id="txt_type_loan" name="txt_type_loan">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Katuyu-an sa Huwam:</label>
                                  <input type="text" class="form-control" id="txt_type_loan" name="txt_type_loan">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Long Term:</label>
                                  <input type="text" class="form-control" id="txt_type_loan" name="txt_type_loan">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Pirma sa Naghuwam: <span class="text-danger">( Please upload signature )</span></label>
                                  <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Ngalan ug pirma sa Bana: <span class="text-danger">( Please upload signature )</span></label>
                                  <input class="form-control" type="file" id="formFile">
                                </div>
                              </div>

                              <div class="form-group mb-3">
                                <label for="txt_reason">Katuyu-an sa Huwam</label>
                                <textarea class="form-control" id="txt_reason" rows="1" placeholder="Enter reason" name="txt_reason"></textarea>
                              </div>
                              <div class="form-group mb-3">
                                <label for="txt_reason">Ngalan ug Pirma sang GC:</label>
                                <input class="form-control" type="file" id="formFile">
                              </div>

                              <div class="form-group mb-3">
                                <label for="txt_reason">Komentar ug Rekomendasyon nga kantidad sang Center Chief:</label>
                                <textarea class="form-control" id="txt_reason" rows="1" placeholder="Enter reason" name="txt_reason"></textarea>
                              </div>
                              <div class="form-group mb-3">
                                <label for="txt_reason">Ngalan ug Pirma sang GC:</label>
                                <input class="form-control" type="file" id="formFile">
                              </div>

                              <div class="form-group mb-3">
                                <label for="txt_reason">Komentar ug Rekomendasyon nga kantidad sang LO:</label>
                                <textarea class="form-control" id="txt_reason" rows="1" placeholder="Enter reason" name="txt_reason"></textarea>
                              </div>

                            </div>

                            {{-- LOAN UTILIZATION CHECK FORM --}}
                            {{-- <div class="tab">
                              <h3 class="h4 mb-5 text-center font-weight-bold">LOAN UTILIZATION CHECK FORM</h3>
                              <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Ngalan sang Membro</label>
                                  <input type="number" class="form-control" id="txt_type_loan" name="txt_type_loan">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Petsa sa pagdawt sa gihuwam</label>
                                  <input type="number" class="form-control" id="txt_type_loan" name="txt_type_loan">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Numero sang Sentro/Grupo/Membro:</label>
                                  <input type="number" class="form-control" id="txt_type_loan" name="txt_type_loan">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="txt_type_loan">Negosyo nga nagamit sa gihuwam:</label>
                                  <input type="number" class="form-control" id="txt_type_loan" name="txt_type_loan">
                                </div>
                              </div>

                              <div class="form-group mb-3">
                                <label for="txt_reason">Katuyu-an sa Huwam</label>
                                <textarea class="form-control" id="txt_reason" rows="1" placeholder="Enter reason" name="txt_reason"></textarea>
                              </div>
                            </div>
                            <div style="overflow:auto;">
                              <div style="float:right;">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                              </div>
                            </div>
                            <div style="text-align:center;margin-top:40px;">
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>
                            </div> --}} 
                            {{-- <div class="row mb-3">
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
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  
  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }
  
  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }
  
  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    // x = document.getElementsByClassName("tab");
    // y = x[currentTab].getElementsByTagName("input");
    // // A loop that checks every input field in the current tab:
    // for (i = 0; i < y.length; i++) {
    //   // If a field is empty...
    //   if (y[i].value == "") {
    //     // add an "invalid" class to the field:
    //     y[i].className += " invalid";
    //     // and set the current valid status to false
    //     valid = false;
    //   }
    // }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }
  
  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
  </script>
@endsection