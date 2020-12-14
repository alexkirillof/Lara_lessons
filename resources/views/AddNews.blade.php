@extends('layouts.app')

@section('title-block')
AddNews

@endsection




@section('content')
<div class="container">
  <div class="mb-3">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="width: 600px"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-3">Add News</button>
  <div>

    @endsection