@extends('frontend.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/index_job.css') }}">
@endpush

@guest
    @include('frontend.partials.register')
    @include('frontend.partials.login')
@endguest

@section('sidebar')
    @include('frontend.partials.sidebar')	
@endsection

@section('content')
    <p>Forum Index</p>
@endsection