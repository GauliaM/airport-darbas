@extends('layouts.default')
@section('content')
<div class="container-fluid mt-3">
    <div class="text-center">
        <h1>Are you sure you want to delete this airport?</h1>
        <p>This action will remove all associations with other airlines and countries</p>
    </div>
    <hr>
    <form action="/airports/delete/{{ $id }}" method="POST" class="text-center">
        @csrf
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="submit" class="btn btn-danger btn-lg">Yes</button>
            <a href="/airports" role="button" class="btn btn-success btn-lg">No</a>
        </div>
    </form>

@endsection