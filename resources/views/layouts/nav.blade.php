<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="{{url('posts/', $parameters = [], $secure = null)}}">Home</a>
            <a class="nav-link" href="{{url('posts/create', $parameters = [], $secure = null)}}">Add New Post</a>
            <a class="nav-link" href="#">All Posts</a>
            <a class="nav-link" href="#">New hires</a>
            {{--Checks if the user is signed in--}}
            @if( Auth::check() )
            <a class="nav-link ml-auto" href="{{url( '/posts' )}}">{{Auth::user()->name}}</a>
            <a class="nav-link" href="{{url( '/logout' )}}">Logout</a>
            @else
                <a class="nav-link ml-auto" href="{{url( '/register' )}}">Register</a>
                <a class="nav-link ml-auto" href="{{url( '/login' )}}">Sign In</a>
            @endif
        </nav>
    </div>
</div>