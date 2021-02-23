@extends('main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-3 bg-silver">
                <a href="{{route('books.index')}}" class="btn btn-primary">Back to Home</a>
            </div>
            <div class="col-lg-12">
                <h1>Create The Record</h1>
            </div>
            <div class="col">
                <form class="form" action="{{route('books.update',$book->id)}}" method="post">
                    @csrf
                @method('PUT')
                    <div class="form-group col-lg-6">
                        <label for="title">Name</label>
                        <input class="form-control" name="name"  type="text" placeholder="Title" value="{{$book->name}}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="title">Author</label>
                        <input class="form-control" name="author"  type="text" placeholder="Title" value="{{$book->author}}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" value="{{$book->description}}" placeholder="Description">
                    </div>
                    <div class="col-lg-6">
                        <h3>Select your Books</h3>
                        <select class="custom-select mb-4" name="kinds">
                            <option selected value="{{$book->kinds}}">Select Books Type</option>
                            <option value="comedian">Comedian</option>
                            <option value="romantic">Romantic</option>
                            <option value="story">Story</option>
                            <option value="fiction">Sci/Fiction</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <h3>Locations</h3>
                        <select class="custom-select mb-4" name="locations">
                            <option selected value="{{$book->locations}}">Select City</option>
                            <option value="zurich">Zürich</option>
                            <option value="st-gallen">St. Gallen</option>
                            <option value="basel">Basel</option>
                            <option value="bern">Bern</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">Save</button>
                </form>

            </div>



        </div>
    </div>
@endsection
