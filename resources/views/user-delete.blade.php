@extends('layouts.mainlayout')

@section('title', 'Delete User')

@section('content')
    <h5 class="modal-title">Info </h5>

    <div class="modal-body">
        Apakah Anda yakin akan menghapus User {{ $user->username }}?
    </div>
    <div class="mt-5">
        <a class="btn btn-secondary me-3" href="/users">Tidak</a>
        <a class="btn btn-danger" href="/user-destroy/{{ $user->slug }}">Ya</a>
    </div>

@endsection