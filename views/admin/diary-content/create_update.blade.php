@extends('package-intership::auth.dashboard')
@if (isset($content))
    @section('title', 'Content-Update')
@else
    @section('title', 'Content-Create')
@endif

@section('content-dashboard')

<div class="container-fluid">
    <nav class="navbar navbar-light navbar-expand-md">
        @if (isset($content))
        <div class="navbar-brand" href="#">Update Diary Content</div>
        @else
        <div class="navbar-brand" href="#">Add Diary Content</div>
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
            @if (isset($content))
                 <form method="post" action="{{ route('diary-content.update', ['content_id' => $_GET['content_id']]) }}">
                <input hidden name="diarycontent_id" value="{{ $content->diarycontent_id }}"></input>
                    <div class="form-group"><label for="username">
                            <strong>Diary Content Weekday</strong>
                        </label>
                        <input class="form-control" value="{{ $content->diarycontent_weekday }}" type="text" id="username" name="diarycontent_weekday"></input>
                    </div>
                    <div class="form-group"><label for="username">
                            <strong>Diary Content Work</strong>
                        </label>
                        <textarea class="form-control" id="signature" rows="4" name="diarycontent_work">{{ $content->diarycontent_work }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="username">
                            <strong>Diary Content Note</strong>
                        </label>
                        <textarea class="form-control" id="signature" rows="4" name="diarycontent_note">{{ $content->diarycontent_note }}</textarea>
                    </div>
                    <div class="form-group"><label for="username">
                            <strong>Diary Content Content</strong></label>
                        <textarea class="form-control" id="signature" rows="4" name="diarycontent_content">{{ $content->diarycontent_content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm ml-auto" type="button">Submit</button>
                </form>
                @else
                <form method="post" action="{{ route('diary-content.store', ['content_id' => $_GET['content_id']]) }}">

                    <div class="form-group"><label for="username">
                            <strong>Diary Content Weekday</strong>
                        </label>
                        <input class="form-control" type="text" id="username" name="diarycontent_weekday">
                    </div>
                    <div class="form-group"><label for="username">
                            <strong>Diary Content Work</strong>
                        </label>
                        <textarea class="form-control" id="signature" rows="4" name="diarycontent_work"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="username">
                            <strong>Diary Content Note</strong>
                        </label>
                        <textarea class="form-control" id="signature" rows="4" name="diarycontent_note"></textarea>
                    </div>
                    <div class="form-group"><label for="username"><strong>Diary Content Content</strong></label><textarea class="form-control" id="signature" rows="4" name="diarycontent_content"></textarea></div>
                    <button type="submit" class="btn btn-primary btn-sm ml-auto" type="button">Submit</button>
                </form>
                @endif
        </div>
    </div>
</div>
@endsection