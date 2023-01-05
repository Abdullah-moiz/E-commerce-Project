@extends('layouts.admin')


@section('content')
<div class="card">
    <div class="card-header">
      <h4>Update Categories</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{url('update-category/'.$category->id)}}" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control border border-dark p-2" value="{{ $category->name }}" name="name">
                </div>    
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control border border-dark p-2" value="{{ $category->slug }}" name="slug">
                </div> 
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description"  rows="3" class="form-control p-2 border border-dark" >{{ $category->description }} </textarea>   
                </div>    
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox"  class="border border-dark p-2" name="status" {{ $category->status == "1" ? "checked" : "" }}>
                </div>    
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox"  class="border border-dark p-2" name="popular" {{ $category->popular == "1" ? "checked" : ""}}>
                </div>    
                <div class="col-md-6 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control border border-dark p-2" name="meta_title" value="{{ $category->meta_title }}">
                </div>    
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea name="meta_keyword"  rows="3" class="form-control border border-dark p-2"> {{ $category->meta_keyword }}</textarea> 
                </div>    
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description"  rows="3" class="form-control border border-dark p-2"> {{ $category->description }}</textarea> 
                </div>    
                @if ($category->image)
                    <img src="{{asset('upload/category/'.$category->image)}}" class="w-25 h-25" alt="no image">
                @endif
                <div class="col-md-12 mb-3">
                   <input type="file" name="image"  class="form-control border border-dark p-2" value="{{ $category->image }}">
                </div>    
                <div class="col-md-12 mb-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>    
            </div>    
        </form>
    </div>
  </div>
@endsection