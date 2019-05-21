@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit person</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('people.update', ['id' => $person->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.people.form', ['person' => $person])
            </form>
        </div>
    </div>
@endsection
