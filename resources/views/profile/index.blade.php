@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 p-5">
            <img class="rounded-circle w-100" src="{{ $user->profile->profileImage() }}" />
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline pt-3 pb-3">
                <div class="d-flex align-items-center">
                    <div class="h4">{{$user->username}}</div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                @can('update', $user->profile)
                    <a href="/p/create">Add a  Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> Followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}
            </div>
            <div class=""><a href="https://hermition.com/">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/show/{{ $post->id }}">
                    <img class="w-100" src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" />
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
