@extends('package-intership::auth.dashboard')
@section('title','Weeks')
@section('content-dashboard')
<style>
    .ovrl{
            max-height: 30vh;
            overflow-y: auto;
        }
    .table{
        min-height: 80vh;
    }
    .small {
            width: 100%;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
    }
    .dropdown-menu .show {
        height: 100%;
    }

    .font-weight-bold {
        width: 100%;
    }
</style>
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-md">
            <div class="navbar-brand" href="#">Weeks</div>
            <!-----------------SEARCH ---------------------->
            <form action="{{ route('week.search') }}" method="GET" class="form-inline my-2 my-lg-0">
                <input hidden name="diary_id" value="{{ $_GET['diary_id'] }}"></input>
                <input class="form-control mr-sm-2" name="key" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            <a href="{{ route('weeks.create', ['diary_id' => $_GET['diary_id']]) }}"
                class="btn btn-primary btn-sm ml-auto" type="button">Add Week</a>
        </nav>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    @if(count($weeks))
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Week Weekday</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Diary Contents</th>
                                <th>Status Check</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($weeks as $week)
                                @if ($week->status == 0)
                                    @continue
                                @endif
                                <tr>
                                    <td><a
                                            href="{{ route('diary-content', ['content_id' => $week->week_id]) }}"><span>{{ $week->week_weekdays }}</span></a>
                                    </td>
                                    <td>{{ date('Y-m-d', strtotime($week->start_date)) }}</td>
                                    <td>{{ date('Y-m-d', strtotime($week->end_date)) }}</td>
                                    <td class="dropdown no-arrow mx-1">
                                        <div class=" dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                aria-expanded="false" data-toggle="dropdown" href="#">Diary Contents</a>
                                            <div class="ovrl dropdown-menu">
                                                <h6 class="dropdown-header">Diary Contents</h6>
                                                @foreach ($week->diaryContents as $diaries_contents)
                                                    @if ($diaries_contents->status == 0)
                                                        @continue
                                                    @endif
                                                    <a class="dropdown-item d-flex align-items-center"
                                            href="{{ route('comment', ['content_id' => $diaries_contents->diarycontent_id]) }}">
                                                        <div class="font-weight-bold">
                                                            <div class="text-truncate">
                                                                <span>{{ $diaries_contents->diarycontent_weekday }}</span>
                                                            </div>
                                                            <p class="small text-gray-500 mb-0"><strong>Work:
                                                                </strong>{{ $diaries_contents->diarycontent_work }}</p>
                                                            <p class="small text-gray-500 mb-0"><strong>Contents:
                                                                </strong>{{ $diaries_contents->diarycontent_content }}</p>
                                                            <p class="small text-gray-500 mb-0"><strong>Note:
                                                                </strong>{{ $diaries_contents->diarycontent_note }}</p>
                                                        </div>
                                                    </a>
                                                @endforeach
                                                <a class="dropdown-item text-center small text-gray-500"
                                                    href="{{ route('diary-content', ['content_id' => $week->week_id]) }}">Show
                                                    All Diary Contents</a>
                                            </div>
                                        </div>
                                        <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                            aria-labelledby="alertsDropdown"></div>
                                    </td>
                                    @if ($week->status_check === 1)
                                        <td>
                                            <div>Pass</div>
                                        </td>
                                    @else
                                        <td>
                                            <div>Dissatisfy</div>
                                        </td>
                                    @endif
                                    <td>
                                        <a class="px-2"
                                            href="{{ route('week.edit', ['diary_id' => $weeks->first()->diary_id, 'id' => $week->week_id]) }}"><span
                                                class="fas fa-pencil-alt"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>Week Weekday</strong></td>
                                <td><strong>Start Date</strong></td>
                                <td><strong>End Date</strong></td>
                                <td><strong>Diary Contents</strong></td>
                                <td><strong>Status Check</strong></td>
                                <td><strong>Operations</strong></td>
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
                            {{ $weeks->appends(['diary_id'=>$_GET['diary_id']])->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
