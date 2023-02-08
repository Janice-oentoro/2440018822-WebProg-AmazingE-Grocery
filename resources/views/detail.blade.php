@include('layouts.app')
@extends('layouts.footer')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="center1">
 <div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{Storage::url($product->image)}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <div class="text1">
            <p class="card-title">{{$product->name}}<p>
        </div>
        <div class="text2">
            <p class="card-text">{{$product->description}}</p>
        </div>
        <div class="text3">
            <p class="card-text">Rp. {{$product->price}}</p>
        </div>
    
        <form action="/cartadd" method="POST" enctype="multipart/form-data">
        @csrf
          <input type="hidden" class="user_id" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
          <input type="hidden" class="product_id" name="product_id" id="product_id" value="{{ $product->id }}">
          <input type="hidden" class="product_price" name="product_price" id="product_price" value="{{ $product->price }}">
            <button class="btn btn-success mt-auto d-flex">Purchase</button>    
     
        </form>
        
      </div>
    </div>
  </div>
</div>   
</div>


</body>
</html>