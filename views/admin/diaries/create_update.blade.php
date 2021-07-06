@extends('package-intership::auth.dashboard')
@if (isset($diary))
    @section('title', 'Diary-Update')
@else
    @section('title', 'Diary-Create')
@endif
@section('content-dashboard')

    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-md">
            @if (isset($diary))
                <div class="navbar-brand">Update Diaries</div>
            @else
                <div class="navbar-brand">Add Diaries</div>
            @endif
        </nav>
        <div class="card shadow">
            <div class="card-body">
                @if (isset($diary))
                    <form method="post" action="{{ route('diary.update') }}">
                        <input hidden name="diary_id" value="{{$diary->diary_id}}">
                    @else
                        <form method="post" action="{{ route('diary.store') }}">
                @endif
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="username"><strong>Diary Name</strong></label>

                            @if (isset($diary))
                                <input class="form-control" type="text" value="{{ $diary->diary_name }}"
                                    name="diary_name"></input>
                            @else
                                <input class="form-control" type="text" name="diary_name"></input>
                            @endif
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-sm ml-auto" type="button">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
