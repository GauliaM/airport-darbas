@extends('layouts.default')
@section('content')
<div class="container-fluid mt-3">
    <div class="text-center">
        <h1>Are you sure you want to delete {{ $country->name }} country?</h1>
        <p>This action will remove all other airlines and countries associated with this country.</p>
    </div>
    <hr>
    <form action="/countries/delete/{{$country->id}}" method="POST" class="text-center">
        @csrf
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="submit" class="btn btn-danger btn-lg">Yes</button>
            <a href="/countries" role="button" class="btn btn-success btn-lg">No</a>
        </div>
    </form>
@endsection