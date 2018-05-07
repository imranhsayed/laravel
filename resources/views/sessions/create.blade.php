@extends( 'layouts.master' )

@section( 'content' )

    <h2>Sign In</h2>
    <form action="{{url( '/login' )}}" method="post">
        {{csrf_field()}}

        <div class="form-group">
            <label for="email">Email Address: </label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="login">Login</button>
        </div>

    </form>
    @endsection