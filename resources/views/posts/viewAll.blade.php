@extends('layouts.main')

@section('content')

@foreach ($posts as $post)


<div style="width: 100%; display: flex; justify-content: center;">
    <div style="height: 25rem; width: 50rem; overflow: hidden; border: 0px solid black; border-radius: 2vh; margin-top: 5rem;">
        <a href="{{ route('showPost', $post->id) }}" style="width: 100%; height: 100%; text-decoration: none; color: black">
            <div style="height: 100%; width: 100%;  background-image: url('{{  asset($post->image_path) }}'); background-size: cover; background-repeat: no-repeat; padding-top: 25%; padding-left: 33%;">
                <div style="background-color: rgba(128, 128, 128, 0.397); display: flex; justify-content: center;">
                    <div>
                        <h3>{{ $post->title }}</h3>
                        <h5>By {{ $post->user->name }}</h5>
                        <h5>Last Updated {{ $post->updated_at }}</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

@endforeach

@endsection
