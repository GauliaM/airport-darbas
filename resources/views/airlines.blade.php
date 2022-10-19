@extends('layouts.default')
@section('content')
<div class="container-fluid mt-3">
    <div class="text-center">
        <a class="btn btn-danger" href="airlines/new" role="button">New airline</a>
    </div>
    <hr>
    <div class="d-grid gap-2 mx-auto mt-2">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Country</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($airlines as $airline)
                <tr>
                    <th scope="row">{{ $airline->name }}</th>
                    <td>{{ $airline->country->name }}</td>
                    <td>
                        <a class="btn btn-warning" href="airlines/edit/{{$airline->id}}" role="button">Edit</a>
                        <a class="btn btn-danger" href="airlines/delete/{{$airline->id}}" role="button">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection