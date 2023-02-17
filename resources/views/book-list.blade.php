@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <div class="my-2">
        <div class="row">
            @foreach ($books as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('image/no_cover.jpg') }}" class="card-img-top rounded mx-auto d-block" draggable="false" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->book_code }}</h5>
                        <p class="card-text">{{ $item->title }}</p>
                        <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                            {{ $item->status }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection