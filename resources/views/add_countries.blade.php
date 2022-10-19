@extends('layouts.default')
@section('content')
<div class="container-fluid mt-3">
    <div class="text-center">
        <h1>Let's create a new country!</h1>
    </div>
    <hr>
    <form action="/add_countries" method="POST">
        @csrf
        <div class="d-grid gap-2 mx-auto mt-2">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Name">
            <label for="name" class="form-label">ISO Code</label>
            <input class="form-control" type="text" name="ISO" placeholder="Code">
        </div>
        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
@endsection