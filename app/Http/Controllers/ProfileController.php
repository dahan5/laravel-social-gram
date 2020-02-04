<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        //Eqv in arguments above
        //$user = User::findOrFail($user);
        //dd($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount = Cache::remember('posts.count'. $user->id, 
        now()->addSeconds(30), 
        function() use ($user) {
            return $user->posts->count();
        });
        $followersCount = Cache::remember('followers.count'.$user->id, 
        now()->addSeconds(30), 
        function() use ($user) {
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember('following.count'.$user->id,
        now()->addSeconds(30),
        function() use($user) { 
            return $user->following->count();
        });
        return view('profile.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);
        return view('profile.edit', compact('user'));
    }

    public function update(User $user) {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image'
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(150, 150);
            $image->save();
            $imgArray = ['image' => $imagePath];
        }

        auth()->user()->profile()->update(array_merge(
            $data,
            $imgArray ?? []
        ));

        return redirect('/profile/'.auth()->user()->id);
    }
}
