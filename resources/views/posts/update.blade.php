@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-1"></div>
    <div class="col-10 form-box">
        <form action="{{ route('handleUpdatePost', $post->id) }}" method="POST" >
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" class="form-control" name="post_title" id="post_title" required value="{{ $post->title }}">

                @error('post_title')
                <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="post_body">Post Body</label>
                <textarea class="form-control" name="post_body" id="post_body" rows="10" required ">{{ $post->body }}</textarea>

                @error('post_body')
                <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>

            <button type="sumbit" class="btn btn-warning btn-full-width">Update Post</button>
        </form>
    </div>
    <div class="col-1"></div>
</div>


@endsection
