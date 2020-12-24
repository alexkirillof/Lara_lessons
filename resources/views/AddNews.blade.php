@extends('layouts.app')

@section('title-block')
AddNews

@endsection




@section('content')
<div class="container">
  <div class="mb-3">
    <form action="{{ route('AddNews-form') }}" method="post">
      @csrf

      <div class="form-group">
        <label for="Add">Add news</label>
        <textarea name="Add" id="Add" cols="30" rows="5" placeholder="Add News" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-primary mb-2"> Add News </button>
    </form>
  </div>
</div>

@endsection