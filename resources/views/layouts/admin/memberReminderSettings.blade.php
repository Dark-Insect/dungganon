@extends('layouts.global.dashboard')

@section('title', 'Member Reminder')

@section('content')
<main>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script> --}}
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Email Settings</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.notifications.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                              <input class="form-control" id="txt_title" value="{{ $data->mail_title }}" name="txt_title" type="text" placeholder="name@example.com" required/>
                              <label for="inputEmail">Mail Title</label>
                            </div>

                            <div class="form-floating mb-3">
                              <input class="form-control" id="txt_subject" value="{{ $data->mail_subject }}" name="txt_subject" type="text" placeholder="name@example.com" required/>
                              <label for="inputEmail">Mail Subject</label>
                            </div>

                            <div class="form-floating mb-3">
                              <select class="form-control" name="cbo_schedule" id="cbo_schedule">
                                <option value="every_month" @selected($data->mail_schedule == "every_month")>Every Month</option>
                                <option value="every_week" @selected($data->mail_schedule == "every_week")>Every Week</option>
                                <option value="every_day" @selected($data->mail_schedule == "every_day")>Every Day</option>
                                <option value="every_minute" @selected($data->mail_schedule == "every_minute")>Every Minute (for testing)</option>
                              </select>
                              <label for="inputEmail">Reminder Schedule</label>
                            </div>

                            <div class="mt-4 mb-0">
                              <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Set Settings"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- <script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
  });
</script> --}}
@endsection