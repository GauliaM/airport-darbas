@extends('layouts.default')
@section('content')
<div class="container-fluid mt-3">
    <div class="text-center">
        <h1>Let's edit {{ $airline->name }} airlines!</h1>
    </div>
    <hr>
    <form action="/airlines/update/{{$airline->id}}" method="POST">
        @csrf
        <div class="d-grid gap-2 mx-auto mt-2">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" name="name" type="text" value="{{ $airline->name }}">
            <select class="form-select" name="countries_id" aria-label="Select country">
                <option selected disabled>Select country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
@endsection