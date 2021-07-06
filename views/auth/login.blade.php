@extends('package-intership::layout')
@section('title','Login')
@section('content')
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Welcome Back!</h4>
                            </div>
                            <form class="user" method="post" action="{{ route('login') }}">
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                </div>

                                <div class="form-group">
                                    <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
                                    
                                </div>
                                
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                                <button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>

                            </form>
                            <div class="text-center"><a class="small" href="{{ route('register') }}">Create an Account!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection