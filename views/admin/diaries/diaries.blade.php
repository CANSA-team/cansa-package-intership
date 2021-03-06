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
        <a href="{{ route('diary.create') }}" class="btn btn-primary btn-sm ml-auto" type="button">Add Diary</a>
       
    </nav>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Diary Name</th>
                            <th>User Name</th>
                            <th>Weeks</th>
                            <th>Status</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diaries as $diary)
                        <tr>
                            <td><a href="{{ route('weeks',['diary_id'=>$diary->diary_id]) }}"><span>{{$diary->diary_name}}</span></a></td>
                            <td>{{$diary->user->user_name}}</td>
                            <td class="dropdown no-arrow mx-1">
                                <div class="dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-toggle="dropdown" href="#">Weeks</a>
                                    <div class="ovrl dropdown-menu">
                                        <h6 class="dropdown-header">Weeks</h6>
                                        @foreach ($diary->weeks as $diaries_contents)
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('diary-content',['content_id'=>$diaries_contents->week_id]) }}">
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>{{$diaries_contents->week_weekdays}}</span>
                                                </div>
                                                <p class="small text-gray-500 mb-0">{{ date('Y-m-d', strtotime($diaries_contents->start_date))}}</p>
                                                <p class="small text-gray-500 mb-0">{{ date('Y-m-d', strtotime($diaries_contents->end_date))}}</p>
                                            </div>
                                        </a>
                                        @endforeach
                                        <a class="dropdown-item text-center small text-gray-500"
                                            href="{{ route('weeks',['diary_id'=>$diary->diary_id]) }}">Show All Weeks</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                    aria-labelledby="alertsDropdown"></div>
                            </td>
                            @if ($diary->status === 1)
                            <td><input onclick="changeStatus({{$diary->diary_id}}, this);" type="checkbox" checked /></td>
                            @else 
                            <td><input onclick="changeStatus({{$diary->diary_id}}, this);" type="checkbox" /></td>
                            @endif
                            <td>
                                <a class="px-2" href="{{ route('diary.edit',['id'=>$diary->diary_id]) }}"><span class="fas fa-pencil-alt"></span></a>
                                <a onclick="return confirm('B???n ch???c ch???n x??a');" class="px-2" href="{{ route('diary.delete',['diary_id'=>$diary->diary_id]) }}"><span class="fas fa-trash-alt"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                    </p>
                </div>
                <div class="col-md-6">
                    <nav
                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        {{ $diaries->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function changeStatus(id, div) {
        var status = 0;
        if (div.checked) {
            status = 1;
        }
        $.ajax({
            url: "{{ route('diary.status') }}", // ???????ng d???n khi g???i d??? li???u ??i 'search' l?? t??n route m??nh ?????t b???n m??? route l??n xem l?? hi???u n?? l?? c??i j.
            method: "POST", // ph????ng th???c g???i d??? li???u.
            data: { diary_id:id,status:status },
            success: function (data) { //d??? li???u nh???n v???
               console.log(data);
            }
        });
    }
</script>
@endsection
