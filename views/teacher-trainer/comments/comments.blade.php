@extends('package-intership::auth.dashboard')
    @section('title', 'Comment')
    @section('content-dashboard')
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
            @if (isset($_GET['key']))
                <a class="btn btn-outline-primary mr-sm-2 dd" href="{{ route('comment',['content_id'=>$_GET['content_id']]) }}">Show All</a>
            @endif
            <a href="{{ route('comment.create', ['content_id' => $_GET['content_id']]) }}"
                class="btn btn-primary btn-sm ml-auto" type="button">Add Comment</a>
        </nav>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                @if(count($comments) != 0)  
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Comment Content</th>
                                <th>Rating</th>
                                <th>Operations</th>
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
                                    @if (Auth::user()->user_id == $comment->user_id)
                                        <td>
                                            <a class="px-2"
                                                href="{{ route('comment.edit', ['content_id' => $_GET['content_id'], 'id' => $comment->comment_id]) }}"><span
                                                    class="fas fa-pencil-alt"></span></a>
                                            <a class="px-2"
                                                href="{{ route('comment.delete', ['content_id' => $_GET['content_id'], 'comment_id' => $comment->comment_id]) }}"><span
                                                    class="fas fa-trash-alt"></span></a>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>User Name</strong></td>
                                <td><strong>Comment Content</strong></td>
                                <td><strong>Rating</strong></td>
                                <td><strong>Operations</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    @else
                        <h1 style="margin:0 auto;width:120px;">NONE</h1>
                    @endif
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
