@extends('layouts.main')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h3>Category</h3>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">Category Table</h4>
      <p class="card-description">
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Category</a>
      </p>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>CATEGORY</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($AdminCategory as $AdminCategory)
            <tr>
                <td>{{ $AdminCategory->id }}</td>
                <td>{{ $AdminCategory->cat_name }}</td>
                <td>
                    <a href="{{route('edit.category',$AdminCategory->id)}}" data-id="{{ $AdminCategory->id }}" class="btn btn-primary btn-sm btnEdit" data-target="#editCategoryModal"><i class="mdi mdi-lead-pencil"></i></a>
                    <a href="{{route('delete.category',$AdminCategory->id)}}" data-id="{{ $AdminCategory->id }}" class="btn btn-danger btn-sm"
 onclick="return confirm('Are you sure?')"><i class="mdi mdi-delete"></i></button>
                </td>
            </tr>
            @empty
                <tr>
                    <td class="text-danger">No category found</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection