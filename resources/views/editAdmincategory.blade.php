@extends('layouts.main')
@section('content')
<div id="addCategoryModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Category</h4>
            </div>
            <div class="modal-body">
                <form  action="{{route('update.category')}}" method="POST">
                    @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                    <div class="form-group">
                        <label for="txtCatName">Category Name:</label>
                        <input type="text" class="form-control" id="cat_name" placeholder="Enter Category Name"
                            name="cat_name" value="{{$category->cat_name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection