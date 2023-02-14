@extends('layouts.mainlayout')

@section('title', 'Book')

@section('content')
    <h1>Book List</h1>

    <div class="mt-3 d-flex justify-content-end">
        <a href="book-deleted" class="btn btn-outline-primary me-2">Deleted List</a>
        <a href="book-add" class="btn btn-primary">Add New Data</a>
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
                    <th>Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                            {{ $category->name }} <br>
                        @endforeach
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/book-edit/{{ $item->slug }}">edit</a>
                        <a href="/book-delete/{{ $item->slug }}">delete</a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>

@endsection