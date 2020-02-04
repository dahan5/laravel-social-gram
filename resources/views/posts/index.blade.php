@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row d-flex align-items-center">
                                <div class="col-2">
                                    <img src="/storage/{{ $post->user->profile->image }}"
                                        class="rounded-circle w-100" />
                                </div>
                                <div class="col-9 d-flex align-items-center">
                                    <a href="/profile/{{$post->user->id}}" class="text-dark pr-2">
                                        <h6 class="font-weight-bold">{{$post->user->username}}</h6>
                                    </a>
                                </div>
                            </div>
                            <hr />
                            <p class="pt-1">{{$post->caption}}</p>
                        </div>
                        <div class="col-12">
                            <a href="/profile/{{$post->user->id}}"><img src="/storage/{{$post->image}}" class="w-100" /></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12 d-flex justify-content-center text-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
