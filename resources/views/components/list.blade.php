@extends('layout')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <body>
            @foreach($articles as $article)
            <tr>
                <td scoope="row">{{ $article->name}}</td>
                <td>{{ $article->description}}</td>
                <td>{{ $article->price}}</td>
                <td>{{ $article->stock}}</td>
                <td>{{ $article->status}}</td>
                <td><a href="{{url('articles/'.$article->id)}}" class="btn btn-warning"> edit </a>
            </tr>
            @endforeach
        </body>
    </table>
    <a href="{{url('/articles/create')}}" class="btn btn-success"> Add article</a>

@stop