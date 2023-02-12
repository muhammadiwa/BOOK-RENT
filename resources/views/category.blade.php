@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')
    <h1>Category List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="category-deleted" class="btn btn-outline-primary me-2">Deleted List</a>
        <a href="category-add" class="btn btn-primary">Add Data</a>
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
                    <td>No.</td>
                    <td>Name</td>
                    <td>Action</td>
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