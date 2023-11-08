@extends('layouts.base_admin.base_dashboard')

@section('content')
<form method="post" action="/dashboard/admin/sarpras/{{$data->id}}" >
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="text" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
    </div>
    <div class="mb-3">
      <label for="latitude" class="form-label">Latitude</label>
      <input type="text" class="form-control" id="latitude" name="latitude" value="{{$data->latitude}}">
    </div>
    <div class="mb-3">
      <label for="longitude" class="form-label">Longitude</label>
      <input type="text" class="form-control" id="longitude" name="longitude" value="{{$data->longitude}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection