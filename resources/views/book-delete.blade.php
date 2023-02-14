@extends('layouts.mainlayout')

@section('title', 'Delete Book')

@section('content')
    <h5 class="modal-title">Info </h5>

    <div class="modal-body">
        Apakah Anda yakin akan menghapus Book {{ $book->title }}?
    </div>
    <div class="mt-5">
        <a class="btn btn-secondary me-3" href="/books">Tidak</a>
        <a class="btn btn-danger" href="/book-destroy/{{ $book->slug }}">Ya</a>
    </div>

@endsection