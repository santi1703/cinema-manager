@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">People</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-3">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Full name</th>
                    <th style="width: 8%">Date of birth</th>
                    <th style="width: 8%"></th>
                </tr>
                @foreach($people as $person)
                    <tr>
                        <td>{{ $person->id }}</td>
                        <td><a href="{{ route('people.edit', ['id' => $person->id]) }}">{{ $person->fullName }}</a></td>
                        <td>{{ $person->date_of_birth }}</td>
                        <td><button class="btn btn-danger" data-id="{{ $person->id }}" onclick="remove(this)">Delete</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('people.create') }}" class="btn btn-primary float-right">New movie</a>
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
                window.location = 'people/destroy/' + idNumber;
            }
        }
    </script>
@endsection
