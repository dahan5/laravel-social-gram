@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <img src="/storage/{{$post->image}}" class="w-100" />
                        </div>
                        <div class="col-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-3">
                                    <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100" />
                                </div>
                                <div class="col-9">
                                    <a href="/profile/{{$post->user->id}}" class="text-dark pr-2"><h6 class="font-weight-bold">{{$post->user->username}}</h6></a>
                                    <a href="#">Follow</a>
                                </div>
                            </div>
                            <hr/>
                            <p class="pt-1">{{$post->caption}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
