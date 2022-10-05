    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body{
            
      /*      background-image: url("/admin_assets/background.jpeg");*/

            background-size: 100% 100%;
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 70%;
            margin-right: auto;
            margin-left: auto;
            background-color: #e3ddda; 
        }
        .brand-section{
           background-color: #e3ddda;
           padding: 10px 40px;
           border-top:2px solid #ad3e11;
           border-bottom:2px solid #ad3e11;
           border-right: 5px solid #ad3e11;
            border-left: 5px solid #ad3e11;

        }
        .nameclr{
            color: #ad3e11;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;

        background-repeat: no-repeat;
        background-size: 100% 100%;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
           /* background-color: #fff;*/
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid black;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>
 
    <div class="container" >
        <div class="brand-section">
            <div class="row">
                <div class="">
      <font  style="float:right;"><a href="" class="" style="text-decoration: none; color:white;"></a></font>
      <img src="admin_assets/images/admin.jpg" / class="mt-3">
                    <p class="nameclr mt-3" >Interior Designer & Furniture Workss</p>
                    
                </div>
           &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
           
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <!-- <div class="col-6"> -->
                   <div class="float-right">
                        <p class="nameclr">Mahendra Chavda</p>
                            <p class="nameclr">Mo.99985 06982</p>
            
                    </div>

                <!-- </div> -->

            </div>
        </div>
<br>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                   @foreach($client as $client)
                    <!-- <h2 class="heading">Invoice No.: 001</h2> -->
                    <p class="sub-heading">Name. {{$client->name}} </p>
                    <p class="sub-heading">Phone Number:{{$client->phone}}</p>
                    <p class="sub-heading">Email Address: {{$client->address}} </p>
                    <p class="sub-heading">Address:{{$client->email}} </p>
                   
                     @endforeach
                </div>
                <div class="col-6">
                    
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered table table-dark table-striped">
                <thead>
                    <tr class="bg-dark text-center">
                        <th class="w-20">Category</th>
                        <th class="w-20">Item</th>
                        <th class="w-20">Unit</th>
                        <th class="w-20">Quentity</th>
                         <!-- <th class="w-20">Size Total</th> -->
                          <th class="w-20">Price</th>
                        <th class="w-20">Total</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach($clientproduct as $clientproduct)
                    <tr>
                        <td>{{$clientproduct->cname}}</td>  
                        <td>{{$clientproduct->pname}}</td>
                        <td>{{$clientproduct->unit}}</td>
                        <td>{{$clientproduct->quantity}}</td>
                        <td>{{$clientproduct->price}}</td>
                        <td>{{$clientproduct->grandtotal}}</td>
                        <!-- <td>{{$clientproduct->cname}}</td> -->
                    </tr>
                    @endforeach
                  
                    <tr>
                        <td colspan="6" class="text-right"><b>Grand Total</b>&emsp;&emsp;</td>
                    </tr> 
                    
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{route('download.pdf',$client->id)}}" class="btn btn-secondary btn-sm text-right">Conver PDF</a>
            </div>
            <br>
          <!--   <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3> -->
        </div>

        <div class="body-section">
           <!--  <p>&copy; Copyright 2021 - Fabcart. All rights reserved. 
                <a href="https://www.fundaofwebit.com/" class="float-right">www.fundaofwebit.com</a>
            </p> -->
         
        </div>      
    </div>      

</body>
</html>