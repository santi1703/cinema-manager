@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit movie</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('movies.update', ['id' => $movie->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.movies.form', ['movie' => $movie])
            </form>
        </div>
    </div>
@endsection
