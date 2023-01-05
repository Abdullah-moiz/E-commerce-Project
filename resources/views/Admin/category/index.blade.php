@extends('layouts.admin')



@section('content')
   <div class="card">
    <div class="card-header">
        <h4>Category Page</h4>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-fixed table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th >Name</th>
                    <th >Description</th>
                    <th>Image</th>
                    <th  >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)    
                <tr>
                    <td >{{$item->id}}</td>
                    <td >{{$item->name}}</td>
                    <td >{{$item->description}}</td>
                    <td class="col-md-3 ">
                        <img src="{{asset('upload/category/'.$item->image)}}" class="w-50 "  style="height: 100px !important" alt="Image Not Found">
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('edit-category/'.$item->id)}}">Edit</a>
                        <a  class="btn btn-danger" href="{{url('delete-category/'.$item->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection