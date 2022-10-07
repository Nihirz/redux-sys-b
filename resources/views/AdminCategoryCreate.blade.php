@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Create Category</h4>
      <form class="forms-sample" method="POST" action="{{route('store.category')}}" >
        @csrf
        <div class="form-group">
          <label for="exampleInputUsername1">Category Name:</label>
          <input type="text" class="form-control" name="cat_name" id="exampleInputUsername1" placeholder="Username">
          @error('cat_name')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
@endsection