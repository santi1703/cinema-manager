@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Movies</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-3">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th style="width: 8%">Poster</th>
                    <th style="width: 8%">Year of release</th>
                    <th style="width: 8%"></th>
                </tr>
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td><a href="{{ route('movies.edit', ['id' => $movie->id]) }}">{{ $movie->title }}</a></td>
                        <td><div style="background: url('{{ asset($movie->movie_poster) }}') center; width: 100px; height: 100px; background-size: cover;"></div></td>
                        <td>{{ $movie->release_year }}</td>
                        <td><button class="btn btn-danger" data-id="{{ $movie->id }}" onclick="remove(this)">Delete</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('movies.create') }}" class="btn btn-primary float-right">New movie</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function remove(elem) {
            idNumber = $(elem).data('id');
            if(confirm('You are about to delete the item with the Id number ' + idNumber + ', are you sure?')){
                window.location = 'movies/destroy/' + idNumber;
            }
        }
    </script>
@endsection
