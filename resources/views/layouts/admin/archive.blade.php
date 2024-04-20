@extends('layouts.global.dashboard')

@section('title', 'Archive Users')

@section('content')
<main>
    @if (session('archive'))
        <div class="alert alert-success text-center">
            {{ session('archive') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">Archived Users</h1>
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
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </tfoot>
                    <tbody>
                        @isset($users)
                            @if ($users)
                                @foreach ($users as $user)
                                    @if ($user->role === 'archive')
                                        <tr>
                                            <td>{{ $user->first_name . " " . $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <!-- <td style="display: flex;">
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.member.edit', $user->id) }}"><i class="fas fa-pen"></i></a>
                                                <form action="{{ route('admin.member.update', $user->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-box-archive"></i> Update Role</button>
                                        </form>


                                                <form action="{{ route('admin.member.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                        <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-box-archive"></i></button>
                                                    @method('DELETE')
                                                </form>
                                                {{-- <a class="btn btn-secondary btn-sm" href="{{ route('admin.member.delete', $user->id) }}"><i class="fas fa-trash"></i></a> --}}
                                            </td> -->
                                        </tr>
                                    @endif 
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