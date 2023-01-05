@extends('layouts.admin')



@section('content')
   <div class="card">
    <div class="card-header">
        <h4>Product Page</h4>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-fixed table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th >Name</th>
                    <th >Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)    
                <tr>
                    <td >{{$item->id}}</td>
                    <td >{{$item->category->name}}</td>
                    <td >{{$item->name}}</td>
                    <td >{{$item->selling_price}}</td>
                    <td class="col-md-3 ">
                        <img src="{{asset('upload/product/'.$item->image)}}" class="w-50 h-25" alt="Image Not Found">
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('edit-product/'.$item->id)}}">Edit</a>
                        <a  class="btn btn-danger" href="{{url('delete-product/'.$item->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection