@extends('package-intership::auth.dashboard')
@section('title', 'Contents')
@section('content-dashboard')
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-md">
            <div class="navbar-brand" href="#">Diaries Contents</div>
            <!-----------------SEARCH ---------------------->
            <form action="{{ route('diary-content.search') }}" method="GET" class="form-inline my-2 my-lg-0">
                <input hidden name="content_id" value="{{ $_GET['content_id'] }}">
                <input class="form-control mr-sm-2" name="key" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            @if (isset($_GET['key']))
             <a class="btn btn-outline-primary mr-sm-2 dd" href="{{ route('weeks',['diary_id'=>$_GET['diary_id']]) }}">Show All</a>
            @endif
        </nav>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    @if(count($contents) != 0)
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Diary Content Weekday</th>
                                <th>Diary Content Work</th>
                                <th>Diary Content Note</th>
                                <th>Diary Content Content</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                                @if ($content->status == 0)
                                    @continue
                                @endif
                                <tr>
                                    <td><a
                                            href="{{ route('comment', ['content_id' => $content->diarycontent_id]) }}"><span>{{ $content->diarycontent_weekday }}</span></a>
                                    </td>
                                    <td class="text-content">{{ $content->diarycontent_work }}</td>
                                    <td class="text-content">{{ $content->diarycontent_note }}</td>
                                    <td class="text-content">{{ $content->diarycontent_content }}</td>
                                    <td class=" dropdown no-arrow mx-1">
                                        <div class="dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                aria-expanded="false" data-toggle="dropdown" href="#">Diary Contents</a>
                                            <div class="ovrl dropdown-menu">
                                                <h6 class="dropdown-header">Comments</h6>
                                                @foreach ($content->comments as $comment)
                                                    @if ($comment->status == 0)
                                                        @continue
                                                    @endif
                                                    <div class="orvl dropdown-item d-flex align-items-center">
                                                        <div class="font-weight-bold">
                                                            <div class="text-truncate">
                                                                <span>{{ $comment->user->user_name }}</span></div>

                                                            <p class="small text-gray-500 mb-0">
                                                                <strong>Contents:</strong>{{ $comment->comment_content }}
                                                            </p>
                                                            <div class="small text-gray-500 mb-0"><strong>Rating:</strong>
                                                                <div class="rating">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= $comment->
                                                                            comment_rating) <i class="fa
                                                                            fa-star gold"
                                                                            aria-hidden="true"></i>
                                                                        @else
                                                                            <i class="fa fa-star-o gold"
                                                                            aria-hidden="true"></i> @endif
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <a class="dropdown-item text-center small text-gray-500"
                                                    href="{{ route('comment', ['content_id' => $content->diarycontent_id]) }}">Show
                                                    All Comments</a>
                                            </div>
                                        </div>
                                        <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                            aria-labelledby="alertsDropdown"></div>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>Diary Content Weekday</strong></td>
                                <td><strong>Diary Content Work</strong></td>
                                <td><strong>Diary Content Note</strong></td>
                                <td><strong>Diary Content Content</strong></td>
                                <td><strong>Comments</strong></td>

                            </tr>
                        </tfoot>
                    </table>
                    @else
                        <h1 style="margin:0 auto;width:120px;">NONE</h1>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            {{ $contents->appends(['content_id'=>$_GET['content_id']])->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
