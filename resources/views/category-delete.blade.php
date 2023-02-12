@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
    <h5 class="modal-title">Info </h5>

    <div class="modal-body">
        Apakah Anda yakin akan menghapus Category {{ $category->name }}?
    </div>
    <div class="mt-5">
        <a class="btn btn-secondary me-3" href="/categories">Tidak</a>
        <a class="btn btn-danger" href="/category-destroy/{{ $category->slug }}">Ya</a>
    </div>

@endsection