@extends('layouts.default')
@section('content')
<div class="container-fluid mt-3">
    <div class="text-center">
        @foreach($airports as $airport)
        <h1>Let's add airline to {{$airport->name}}!</h1>
        @endforeach
    </div>
    <hr>
    <form action="/airports/airline/{{$id}}" method="POST">
        @csrf
        <div class="d-grid gap-2 mx-auto mt-2">
            <select class="form-select" name="airlines_id" aria-label="Select country">
                <option selected>Select airline</option>
                @foreach($airlines as $airline)
                <option value="{{$airline->id}}">{{$airline->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Link</button>
    </form>
@endsection