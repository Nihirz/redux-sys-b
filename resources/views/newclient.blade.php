@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Add new client</h4>
      <form id="addCategory" name="addCategory" action="{{route('store.client')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputUsername1">Client Name</label>
          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Enter Client Name" name="name" value="{{ old('name') }}">
          @error('name')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Client Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Client Email" name="email" value="{{ old('email') }}">
          @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Client Phone</label>
          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Client Phone" name="phone" value="{{ old('phone') }}">
          @error('phone')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="text-aread">Client Address</label>
          <textarea name="address" class="form-control" id="text-aread" cols="65" rows="5" placeholder="Enter Client Address">{{ old('address') }}</textarea>
          @error('address')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <a class="btn btn-light" href="{{ route('admin.client') }}">Back</a>
      </form>
    </div>
  </div>
@endsection