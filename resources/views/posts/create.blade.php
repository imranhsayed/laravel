@extends( 'layouts.master' )

@section( 'content' )
    <form method="post" action="/posts">
        {{--Returns a hidden input--}}
        {{csrf_field()}}
        <fieldset>
            <legend>Publish a Post</legend>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="title" name="title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publish</button>
        </fieldset>
    </form>
    @include( 'layouts.errors' )
@endsection