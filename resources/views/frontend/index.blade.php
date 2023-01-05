@extends('layouts.customer')


@section('title')
   Pain & Gain
@endsection

@section('content')
    @include('layouts.inc.IntroVideo')
    <div class="py-2">
        <div class="container  d-flex align-items-center justify-content-around p-4">
            <div class="border border-dark " style="width:20rem; background:black;"></div>
            <h3 style="font-size: ; font-weight:bolder; padding:5px;">Top Categories</h3>
            <div class="border border-dark " style="width:20rem; background:black;"></div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
               
                    <a  href="{{url('/category')}}" class="card col-md-4 " style="border:none;">
                        <div class="card-body zoom postion-relative">
                            <img src="{{asset('images/accessories.jpg')}}"  class="w-100 lazy rounded" height="200px"   alt="">
                            <div class="text-light position-absolute top-50 start-50 translate-middle">
                                <h4 style="letter-spacing:3px; ">ACCESSORIES</h4>
                            </div>
                        </div>
                    </a>
                    <a href="{{url('/category')}}"   class="card col-md-4 " style="border:none;">
                        <div class="card-body zoom postion-relative">
                            <img src="{{asset('images/equipments.jpg')}}"  class="w-100 lazy rounded" height="200px"  alt="">
                            <div class="text-light position-absolute top-50 start-50 translate-middle">
                                <h4 style="letter-spacing:3px; ">EQUIPMENTS</h4>
                            </div>
                        </div>
                    </a>
                    <a href="{{url('/category')}}" class="card col-md-4 " style="border:none;">
                        <div class="card-body zoom postion-relative">
                            <img src="{{asset('images/supplements.jpg')}}"  class="w-100 lazy rounded" height="200px"  alt="">
                            <div class="text-light position-absolute top-50 start-50 translate-middle">
                                <h4 style="letter-spacing:3px; ">SUPPLEMENTS</h4>
                            </div>
                        </div>
                    </a>
                
            </div>
        </div>
    </div>
    
    <div class="container  d-flex align-items-center justify-content-around p-4">
        <div class="border border-dark " style="width:20rem; background:black;"></div>
        <h3 style="font-size: ; font-weight:bolder; padding:5px;">NEW ARRIVALS</h3>
        <div class="border border-dark " style="width:20rem; background:black;"></div>
    </div>
    <div class="py-5" id="products">
        <div class="container">
            <div class="row d-flex flex-wrap">
                @foreach ($product as $item )
                <div class="col-md-3 mt-2">
                             <a  class="link-dark"  href="{{url(asset('view-product/'.$item->slug))}}">
                            <div class="card hello-card" style="width: 18rem;">
                                <img src="{{asset('upload/product/'.$item->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">{{$item->name}}</h6>
                                        <span href="#" class=" pe-auto float-start">RS <s>{{$item->original_price}}</s></span>
                                        <span href="#" class=" pe-auto float-end">RS {{$item->selling_price}}</span>
                                </div>
                            </div>
                        </a>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection



@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- custom JS code after importing jquery and owl -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots:false,
            disable:false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>

    <script>
        swal("Done!", `${response.status}`, "success");
    </script>
@endsection
@section('css')
  <style>
    
    .owl-nav
    {
        display: block !important; 
    }
    .owl-nav button
    {
        font-size: 2rem !important;
    }
  

  </style>



@endsection


