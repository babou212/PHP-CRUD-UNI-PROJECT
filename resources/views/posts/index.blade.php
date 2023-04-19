@extends('posts.layout')
@section('content')
        <div class="" style="width: 100vh;">
            <h2>Top Images</h2>
        </div>
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
        </div>
                    @endif

        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('posts.create') }}">Create New Post</a>
                    </div>
                </div>
            </div>
        </div>

            <div>
                <h3>Featured Posts</h3>
            <div class="col-md-12">
                <div class="row grid">
                    @foreach($posts as $post)
                    <div class="card col-xs-12 col-md-6 col-lg-3 p-2 mt-3 mr-3">
                        <img class="card-img-top" style="width: 100%; height: 15vh; object-fit: contain"
                             src="{{ asset($post->image_uri) }}" alt="post-image">
                        <div class="card-body">
                            <h5 class="text-center card-title" style="font-size: 1rem;">{{ $post->title }}</h5>
                            <p class="text-center card-text" style="font-size: 1rem;">{{ $post->body }}</p>
                            <p class="text-center card-text" style="font-size: 1rem;">${{ $post->cost }}</p>

                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
