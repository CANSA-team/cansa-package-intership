@extends('package-intership::auth.dashboard')
    @section('title', 'Comment')
    @section('content-dashboard')
    <style>
        .text-content {
            max-width: 200px;
            min-width: 190px;
        }

    </style>
    <div class="container-fluid">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">{{ $content->diarycontent_weekday }}</p>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label for="username"><strong>Diary Content Work</strong></label>
                                <div class="form-control" type="text" id="username" name="username">
                                    {{ $content->diarycontent_work }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label for="email"><strong>Diary Content Note</strong></label>
                                <div class="form-control" type="email" id="email" name="email">
                                    {{ $content->diarycontent_note }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label for="first_name"><strong>Diary Content Content</strong></label>
                                <div class="form-control" type="text" id="first_name" name="first_name">
                                    {{ $content->diarycontent_content }}</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <nav class="navbar navbar-light navbar-expand-md">
            <div class="navbar-brand" href="#">Comments</div>
            <!-----------------SEARCH ---------------------->
            <form action="{{ route('comment.search') }}" method="GET" class="form-inline my-2 my-lg-0">
                <input hidden name="content_id" value="{{ $_GET['content_id'] }}">
                <input class="form-control mr-sm-2" name="key" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Comment Content</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                @if ($comment->status == 0)
                                    @continue
                                @endif
                                <tr>
                                    <td><span>{{ $comment->user->user_name }}</span></td>
                                    <td>{{ $comment->comment_content }}</td>
                                    <td>
                                        <div class="rating">
                                            <div class="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $comment->comment_rating) <i class="fa fa-star gold"
                                                        aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-star-o gold"
                                                        aria-hidden="true"></i> @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>User Name</strong></td>
                                <td><strong>Comment Content</strong></td>
                                <td><strong>Rating</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            {{ $comments->appends(['content_id'=>$_GET['content_id']])->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
