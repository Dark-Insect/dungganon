@extends('layouts.global.dashboard')

@section('title', 'Members')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Email</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Date Received</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Subject</th>
                            <th>Date Received</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @isset($mails)
                            @if ($mails)
                                @foreach ($mails as $mail)
                                    <tr>
                                        <td><a class="text-start" href="{{ route('member.mail.show',$mail->id) }}">Dungganon Payment Reminder</a></td>
                                        <td>{{ $mail->date_received }}</td>
                                        <td>{{ $mail->is_seen == 0 ? 'Not Seen' : 'Seen' }}</td>
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