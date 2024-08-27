@extends('master.main')

@section('main')
<div class="container">
    <h3>Edit Comment</h3>
    <form action="{{ route('home.comment.update', $comment->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <br>
            <br>
            <textarea name="comment" class="form-control" rows="4" placeholder="Write your comment here...">{{ $comment->comment }}</textarea>
            <div class="form-grp">
                <textarea name="comment" class="form-control" rows="4" placeholder="Write your comment here..."></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@stop
