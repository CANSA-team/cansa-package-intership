@extends('package-acl::admin.layouts.base-2cols')


@section('content')
<H1>DIARIES</H1>
    <ul class="list-group">
    @foreach($diaries as $diary)
        <li class="list-group-item">
            <div class="row">
                <div class="col"><a href="{{ route('week', ['id' => 1]) }}"><span>ABC</span></a></div>
                <div class="col"><span>user name</span></div>
                <div class="col"><span>ABC</span></div>
                <div class="col">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Comments
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="./comment.html">Comment_1</a>
                            <a class="dropdown-item" href="./comment.html">Comment_2</a>
                            <a class="dropdown-item" href="./comment.html">Comment_3</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <a href=""><span><i class="fas fa-trash-alt"></i></span></a>
                    <a href=""><span><i class="fas fa-pen"></i></span></a>
                </div>
            </div>
        </li>
    @endforeach

    </ul>
@stop

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />