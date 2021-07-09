@extends('package-intership::auth.dashboard')
@section('title','Diaries')
@section('content-dashboard')
<div class="container-fluid">
         <nav class="navbar navbar-light navbar-expand-md">
            <div class="navbar-brand" href="#">Diaries</div>
            <form action="{{ route('diary.search') }}" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="key" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            @if (isset($_GET['key']))
                <a class="btn btn-outline-primary mr-sm-2 dd" href="{{ route('diaries') }}">Show All</a>
            @endif
           
        </nav>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    @if(count($diaries) != 0)
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Diary Name</th>
                                <th>User Name</th>
                                <th>Weeks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diaries as $diary)
                                @if ($diary->status == 0)
                                    @continue
                                @endif
                                <tr>
                                    <td><a
                                            href="{{ route('weeks', ['diary_id' => $diary->diary_id]) }}"><span>{{ $diary->diary_name }}</span></a>
                                    </td>
                                    <td>{{ $diary->user->user_name }}</td>
                                    <td class="dropdown no-arrow mx-1">
                                        <div class="dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                aria-expanded="false" data-toggle="dropdown" href="#">Weeks</a>
                                            <div class="ovrl dropdown-menu">
                                                <h6 class="dropdown-header">Weeks</h6>
                                                @foreach ($diary->weeks as $diaries_contents)
                                                    @if ($diaries_contents->status == 0)
                                                        @continue
                                                    @endif
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('diary-content', ['content_id' => $diaries_contents->week_id]) }}">
                                                        <div class="font-weight-bold">
                                                            <div class="text-truncate">
                                                                <span>{{ $diaries_contents->week_weekdays }}</span>
                                                            </div>
                                                            <p class="small text-gray-500 mb-0">{{ date('Y-m-d', strtotime($diaries_contents->start_date))}}</p>
                                                            <p class="small text-gray-500 mb-0">{{ date('Y-m-d', strtotime($diaries_contents->end_date))}}</p>
                                                        </div>
                                                    </a>
                                                @endforeach
                                                <a class="dropdown-item text-center small text-gray-500"
                                                    href="{{ route('weeks', ['diary_id' => $diary->diary_id]) }}">Show All
                                                    Weeks</a>
                                            </div>
                                        </div>
                                        <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                            aria-labelledby="alertsDropdown"></div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <h1 style="margin:0 auto;width:120px;">NONE</h1>
                    @endif 
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                        </p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            {{ $diaries->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
