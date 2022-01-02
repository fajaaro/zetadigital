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
<div class="container mb-5 flat-box">
    <div class="mr-5">
        <div class="form-group">
            <div class="mt-3 mb-3">
                <input type="text" class="form-control" id="threadTitle" placeholder="Thread Title">
            </div>
            <textarea class="form-control" id="thread" rows="3" placeholder="Thread...."></textarea>
        </div>
    </div>
    <a id="post-btn" class="btn mr-2 mb-3" href="#" role="button">POST</a>
</div>

<div class="mb-5 p-3 flat-box">
    <div class="row">
        <div class="col-md-1 text-center">
            <img src="assets/img/forum.png" alt="foto_profil">
            <p class="font-weight-bold">Arfan Solihin</p>
        </div>
        <div class="col-md-11">
            <div class="d-flex justify-content-between mb-3">
                <span class="font-weight-bold post-title">OPEN RECRUITMENT CV BAHAGIA SELALU JAYA</span>
                <span>18-12-2021</span>
            </div>
            <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto sint harum explicabo blanditiis modi adipisci repudiandae ex, ullam aut nihil quia sit at obcaecati delectus molestiae nulla aperiam, corrupti fuga cum? Sint eius reiciendis et, magnam saepe quibusdam animi minus magni atque dicta, fugiat illo cumque earum optio quod unde! Fugiat ipsa natus officia ratione quas dolorem dolores tempore maxime, animi eum, voluptatibus maiores ad. Laboriosam ullam, eveniet voluptatum ea id, est officia illo quibusdam consequatur autem itaque mollitia iure voluptatibus veritatis corporis nam. Incidunt, dolorem voluptatem? Quibusdam quidem, laboriosam culpa assumenda laudantium dignissimos dolorem doloremque enim beatae vitae quos, animi voluptates. Fuga, qui mollitia assumenda molestias quia at. Explicabo quos quisquam accusantium voluptatibus voluptates, possimus ullam illum nulla consequatur dolorem deleniti, tenetur blanditiis delectus! Iste aperiam reiciendis error possimus necessitatibus pariatur at, ducimus, minus excepturi, tenetur recusandae blanditiis nam deleniti similique? Cupiditate suscipit adipisci libero eum. Inventore, illo saepe!</p>
            <div class="mr-5 mt-4">
                <textarea class="form-control" id="replyThread" rows="3" placeholder="Reply Thread...."></textarea>
            </div>
            <a id="reply-btn" class="btn mr-2 mt-3" href="#" role="button">REPLY</a>
        </div>        
    </div>
</div>


@endsection
