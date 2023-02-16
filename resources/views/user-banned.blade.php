@extends('layouts.mainlayout')

@section('title', 'Deleted User')

@section('content')
    <h1>Banned User List</h1>

    <div class="d-flex justify-content-end">
        <a href="/users" class="btn btn-primary">Back</a>
    </div>
    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bannedUsers as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        @if ($user->phone)
                            {{ $user->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $user->address }}</td>
                    <td>
                        <a href="/user-restore/{{ $user->slug }}">Restore</a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>

@endsection