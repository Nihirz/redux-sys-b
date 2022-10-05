@extends('layouts.main')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Clients table</h4>
        <p class="card-description">
            <a href="{{ route('admin.new.client') }}">Add Client </a>
        </p>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($client as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->address}}</td>
                        <td>
                            <a href="{{route('detail.client',$client->id)}}">Details</a>
                            <a href="{{route('edit.client',$client->id)}}">Edit</a>
                            <a href="{{route('delete.client',$client->id)}}">Delete</a>
                            <a href="{{route('download.pdf',$client->id)}}">PDF</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="bg-light text-danger">No records found.</td>
                    </tr>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

{{-- Edit Client Modal --}}
<div class="modal fade" id="EditClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addCategory" name="addCategory" action="{{route('update.client')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$client->id}}">
                <div class="form-group">
                    <label for="txtCatName">Client Name:</label>
                    <input type="text" class="form-control" value="{{$client->name}}" placeholder="Enter Client Name" name="name">
                </div>
                <div class="form-group">
                    <label for="txtCatName">Client Email:</label>
                    <input type="email" class="form-control" value="{{$client->email}}" placeholder="Enter Client Email" name="email">
                </div>
                <div class="form-group">
                    <label for="txtCatName">Client Phone:</label>
                    <input type="number" class="form-control" value="{{$client->phone}}"  placeholder="Enter Client Phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="txtCatName">Client Address:</label><br>
                    <textarea name="address" id="" cols="65" rows="5" placeholder="Enter Client Address">{{$client->address}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
        </div>
      </div>
    </div>
  </div>
{{-- /Edit Client Modal --}}
@endsection