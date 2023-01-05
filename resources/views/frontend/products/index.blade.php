@extends('layouts.customer')
@section('title')
   {{$category->name}}
@endsection

@section('content')
<div class="py-5">

</div>

<div class="py-3 mb-3 mt-2 shadow-sm backgroundofroutes border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('category')}}">Collections</a>/
            <a >{{$category->name}}</a>
        </h6>
    </div>
  </div>
    <div class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$category->name}}</h2>
                </div>
                <div class="row">
                    @foreach ($product as $prod )
                        <div class="col-md-3 mb-3">
                            <a class="link-dark" href="{{url(asset('view-category/'.$category->slug.'/'.$prod->slug))}}">
                                <div class="card">
                                    <img src={{asset('upload/product/'.$prod->image)}} alt="no-image">
                                    <div class="card-body">
                                        <h5>{{$prod->name}}</h5>
                                        <span class="float-start">RS {{ $prod->selling_price }}</span>
                                        <span class="float-end">RS<s>{{ $prod->selling_price }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection