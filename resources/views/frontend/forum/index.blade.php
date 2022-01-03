@extends('frontend.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/index_job.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/index_forum.css') }}">
@endpush

@guest
    @include('frontend.partials.register')
    @include('frontend.partials.login')
@endguest

@section('sidebar')
    @include('frontend.partials.sidebar')
@endsection

@section('content')
<div class="container">
    <div class="flat-box p-3">
        <form action="{{ route('frontend.forum.store') }}" method="post">
            @csrf
            
            <div class="form-group">
                <div class="mt-3 mb-3">
                    <input type="text" class="form-control" id="threadTitle" name="title" placeholder="Thread Title">
                </div>
                <textarea class="form-control" id="thread" rows="3" name="content" placeholder="Thread...."></textarea>
            </div>

            @auth
                <button id="post-btn" class="btn mr-2 mb-3" role="button">POST</button>                    
            @else
                <button id="post-btn" class="btn mr-2 mb-3" disabled>POST</button>
                <span class="text-danger">You must login first.</span>                                
            @endauth
        </form>
    </div>
    <div class="flat-box p-3 mt-2">
        @forelse ($forums as $forum)
            <div class="row">
                <div class="col-md-1 text-center">
                    @if ($forum->author->image_profile_path)
                        <img src="{{ Storage::url($forum->author->image_profile_path) }}" alt="foto_profil">
                    @else
                        <img src="assets/img/forum.png" alt="foto_profil">
                    @endif
                    <p class="font-weight-bold">{{ $forum->author->getFullName() }}</p>
                </div>
                <div class="col-md-11">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="font-weight-bold post-title">{{ $forum->title }}</span>
                        <span>{{ formatDate($forum->created_at) }}</span>
                    </div>
                    <p class="text-justify">{!! $forum->content !!}</p>

                    <ul class="list-group">
                        @forelse ($forum->replies as $reply)
                            <li class="list-group-item">
                                <span>{!! $reply->content !!}</span>
                                <br>
                                <small class="text-secondary">{{ $reply->user->getFullName() }}</small>
                            </li>
                        @empty
                            <p>There is no reply yet...</p>
                        @endforelse
                    </ul>

                    @auth
                        <form action="{{ route('frontend.forum.reply') }}" method="post">
                            @csrf
                            
                            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                            <textarea name="content" class="form-control mt-4" id="replyThread" rows="3" placeholder="Reply Thread...."></textarea>
                            <button id="reply-btn" class="btn mr-2 mt-3" type="submit">REPLY</button>
                        </form>
                    @endauth
                </div>        
            </div> 
        @empty
            <p>There is no forum yet...</p>       
        @endforelse
    </div>
</div>

@endsection
