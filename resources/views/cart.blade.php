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

<?php $total = 0; ?>

<div class="cart1">
    <div class="row row-cols-4 row-cols-md-5 g-4">
@foreach($cartitems as $item)
<div class="col">  
    <div class="card" style="width: 100%; height: 100%;">
      <img src="{{Storage::url($item->products->image)}}" class="card-img-top" height="150px" width="150px" alt="Card image cap">
      <div class="card-body d-flex flex-column">
      <h5 class="card-title">{{$item->products->name}}</h5>

    <?php $total += $item->product_price; ?>
      
    <form action="/destroy1/{{$item->id}}" method="POST">
        @csrf
        @method('delete')
    <button class="btn btn-danger">Remove</button> 
    </form>

      </div>
    </div>
  </div>
  @endforeach 
  <br>
  </div>
  <p class="card-text cardtotal">Total Price: Rp. {{ $total }}</p>
    <form action="/transaction" method="POST" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-success">Checkout</button> 
    </form>
</div>

</body>
</html>