@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <a href="{{route('books.create')}}">
            Create
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Books</div>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Controls</th>
                    </tr>
                    @foreach($books as $book)
                        <tr>
                            <td>
                                {{$book->name}}
                            </td>
                            <td>
                                {{$book->price}}
                            </td>
                            <td>
                                <a href="{{route('books.edit', ['id' => $book->id])}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('books.destroy', ['id' => $book->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
