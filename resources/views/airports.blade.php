@extends('layouts.default')
@section('content')
<div class="container-fluid mt-2">
  <div class="text-center">
    <a class="btn btn-danger" href="/airports/add" role="button">New airport</a>
  </div>
  <form action="/airports/search/" method="POST">
    @csrf
    <div class="d-grid gap-2 col-12 mx-auto mt-2">
      <select class="form-select" name="id" aria-label="Search by country">
        <option selected value="0">Search by country</option>
        @foreach($countries as $country)
        <option value="{{$country->id}}">{{ $country->name }}</option>
        @endforeach
      </select>
      <div class="text-center">
        <button class="btn btn-success" type="submit">Search</button>
      </div>
    </div>
  </form>
  <hr>
  <div class="d-grid gap-2 mx-auto mt-2">
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Country</th>
          <th scope="col">Location</th>
          <th scope="col">Airlines</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($airports as $airport)
        <tr>
          <th scope="row">{{ $airport->name }}</th>
          <td>
            @if ($airport->country !== null)
                {{ $airport->country->name }}
            @endif
          </td>
          <td>{{$airport->coords}}</td>
          <td>
            @if ($airport->airline !== null)
                {{ $airport->airline->name }}
            @endif
          </td>
          <td>
            <a class="btn btn-success" href="/airports/newAirline/{{ $airport->id }}"  role="button">Add airline</a>
            <a class="btn btn-danger" href="/airports/removeAirline/{{ $airport->id }}" role="button">Remove airline</a>
            <a class="btn btn-warning" href="/airports/edit/{{ $airport->id }}" role="button">Edit</a>
            <a class="btn btn-danger" href="/airports/delete/{{ $airport->id }}" role="button">Delete</a>
          </td>
        @endforeach
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection