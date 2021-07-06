@extends('package-intership::auth.dashboard')
@section('title','Weeks')
@section('content-dashboard')
 <div class="container-fluid">
    <style>
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
        .ovrl{
            max-height: 30vh;
            overflow-y: auto;
        }
        .table{
            min-height: 80vh;       
        }
    </style>
        <nav class="navbar navbar-light navbar-expand-md">
            <div class="navbar-brand" href="#">Weeks</div>
            <!-----------------SEARCH ---------------------->
            <form action="{{ route('week.search') }}" method="GET" class="form-inline my-2 my-lg-0">
                <input hidden name="diary_id" value="{{ $_GET['diary_id'] }}"></input>
                <input class="form-control mr-sm-2" name="key" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <div class="card shadow">
            <div class="card-body">
                  <td><input onclick="changeStatus({{ $week->week_id }},this);" type="checkbox" checked /></td>
                                    @else
                                        <td><input onclick="changeStatus({{ $week->week_id }},this);" type="checkbox" /></td>
                                    @endif
                                    <td class="dropdown no-arrow mx-1">
                                        <div class="dropdown no-arrow"><a class="dropdown-toggle nav-link"
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
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>Week Weekday</strong></td>
                                <td><strong>Start Date</strong></td>
                                <td><strong>End Date</strong></td>
                                <td><strong>Status Check</strong></td>
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
                            {{ $weeks->appends(['diary_id'=>$_GET['diary_id']])->links() }}
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
                url: "{{ route('week.status-check') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "POST", // phương thức gửi dữ liệu.
                data: {
                    week_id: id,
                    status_check: status
                },
                success: function(data) { //dữ liệu nhận về
                    console.log(data);
                }
            });
        }
    </script>
@endsection
