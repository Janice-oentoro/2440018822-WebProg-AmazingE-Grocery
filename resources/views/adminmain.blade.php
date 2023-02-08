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

<table class="table">
  <thead>
    <tr>
      <th scope="col">Account</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $u)
  <?php 
  if($u->role == '2') {
    $rolename = "Admin";
  } else {$rolename = "User";}
  ?>
    <tr>
      <td>{{$u->firstname}} {{$u->lastname}} - {{$rolename}}</td>
      <td scope="row">
      <a href="/update/{{$u->id}}" class="btn btn-primary">Update Role</a>
      <form action="/destroy/{{$u->id}}" method="POST">
        @csrf
        @method('delete')
    <button class="btn btn-danger">Remove</button> 
    </form>
      </td>
    </tr>
  @endforeach  
  </tbody>
</table>

</body>
</html>