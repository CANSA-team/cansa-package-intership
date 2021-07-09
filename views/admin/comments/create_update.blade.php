@extends('package-intership::auth.dashboard')
@if (isset($comment))
    @section('title', 'Comment-Update')
    @else
    @section('title', 'Comment-Create')
    @endif
    @section('content-dashboard')

        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-md">
                @if (isset($comment))
                    <div class="navbar-brand" href="#">Update Comment</div>
                @else
                    <div class="navbar-brand" href="#">Add Comment</div>
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

                    @if (isset($comment))
                        <form method="post" action="{{ route('comment.update', ['content_id' => $_GET['content_id']]) }}">
                            <input hidden name="id" value="{{ $comment->comment_id }}">
                            <div class="form-group"><label for="username"><strong>Comment
                                        Content</strong></label><textarea class="form-control" id="signature" rows="4"
                                    name="comment_content">{{ $comment->comment_content }}</textarea>
                            </div>
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $comment->comment_rating) <i class="fa
                                        fa-star gold" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-star-o gold" aria-hidden="true"></i> @endif
                                @endfor
                            </div>
                            <input type="hidden" name="comment_rating" id="rating" value="{{ $comment->comment_rating }}">
                            <button type="submit" class="btn btn-primary btn-sm ml-auto" type="button">Submit</a>
                        </form>
                    @else
                        <form method="post" action="{{ route('comment.store', ['content_id' => $_GET['content_id']]) }}">
                            <div class="form-group"><label for="username"><strong>Comment
                                        Content</strong></label><textarea class="form-control" id="signature" rows="4"
                                    name="comment_content"></textarea></div>
                            <div class="rating">
                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                <i class="fa fa-star gold" aria-hidden="true"></i>
                            </div>
                            <input type="hidden" name="comment_rating" id="rating" value="5">

                            <button type="submit" class="btn btn-primary btn-sm ml-auto" type="button">Submit</a>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <script>
            const ratings = document.querySelectorAll(".gold");
            ratings.forEach((element, index) => {
                element.addEventListener('click', () => {
                    ratings.forEach((item, i) => {
                        if (i <= index) {
                            item.setAttribute("class", "fa fa-star gold");
                        } else {
                            item.setAttribute("class", "fa fa-star");
                        }
                    });
                    document.getElementById("rating").value = document.querySelectorAll(".fa.fa-star.gold")
                        .length;
                });
            });
        </script>
    @endsection
