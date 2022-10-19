@extends('layouts.default')
@section('content')
<div class="container-fluid mt-3">
    <div class="text-center">
        <h1>Let's remove airline to {{ $airport->airline->name }} airport!</h1>
    </div>
    <hr>
    <form action="/airports/airlineremove/{{$id}}" method="POST">
        @csrf
        <div class="d-grid gap-2 mx-auto mt-2">
            <select class="form-select" name="airlines_id" aria-label="Select country">
                <option selected>Select airline</option>
                <option value="{{$airport->airline->id}}">{{ $airport->airline->name }}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Unlink</button>
    </form>
@endsection