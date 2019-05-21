@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New movie</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('people.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.people.form')
            </form>
        </div>
    </div>
@endsection
