@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')
    <h1>Detail User</h1>

    <div class="mt-3 d-flex justify-content-end">
        @if ($user->status == 'inactive')
            <a href="/user-approve/{{ $user->slug }}" class="btn btn-outline-info me-2">Approve User</a>
        @endif
        @if ($user->status == 'active')
            <a href="/users" class="btn btn-outline-primary me-2">Back</a>
        @endif
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="my-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>
                        @if ($user->phone)
                            {{ $user->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->status }}</td>
                </tr> 
            </tbody>
        </table>
    </div>

@endsection