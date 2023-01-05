@extends('layouts.customer')
@section('title',$product->name)

@section('content')
    <div class="py-5">

    </div>
  <div class="py-3 mb-3 mt-2 shadow-sm backgroundofroutes border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('category')}}">Collection</a>/
            <a href="{{url('view-category/'.$product->category->slug)}}">{{$product->category->name}}</a>/
            <a href="{{url('view-category/'.$product->category->slug.'/'.$product->slug)}}">{{$product->name}}</a>
        </h6>
    </div>
  </div>
  <div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('upload/product/'.$product->image)}}" alt="" class="w-100">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$product->name}}
                        <label for="" style="font-size: 1rem; background:rgba(234,88,11,255); color:white;" class="float-end badge  trending_tag">{{$product->trending == "1" ? 'Trending': '' }}</label>
                    </h2>
                    <hr>
                    <label for="" class="me-3">Original Price  : <s>Rs {{$product->original_price}}</s></label>
                    <label for="" class="fw-bold">Selling Price  : Rs {{$product->selling_price}}</label>
                    <p class="mt-3">
                        {!! $product->small_description !!}
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam labore quibusdam voluptate repudiandae accusamus dicta aut voluptates doloremque perspiciatis beatae!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente incidunt ducimus culpa vita
                    </p>
                    <hr>
                    @if($product->qty > 0)
                        <label for="" style="background:rgba(234,88,11,255); color:white;" class="badge">In Stock</label>
                    @else
                        <label for="" class="badge bg-danger">Out Of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                            <label for="quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" readonly name="quantity" value="1" class="form-control quantity-input bg-light text-center">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            @if($product->qty > 0)
                            <button class="btn btn-outline-primary me-3 float-start addToCartButton">Add to Cart <i class="fa-solid fa-cart-plus"></i></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="py-2">
    
  </div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $('.addToCartButton').click(function(e){
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.quantity-input').val();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                method : "POST",
                url : "/add-to-cart",
                data : {
                    'product_id': product_id,
                    'product_qty': product_qty
                },
                success: function(response)
                {
                    if(response.status === "Please Login First...")
                    {

                        swal("Oops...", `${response.status}`, "error");
                    }
                    else if(response.status === "Please Verify you Email")
                    {

                        swal("Oops...", `${response.status}`, "error");
                    }
                    else
                    {
                        swal("Done!", `${response.status}`, "success");
                    }
                }
            })
        })


        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value = $('.quantity-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $('.quantity-input').val(value);
            }
        }) 
        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            console.log('hello')

            var inc_value = $('.quantity-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $('.quantity-input').val(value);
            }
        }) 
    }) 
</script>
@endsection