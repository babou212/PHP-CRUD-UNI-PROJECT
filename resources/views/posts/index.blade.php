@extends('posts.layout')
@section('content')
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: #ffffff;
        border-bottom: 1px solid rgb(31 41 55); box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);">
            <div class="container-fluid">
                <img src="{{ asset('/images/image-app-logo.jpg') }}" style="max-width: 50px">
                <div style="">
                    @include('partials._search')
                </div>

                @if (Route::has('login'))
                <div>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('login') }}" type="button" class="btn btn-primary">Log in</a></li>

                        @if (Route::has('register'))
                        <li style="margin-left: 1vh"><a
                                href="{{ route('register') }}" type="button" class="btn btn-primary">Register</a></li>

                        @endif
                        @endauth
                        <li style="margin-left: 1vh"><a type="button" class="btn btn-success"
                                    href="{{ route('posts.create') }}">Create Post</a></li>
                    </ul>
                </div>
        </div>
        </nav>

        <div style="margin-top: 7rem;">
            <div class="col">
                <h3 class="text-center" style="color: rgb(31 41 55)">Featured Posts</h3>
            </div>
            <div class="col-md-12">
                <div class="row grid d-flex justify-content-center">
                    @foreach($posts as $post)
                        <div class="card col-xs-12 col-md-6 col-lg-3 p-2 mt-3 mr-3" style="background-color: #ffffff;
                        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">

                            <img class="card-img-top" style="width: 100%; height: 15vh; object-fit: contain"
                                 src="{{ asset($post->image_uri) }}" alt="post-image">
                            <div class="card-body">
                                <h5 class="text-center card-title" style="font-size: 1rem;
                                color: rgb(31 41 55)">{{ $post->title }}</h5>

                                <p class="text-center card-text" style="font-size: 1rem;
                                color: rgb(31 41 55)">{{ $post->body }}</p>

                                <p class="text-center card-text" style="font-size: 1rem;
                                color: rgb(31 41 55)">Price £{{ $post->cost }}</p>

                                <p class="text-center card-text" style="font-size: 1rem;
                                color: rgb(31 41 55)">Views: {{ $post->withTotalVisitCount()->first()->visit_count_total }}</p>

{{--                                {{ dd($post->visit()) }}--}}
                                <form class="justify-center text-center">

                                    <a class="btn btn-info text-center" href="{{ route('posts.show',$post->id) }}">Show</a>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
