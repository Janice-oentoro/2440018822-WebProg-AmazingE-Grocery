@include('layouts.app')
@extends('layouts.footer')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <img src="/storage/user/{{Auth::user()->image}}" class="card-img-top" height="500px" width="150px" alt="Card image cap">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    <form method="POST" action="/update/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row mb-3">
                            <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $user->firstname }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                        @php $checkedmale = ''; $checkedfemale = '';
                        @endphp
                        @if(Auth::user()->gender == 'male')
                            @php $checkedmale = 'checked';
                            @endphp
                        @else
                            @php $checkedfemale = 'checked';
                            @endphp
                        @endif
                        
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>
                       
                        <div class="col-md-3 gender">
                                <div class="form-check">
                                <input {{$checkedmale}} class="form-check-input" type="radio" name="gender" id="gender" value="male">
                                <label class="form-check-label" for="gender">
                                  Male
                                </label>
                              </div>
                              <div class="form-check">
                                <input {{$checkedfemale}} class="form-check-input" type="radio" name="gender" id="gender" value="female">
                                <label class="form-check-label" for="gender">
                                  Female
                                </label>
                              </div>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                       </div> 
                    </div>

                    @if(Auth::user()->role == 1)
                    @php $selected = 'selected';
                    @endphp
                    <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
                                <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name="is_admin">
                                    <option value="0">User</option>
                                    <option {{$selected}} value="1">Admin</option>
                                </select>
                                </div>
                    </div>
                    @endif
                        
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            
                          </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>