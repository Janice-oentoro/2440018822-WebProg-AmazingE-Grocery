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
 @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="veggies">
<div class="row row-cols-4 row-cols-md-5 g-4">
@foreach($products as $p)
<div class="col">  
    <div class="card" style="width: 100%; height: 100%;">
      <img src="{{Storage::url($p->image)}}" class="card-img-top" height="150px" width="150px" alt="Card image cap">
      <div class="card-body d-flex flex-column">
      <h5 class="card-title">{{$p->name}}</h5>
        <a href="{{route('detail', $p->id)}}" class="btn btn-primary mt-auto">Detail</a>
      </div>
    </div>
  </div>
@endforeach
</div>
</div>

        <div class="pagination">
                {{ $products->links() }}
        </div>
</body>
</html>

