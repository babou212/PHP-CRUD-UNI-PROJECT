@extends('posts.layout')
@section('content')
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                    </div>
                </div>
            </div>

                <div class="col-md-12">
                    <div class="row grid d-flex justify-content-center">
                            <div class="card col-xs-12 col-md-6 col-lg-3 p-2 mt-3 mr-3"
                                 style="background-color: #cdb4db; width: 100%">
                                <img class="card-img-top" style="width: 100%; height: 20vh; object-fit: contain"
                                     src="{{ asset($post->image_uri) }}" alt="post-image">
                                <div class="card-body">
                                    <h5 class="text-center card-title" style="font-size: 1rem;
                                color: #ffffff">{{ $post->title }}</h5>

                                    <p class="text-center card-text" style="font-size: 1rem;
                                color: #ffffff">{{ $post->body }}</p>

                                    <p class="text-center card-text" style="font-size: 1rem;
                                color: #ffffff">Price £{{ $post->cost }}</p>

                                    <form class="justify-center text-center"
                                          action="{{ route('posts.destroy', $post->id) }}" method="POST">

                                        @if(Auth::user()->hasRole('user') && $post->user_id == Auth::user()->id)
                                        <a class="btn btn-primary text-center"
                                           href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                        @endif

                                        @if(Auth::user()->hasRole('user'))
                                            <a class="btn btn-primary text-center"
                                               href="{{ route('posts.comment', $post->id) }}">Add Comment</a>
                                        @endif

                                        @if(Auth::user()->hasRole('admin'))
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-center">Delete</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>

            @foreach($post->comments as $comment)
                <div class="card" style="margin-top: 2vh">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $comment->body }}</p>
                        <footer class="blockquote-footer"> {{ $comment->user->name.' '.
                            $comment->created_at->format('d.m.Y') }}</footer>
                    </blockquote>
                </div>
            </div>
            @endforeach
        </div>
@endsection
