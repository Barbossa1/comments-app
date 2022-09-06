@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aperiam commodi
                    consectetur ea minima mollitia nihil non officiis placeat. Aliquam at beatae, distinctio dolores eos
                    maxime nobis optio possimus saepe?
                </h5>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <div class="input-group">
                    <textarea class="form-control" id="comment" @guest disabled @endguest></textarea>
                    <button type="button" class="input-group-text" onclick="createComments({{ $comments->perPage() }})" @guest disabled @endguest>Send</button>
                </div>
                <br>
                <div class="text-center">
                    <div class="alert alert-danger" role="alert" id="err_block" style="display: none; width: 50%; margin-left: 25%;"></div>
                </div>
            </div>
            @foreach($comments as $comment)
                <div class="card m-2">
                    <div class="card-header">
                        <strong>{{ $comment->user->name }}</strong>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="id_comment" value="{{ $comment->id }}"/>
                        <div id="input_{{ $comment->id }}">
                            <p class="card-text">{{ $comment->comment }}</p>
                        </div>
                    </div>
                    @guest
                    @else
                        @if(Auth::user()->id == $comment->user_id)
                            <div class="card-footer" id="card_footer_{{ $comment->id }}">
                                <button class="btn btn-outline-success"
                                        onclick="showEdit({{ $comment->id }}, '{{ $comment->comment }}', {{ $comments->perPage() }})">Edit
                                </button>
                                <button class="btn btn-outline-danger"
                                        onclick="removeComment({{ $comment->id }}, {{ $comments->perPage() }})">Delete
                                </button>
                            </div>
                        @endif
                    @endguest
                </div>
            @endforeach
            @if($comments->total() > 3 && $comments->perPage() < $comments->total())
                <button class="btn btn-outline-info" onclick="moreComments({{ $comments->perPage() }})">Show more</button>
            @endif
        </div>
    </div>
    <script src="{{ asset('js/comments/script.js') }}"></script>
@endsection
