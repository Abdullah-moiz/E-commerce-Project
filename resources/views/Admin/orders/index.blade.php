@extends('layouts.admin')


@section('content')
   <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>New Orders
                            <a href="{{url('order-history')}}" class="btn btn-primary float-end">Order History</a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table  align-middle text-center">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td> {{$item->tracking_no}} </td>
                                        <td> {{$item->total_price}} </td>
                                        <td> {{$item->status == '0' ? "Pending" : "Completed"}} </td>
                                        <td>    
                                            <a href="{{url("admin/view-order/".$item->id)}}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection