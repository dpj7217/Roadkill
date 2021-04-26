@extends('layouts.main')

@section('content')

    <div class="post_header" style="background-image: url({{ asset($post->image_path) }}); background-size: contain; background-repeat: no-repeat; width: 100%; height: 0; padding-top: 66.65%;" ></div>
    <div style="margin-top: -25%; background-color: rgba(255, 255, 255, 0.26); display: flex; flex-direction: row; justify-content: space-between;">
        <h1 style="margin: auto 0 auto 2.5rem">{{ $post->title }}</h1>
        <div style="display: flex; flex-direction: row; justify-content: space-between; width: 10rem; height: 5rem;">

            <div style="margin: auto; border: .1em solid black; border-radius: 50%; height: 2vw; width: 2vw; overflow: hidden;">
                <img src={{ asset($post->user->profile_image) }} alt="default profile Image">
            </div>

            <div style="margin: auto;">
                <p style="margin: auto;" name="by-line">By {{ $post->user->name }}</p>
            </div>


        </div>
    </div>


    <div class="post_body" style="width: 100%; display: flex; justify-content: center; margin-top: 5rem; ">
        <div class=" col-8">
            <div style="background-color: white; height: 100%; padding: 1.5rem;">
                <p>{{ $post->body }}</p>

                @if (Auth::check() && auth()->user()->id == $post->user->id)
                <div style="margin-top: 5rem; background-color: rgba(207, 205, 205, 0.63); padding: .5rem; display: flex; justify-content: flex-end; border-radius: .5rem">
                    {{-- edit button --}}
                    <a href=" {{ route('showUpdatePost', $post->id) }} " class="btn btn-primary">Edit Post</a>

                    {{-- delete button --}}
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" style="margin: 0 .5rem">
                        Delete Post
                    </button>
                </div>

                @endif
            </div>
        </div>
    </div>

    {{-- @if (Auth::check() && auth()->user()->id == $post->user->id) --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>


                <div class="modal-body">
                    <h5>Are you sure you want to delete this post?</h5>
                    <small style="color: red;">This action is permanent</small>
                </div>


                <div class="modal-footer">
                    <form action="{{ route('deletePost', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{-- @endif --}}

@endsection




