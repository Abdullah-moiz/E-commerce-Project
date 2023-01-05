@extends('layouts.admin')



@section('content')
   <div class="card">
    <div class="card-header">
        <h4>Complains Page</h4>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-fixed table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Complain Id</th>
                    <th >Name</th>
                    <th >Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complain as $item)    
                <tr>
                    <td >{{$item->id}}</td>
                    <td >{{$item->name}}</td>
                    <td >{{$item->email}}</td>
                    <td >{{$item->subject}}</td>
                    <td >{{$item->message}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection