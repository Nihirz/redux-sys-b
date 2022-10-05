@extends('layouts.main')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Category</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                        <strong class="card-title col-lg-6">Category Table</strong>
                        <div class="text-right col-lg-6">
                            <a data-toggle="modal" data-target="#addCategoryModal" class="btn btn-primary">Add
                                Category</a>
                        </div>
                    </div>
                    <div class="card-body row">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered"
                            id="CategoryTabel">
                            <thead>
                                <tr>
                                    <th class="col-lg-1">ID</th>
                                    <th class="col-lg-4">Category</th>
                                    <th class="col-lg-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($AdminCategory as $AdminCategory)
                                <tr id="{{ $AdminCategory->id }}">
                                    <td>{{ $AdminCategory->id }}</td>
                                    <td>{{ $AdminCategory->cat_name }}</td>
                                    <td>
                                        <a href="{{route('edit.category',$AdminCategory->id)}}" data-id="{{ $AdminCategory->id }}" class="btn btn-primary btnEdit" data-target="#editCategoryModal">Edit</a>
                                        <a href="{{route('delete.category',$AdminCategory->id)}}" data-id="{{ $AdminCategory->id }}" class="btn btn-danger"
                                            id="btnDelete">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

{{-- Add Category Modal --}}
<div id="addCategoryModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Category</h4>
            </div>
            <div class="modal-body">
                <form id="addCategory" name="addCategory" action="{{route('store.category')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtCatName">Category Name:</label>
                        <input type="text" class="form-control" id="cat_name" placeholder="Enter Category Name"
                            name="cat_name">
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
{{-- Add Category Modal --}}

{{-- Edit Category --}}

<!-- Update Student Modal -->
<div id="editCategoryModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Student Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Student</h4>
            </div>
            <div class="modal-body">
                <form id="updateCategory" name="updateCategory" action="" method="post">
                    <input type="hidden" name="hdnStudentId" id="hdnStudentId" />
                    @csrf
                    <div class="form-group">
                        <label for="txtFirstName">First Name:</label>
                        <input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name="txtFirstName">
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
{{-- /Edit Category --}}






{{-- Script Start --}}
<script>
    $(document).ready(function () {
        $("#addCategory").validate({
            rules: {
                cat_name: "required",
            },
            messages: {
            },
            submitHandler: function (form) {
                var form_action = $("#addCategory").attr("action"); //Form Action Id
                $.ajax({
                    data: $('#addCategory').serialize(),
                    url: form_action,
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        var student = '<tr id="' + data.id + '">';
                        student += '<td>' + data.id + '</td>';
                        student += '<td>' + data.cat_name + '</td>';
                        student += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
                        student += '</tr>';
                        $('#CategoryTabel tbody').prepend(student);
                        $('#addCategory')[0].reset();
                        $('#addCategoryModal').modal('hide');
                    },
                    error: function (data) {
                    }
                });
            }
        });

        //When click edit student
        $('body').on('click', '.btnEdit', function () {
            var student_id = $(this).attr('data-id');
            $.get('student/' + student_id + '/edit', function (data) {
                $('#updateModal').modal('show');
                $('#updateCategory #hdnStudentId').val(data.id);
                $('#updateCategory #txtFirstName').val(data.cat_name);
            })
        });
        // Update the student
        $("#updateCategory").validate({
            rules: {
                cat_name: "required",
            },
            messages: {
            },
            submitHandler: function (form) {
                var form_action = $("#updateCategory").attr("action");
                $.ajax({
                    data: $('#updateCategory').serialize(),
                    url: form_action,
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        var student = '<td>' + data.id + '</td>';
                        student += '<td>' + data.first_name + '</td>';
                        student += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
                        $('#studentTable tbody #' + data.id).html(student);
                        $('#updateCategory')[0].reset();
                        $('#updateModal').modal('hide');
                    },
                    error: function (data) {
                    }
                });
            }
        });

    });

</script>
<script>
    $(document).ready(function () {
        //delete Category
        $('body').on('click', '#btnDelete', function () {
            var category_id = $(this).attr('data-id');
            $.get('delete/' + category_id + '/delete', function (data) {
                $('#CategoryTabel tbody #' + category_id).remove();
            })
        });


    });

</script>

{{-- New Delete --}}
{{-- <script>    
        $('.delete_class').click(function(){
            var tr = $(this).closest('tr'),
                del_id = $(this).attr('id');

            $.ajax({
                url: "delete_page.php?delete_id="+ del_id,
                cache: false,
                success:function(result){
                    tr.fadeOut(1000, function(){
                        $(this).remove();
                    });
                }
            });
        });
</script> --}}
{{-- /Scriptt End --}}
<script src="{{asset('admin_assets/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/main.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
@endsection