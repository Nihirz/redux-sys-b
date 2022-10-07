@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Category</h4>
      <form class="forms-sample" method="POST" action="{{route('update.category')}}" >
        @csrf
        <input type="hidden" name="id" value="{{ $category->id }}">
        <div class="form-group">
          <label for="exampleInputUsername1">Category Name:</label>
          <input type="text" class="form-control" name="cat_name" id="exampleInputUsername1" placeholder="Username" value="{{ $category->cat_name }}">
          @error('cat_name')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary me-2">Update</button>
        <a href="{{ route('admin.category') }}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
@endsection