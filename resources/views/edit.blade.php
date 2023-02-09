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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$user->firstname}} {{$user->lastname}}</div>

                <div class="card-body">
                    <form method="POST" action="/update/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    <div class="row mb-3">
                    <?php
                            use App\Models\Role;
                            $roles = Role::all();
                        ?>
                            <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
                                <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name="is_admin">
                                     @foreach($roles as $r)
                                        <option value="{{$r->id}}">{{$r->role_name}}</option>
                                    @endforeach
                                </select>
                                </div>
                    </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>