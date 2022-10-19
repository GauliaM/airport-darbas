@extends('layouts.default')
@section('content')
<div class="container-fluid mt-3">
    <div class="text-center">
        <h1>Are you sure you want to delete {{ $airline->name }}, {{ $country }} airline?</h1>
        <p>This action will remove all associations with airports</p>
    </div>
    <hr>
    <form action="/airlines/delete/{{ $airline->id }}" method="POST" class="text-center">
        @csrf
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="submit" class="btn btn-danger btn-lg">Yes</button>
            <a href="/airlines" role="button" class="btn btn-success btn-lg">No</a>
        </div>
    </form>
@endsection