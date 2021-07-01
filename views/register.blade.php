@extends('package-intership::layout')

@section('content')

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="container">
                    <div class="text-center">
                        <h4 class="text-dark mb-4">Create an Account!</h4>
                    </div>
                    <form class="user">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text"
                                    id="exampleFirstName" placeholder="First Name" name="first_name"></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="text"
                                    id="exampleFirstName" placeholder="Last Name" name="last_name"></div>
                        </div>
                        <div class="form-group"><input class="form-control form-control-user" type="email"
                                id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address"
                                name="email"></div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user"
                                    type="password" id="examplePasswordInput" placeholder="Password" name="password">
                            </div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="password"
                                    id="exampleRepeatPasswordInput" placeholder="Repeat Password"
                                    name="password_repeat"></div>
                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit">Register
                            Account</button>

                    </form>
                    <div class="text-center"><a class="small" href="login.html">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection