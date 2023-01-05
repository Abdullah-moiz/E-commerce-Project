@extends('layouts.admin')



@section('content')
   <div class="card">
    <div class="card-header">
        <h4>Register Users</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped table-fixed table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th >Name</th>
                    <th >Email</th>
                    <th>Phone No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)    
                <tr>
                    <td >{{$item->id}}</td>
                    <td >{{$item->name}}</td>
                    <td >{{$item->email}}</td>
                    <td >{{$item->phoneno}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('view-user/'.$item->id)}}">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection