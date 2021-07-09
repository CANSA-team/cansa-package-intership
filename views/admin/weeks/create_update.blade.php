@extends('package-intership::auth.dashboard')

@if (isset($week))
    @section('title', 'Weeks-Update')
@else
    @section('title', 'Weeks-Create')
@endif

@section('content-dashboard')
      
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-md">
                @if (isset($week))
                    <div class="navbar-brand">Update Week</div>
                @else
                    <div class="navbar-brand">Add Week</div>
                @endif
            </nav>
            <div class="card shadow">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-body">

                    @if (isset($week))
                        <form method="post" action="{{ route('week.update', ['diary_id' => $_GET['diary_id']]) }}">
                            <input hidden name="week_id" value="{{ $week->week_id }}">
                        @else
                            <form method="post" action="{{ route('week.store', ['diary_id' => $_GET['diary_id']]) }}">
                    @endif
                    @if (isset($week))
                        <div class="form-group"><label for="username"><strong>Week Weekday</strong></label><input
                                class="form-control" type="text" id="week_weekdays" value="{{ $week->week_weekdays }}"
                                name="week_weekdays"></div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="email"><strong>Start Date</strong></label>
                                    <div><input type="date" name="start_date"
                                            value="{{ date('Y-m-d', strtotime($week->start_date)) }}" /></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="email"><strong>End Date</strong></label>
                                    <div><input type="date" name="end_date"
                                            value="{{ date('Y-m-d', strtotime($week->end_date)) }}" /></div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="form-group"><label for="username"><strong>Week Weekday</strong></label><input
                                class="form-control" type="text" id="week_weekdays" name="week_weekdays"></div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="email"><strong>Start Date</strong></label>
                                    <div><input type="date" name="start_date" value="{{ date('Y-m-d', time()) }}"/></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="email"><strong>End Date</strong></label>
                                    <div><input type="date" name="end_date" value="{{ date('Y-m-d', time()) }}"/></div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($errors->has('status'))
                        <div class="text-danger">{{ $errors->first('status') }}</div>
                    @endif
                    <button type="submit" class="btn btn-primary btn-sm ml-auto" type="button">Submit</a>
                        </form>
                </div>
            </div>
        </div>
    @endsection
