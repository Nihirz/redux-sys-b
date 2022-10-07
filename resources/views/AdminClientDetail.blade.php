@extends('layouts.main')
@section('content')
<div class="content mt-3" onload="multiply();">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Client Details</h4>
                      <p ><b>Name:</b> {{$client->name}}</p>
                      <p><b>Email:</b> {{$client->email}}</p>
                      <p><b>Phone:</b> {{$client->phone}}</p>
                      <p><b>Address:</b>{{$client->address}}</p>
                    </div>
                  </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal fade" id="AddClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('store.product')}}" method="POST">
                @csrf
                <input type="hidden" name="clientid" value="{{$client->id}}">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" id="CategoryTabel">
                    <tbody>
                        <tr>
                            <th>Category</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="cname" class="form-select" aria-label="Default select example">
                                    <option disabled selected>Select Your Category</option>
                                    @foreach($cname as $cname)
                                      <option value="{{$cname->cat_name}}">{{$cname->cat_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-lg-2">Product Name</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="pname" placeholder="Enter Product Name" >
                            </td>
                        </tr>
                        <tr>
                            <th class="col-lg-2">Quantity</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" class="form-control" name="quantity" id="quantity" value="0" placeholder="Enter Product's Quantity" onchange="multiply();">
                            </td>
                        </tr>
                        <tr>
                            <th class="col-lg-2">Unit</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" class="form-control" name="unit" id="unit" value="0" placeholder="Enter Your Unit" onchange="multiply();">
                            </td>
                        </tr>
                        <tr>
                            <th class="col-lg-2">Total</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="total" id="total" class="form-control" disabled>
                            </td>
                        </tr>

                        <tr>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" name="price" id="price" value="0" class="form-control"  onchange="multiply();">
                            </td>
                        </tr>
                        <tr>
                            <th>Grand Toatal</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" name="grandtotal" id="grandtotal" class="form-control" readonly onchange="multiply();" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-primary btn-sm">Save</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script>
    function multiply(){
        var quantity = document.getElementById("quantity").value;
        var unit = document.getElementById("unit").value;
        var total = parseFloat(quantity)*parseFloat(unit);
        document.getElementById("total").value = total;

        var total = document.getElementById("total").value;
        var price = document.getElementById("price").value;
        var grandtotal = parseFloat(total)*parseFloat(price);

        document.getElementById("grandtotal").value = grandtotal;
      }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<div class="breadcrumbs">
    <div class="col-sm-4 mt-3">
        <div class="page-header float-left">
            <div class="page-title">
                <h3>Client's Orders</h3>
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
                        <div class="col-md-9">
                            <strong class="card-title col-lg-6">Order Table</strong>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{route('download.pdf',$client->id)}}" class="btn btn-success btn-sm">Download</a>
                            <a href="{{route('view.pdf',$client->id)}}" class="btn btn-dark btn-sm">View PDF</a>
                        </div>
                    </div>

                    <div class="card-body row">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered"
                            id="CategoryTabel">
                            <thead>
                                <tr>
                                    <th class="col-lg-2">Category</th>
                                    <th class="col-lg-2">Product Name</th>
                                    <th class="col-lg-1">Quantity</th>
                                    <th class="col-lg-1">unit</th>
                                    <th class="col-lg-1">Price</th>
                                    <th class="col-lg-2">Grandtotal</th>
                                    <th class="col-lg-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($clientproduct as $clientproduct)
                            <tr >
                                <td>{{$clientproduct->cname}}</td>
                                <td>{{$clientproduct->pname}}</td>
                                <td>{{$clientproduct->quantity}}</td>
                                <td>{{$clientproduct->unit}}</td>
                                <td>{{$clientproduct->price}}</td>
                                <td>{{$clientproduct->grandtotal}}</td>
                                <td>
                                    <a href="{{route('edit.product',$clientproduct->id)}}"  class="btn btn-primary btn-sm">Edit Product</a>
                                    <a href="{{route('delete.products',$clientproduct->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>

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
<!-- Full Screen Modal -->

<!-- /Full Screen Modal -->
@endsection