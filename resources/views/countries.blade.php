@extends('layouts.default')
@section('content')
<div class="container-fluid mt-3">
    <div class="text-center">
        <a class="btn btn-danger" href="/countries/new" role="button">New country</a>
        <a class="btn btn-danger" href="/countries/noAirlines" role="button">Countries without airlines</a>
        <a class="btn btn-danger" href="/countries/noAirlinesCountries" role="button">Countries without airlines and airports</a>
    </div>
    <hr>
    <div class="d-grid gap-2 mx-auto mt-2">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                    <tr>
                        <th scope="row">{{ $country->name }}</th>
                        <td>{{ $country->ISO }}</td>
                        <td>
                            <a class="btn btn-warning" href="/countries/edit/{{$country->id}}" role="button">Edit</a>
                            <a class="btn btn-danger" href="/countries/delete/{{$country->id}}" role="button">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
