@extends('layouts.customer')


@section('title')
   My Cart
@endsection

@section('content')
<div class="py-5">

</div>
<div class="py-3 mb-3 mt-2 shadow-sm backgroundofroutes border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">Home</a>/
            <a href="{{url('cart')}}">Cart</a>
        </h6>
    </div>
  </div>
<div class="container my-2">
    <div class="card shadow mycartitems ">
        @if($cartItem->count() > 0)
        <div class="card-body">
            @php
                $total = 0;
            @endphp
            @foreach ($cartItem as $item) 
            <div class="row product_data border-bottom border-light my-4 d-flex justify-content-around align-items-center " >
                <div class="col-md-2">
                    <img src="{{asset('upload/product/'.$item->products->image)}}" height="80px" width="90px" alt="Image Here">
                </div>
                <div class="col-md-3 text-center ">
                    <h5>{{$item->products->name}}</h5>
                </div>
                <div class="col-md-2 text-center ">
                    <h5>RS {{$item->products->selling_price}}</h5>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                    @if($item->products->qty >= $item->prod_qty)
                    <label for="quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:8.125rem">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" value="{{$item->prod_qty}}" readonly class="form-control bg-light quantity_input text-center">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    @php
                    $total += $item->products->selling_price * $item->prod_qty;
                    @endphp
                    @else
                        <h5>Out of Stock</h5>
                    @endif

                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-danger deleteCartItem"><i class="fa fa-trash"></i> Delete</button>
                </div>
            </div>
           
            @endforeach
        </div>
        <div class="card-footer d-flex flex-column">
            <div class="d-flex align-items-center justify-content-end text-center">
                <h6 class="float-end">Total Price : RS {{$total}}</h6>
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end ">Check out</a>
            </div>
        </div>
       
        @else   
        <div class="card-body d-flex align-items-center justify-content-center flex-column">
            <h2 class="p-2 m-1">Your <i class="fa fa-shopping-cart"></i>Cart is Empty</h2>
            <a href="{{url('category')}}" class="btn p-2 m-1 btn-outline-primary float-end">Continue Shopping</a>
        </div>
        @endif
    </div>
    <div class="py-5">

    </div>
    <div class="py-4">
    
    </div>
    <div class="py-5">
    
    </div>
    <div class="py-5">
    
    </div>
</div>

@endsection


@section('scripts')
<script>

$(document).ready(function () {
      


        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var inc_value = $(this).closest('.product_data').find('.quantity_input').val();

            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $(this).closest('.product_data').find('.quantity_input').val(value);
            }
        }) 
        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            console.log('hello')

            var dec_value = $(this).closest('.product_data').find('.quantity_input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $(this).closest('.product_data').find('.quantity_input').val(value);
            }
        }) 

        $('.deleteCartItem').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id  = $(this).closest('.product_data').find('.prod_id').val();

            $.ajax({
                method : "POST",
                url : "delete-cart-item",
                data : {
                    'prod_id': prod_id,
                },
                success: function(response)
                {
                    // window.location.reload();
                    $('.mycartitems').load(location.href + " .mycartitems");
                    swal("Done!", `${response.status}`, "success");
                }
            })
        }) 

        $('.changeQuantity').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id  = $(this).closest('.product_data').find('.prod_id').val();
            var prod_qty  = $(this).closest('.product_data').find('.quantity_input').val();
            
            $.ajax({
                method : "POST",
                url : "update-cart",
                data : {
                    'prod_id': prod_id,
                    'prod_qty': prod_qty
                },
                success: function(response)
                {
                    window.location.reload();
                }
            })
        }) 
    }) 
</script>

@endsection