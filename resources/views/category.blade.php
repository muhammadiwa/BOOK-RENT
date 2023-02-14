@extends('layouts.mainlayout')

@section('title', 'Book')

@section('content')
    <h1>Category List</h1>

    <div class="mt-3 d-flex justify-content-end">
        <a href="category-deleted" class="btn btn-outline-primary me-2">Deleted List</a>
        <a href="category-add" class="btn btn-primary">Add New Data</a>
    </div>
    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>            
        @endif
    </div>

    <div class="my-3">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="#">view</a>
                        <a href="category-edit/{{ $item->slug }}">edit</a>
                        <a href="category-delete/{{ $item->slug }}">delete</a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>

@endsection