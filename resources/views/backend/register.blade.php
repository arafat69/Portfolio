@php
    $page='user';
@endphp
@extends('backend.master.master')

@section('content')
<div class="row">
    <div class="col-md-7 col-sm-12 mx-auto">
        <div class="card pt-4">
            <div class="card-body">
                <div class="text-center mb-4">
                    {{ session('username') }}
                    <h3>Sign Up</h3>
                    <p>Please fill the form to register.</p>
                </div>
                <form action="{{ route('signup_submit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username-column">Username</label>
                                <input type="text" id="username-column" class="form-control"
                                    name="name" placeholder="Full Name">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="country-floating">Email</label>
                                <input type="email" id="country-floating" class="form-control"
                                    name="email" placeholder="Email">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="company-column">Password</label>
                                <input type="text" id="company-column" class="form-control"
                                    name="password" placeholder="Password">
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                    </diV>

                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
