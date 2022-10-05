@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-3">
        <h1>Edit Details</h1>
    </div>
    <div class="col-lg-5">
        <form action="{{route('update.product')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$products->id}}">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" id="CategoryTabel">
                    <tbody>
                        <tr>
                            <th>Category</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="cname">
                                @foreach($cname as $cname)
                                <option value="{{ $cname->cat_name }}" selected>{{$cname->cat_name}}</option>
                                @endforeach 
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-lg-2">Product Name</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="pname" value="{{$products->pname}}" placeholder="Enter Product Name" >
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
                            <th>Subtotal</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" name="subtotal"  class="form-control" readonly>
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
    </div>
</div>
  
@endsection