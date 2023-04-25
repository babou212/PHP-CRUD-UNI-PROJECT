@extends('posts.layout')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-blue-800" style="background-color: #cdb4db;">
        <div class="container-fluid">
            <h1 style="color: #ffffff">Top Images</h1>
            @if (Route::has('login'))
                <div>
                    <a href="{{ route('login') }}" type="button" class="btn btn-primary">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" type="button" class="btn btn-primary">Register</a>
                    @endif
                    @endauth
                </div>
        </div>
        <a type="button" class="btn btn-success" href="{{ route('posts.create') }}">Create New Post</a>
    </nav>

    <div style="margin-top: 7rem;">
        <div class="col">
            <h3 class="text-center" style="color: #ffffff">Featured Posts</h3>
        </div>

        <div class="col-md-12">
            <div class="row grid d-flex justify-content-center">
                @foreach($posts as $post)
                    <div class="card col-xs-12 col-md-6 col-lg-3 p-2 mt-3 mr-3" style="background-color: #cdb4db">
                        <img class="card-img-top" style="width: 100%; height: 15vh; object-fit: contain"
                             src="{{ asset($post->image_uri) }}" alt="post-image">
                        <div class="card-body">
                            <h5 class="text-center card-title" style="font-size: 1rem;
                                color: #ffffff">{{ $post->title }}</h5>

                            <p class="text-center card-text" style="font-size: 1rem;
                                color: #ffffff">{{ $post->body }}</p>

                            <p class="text-center card-text" style="font-size: 1rem;
                                color: #ffffff">Price £{{ $post->cost }}</p>

                            <form class="justify-center text-center" action="" method="POST">

                                <a class="btn btn-info text-center" href="{{ route('posts.guestShow',$post->id) }}">Show</a>
                                @csrf
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
