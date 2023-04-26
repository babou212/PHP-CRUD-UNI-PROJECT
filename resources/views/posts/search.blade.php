@extends('posts.layout')
@section('content')
<div style="margin-top: 5rem;">
    <div class="col">
        <h3 class="text-center" style="color: rgb(31 41 55)">Results</h3>
    </div>
    <div class="col-md-12">
        <div class="row grid d-flex justify-content-center">
            @foreach($posts as $post)
                <div class="card col-xs-12 col-md-6 col-lg-3 p-2 mt-3 mr-3" style="color: rgb(31 41 55)">
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
