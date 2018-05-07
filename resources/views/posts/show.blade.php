@extends( 'layouts.master' )
{{--Single Post--}}
@section( 'content' )
    <div class="blog-post">
        <h2 class="blog-post-title">{{$post->title}}</h2>
        <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} <a href="#">Mark</a></p>
        <p>{{$post->body}}</p>
    </div><!-- /.blog-post -->
    {{--Display Comments--}}
    <div class="comments">
        <ul class="list-group">
        @foreach( $post->comments as $comments )
            <li class="list-group-item">
                <div class="pull-left">{{$comments->body}}</div>
                <div class="pull-right">{{$comments->created_at->diffForHumans()}}</div>
            </li>
            @endforeach
        </ul>
    </div>
    {{--Add Comments--}}
    <div class="card">
        <div class="card-block">
            <form action="{{url("/posts/$post->id/comments/", $parameters = [], $secure = null)}}" method="post">
                {{ csrf_field() }}
                <div class="form-group add-comment-div">
                    <textarea name="body" id="" cols="30" rows="10" placeholder="Write your comments here" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
    {{--Throw error--}}
    @include( 'layouts.errors' )
@endsection
