<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | Arafat-portfolio</title>
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/app.css')}}">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <h3>Sign In</h3>
                                <p>Please sign in to continue.</p>
                            </div>
                            @if (Session::has('msg'))
                            <p class="text-danger">{{ session('msg') }}</p>
                            @endif
                            <form action="{{ route('login_submit') }}" method="POST">
                                @csrf
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Email</label>
                                    <div class="position-relative">
                                        <input type="email" class="form-control" name="email" id="username" placeholder="Enter Email">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope" style="font-size: 20px" ></i>
                                        </div>
                                    </div>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                        <a href="#" class='float-end'>
                                            <small>Forgot password?</small>
                                        </a>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                        <div class="form-control-icon">
                                            <i class="bi bi-key" style="font-size: 22px" ></i>
                                        </div>
                                    </div>
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="checkbox float-start">
                                        <input type="checkbox" id="checkbox1" class='form-check-input'>
                                        <label for="checkbox1">Remember me</label>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
