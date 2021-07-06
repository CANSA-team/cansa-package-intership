@extends('package-intership::auth.dashboard')
@section('title','Profile')
@section('content-dashboard')
    <style>
        .zzz{
            font-size: 90px;
        }
        .as{
            padding: 90px;
        }
    </style>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Profile</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow as">
                        <i class="far fa-user-circle zzz"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">User Profile</p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="username"><strong>Full Name</strong></label>
                                                <div class="form-control" type="text" id="username" name="username">
                                                    {{Auth::user()->user_name}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="email"><strong>User Type</strong></label>
                                                <div class="form-control" type="email" id="email" name="email">
                                                    {{Auth::user()->userType->usertype_name}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="first_name"><strong>User Email</strong></label>
                                                <div class="form-control" type="text" id="first_name" name="first_name">
                                                    {{Auth::user()->user_email}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
