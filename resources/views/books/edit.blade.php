@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit book</div>
                    <div>
                        @if($errors)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <form action="{{route('books.update', ['id' => $book->id])}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="name" value="{{$book->name}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>
                                    <input type="number" name="price" value="{{$book->price}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Submit</td>
                                <td>
                                    <input type="submit"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
