@extends('main')
@section('content')
    @if(session()->has('success'))
        <p class="alert alert-success">{{session('success')}}</p>
    @elseif(session()->has('delete'))
        <p class="alert alert-warning">{{session('delete')}}</p>
        @endif





    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-3 bg-silver">
                <a href="{{route('books.create')}}" class="btn btn-primary">Add Book</a>
            </div>
            <div class="col-lg-12">
                <h1>Records</h1>
            </div>
            <div class="card col-lg-8">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>

                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Description</th>
                        <th scope="col">Kinds</th>
                        <th scope="col">Locations</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">DELETE</th>
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookks as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->name}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->description}}</td>
                        <td>{{$book->kinds}}</td>
                        <td>{{$book->locations}}</td>
                        <th scope="col"><a href="{{route('books.edit',$book->id)}}" class="btn btn-primary">Edit</a></th>
                        <th scope="col">

                            <form action="{{route('books.destroy',$book->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </div>


@endsection
