@extends('layouts.main')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Clients table</h4>
        <p class="card-description">
            <a href="{{ route('admin.new.client') }}" class="btn btn-sm btn-info">Add Client </a>
        </p>
        <div class="table-responsive">
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
            <tbody class="p-0 me-0 ms-0 mt-0">
                @forelse ($client as $clients)
                    <tr>
                        <td>{{$clients->id}}</td>
                        <td>{{$clients->name}}</td>
                        <td>{{$clients->email}}</td>
                        <td>{{$clients->phone}}</td>
                        <td>{{$clients->address}}</td>
                        <td>
                            <a href="{{route('detail.client',$clients->id)}}" class="btn btn-sm p-0"><i class="mdi mdi-more"></i></a>
                            <a href="{{route('edit.client',$clients->id)}}" class="btn btn-sm p-0"><i class="mdi mdi-lead-pencil"></i></a>
                            <a href="{{route('delete.client',$clients->id)}}" class="btn btn-sm p-0"><i class="mdi mdi-delete"></i></a>
                            <a href="{{route('download.pdf',$clients->id)}}" class="btn btn-sm p-0"><i class="mdi mdi-file-pdf"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="bg-light text-danger">No records found.</td>
                    </tr>
                @endforelse
                <tr >
                  <td colspan="6" >{!! $client->links() !!}</td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection