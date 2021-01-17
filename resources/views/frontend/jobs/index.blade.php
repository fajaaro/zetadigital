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
	<!-- ! Job ! -->
    <section class="zeta-content col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="jobs-container">
            <!-- # Option # -->
            @foreach ($jobs as $job)
	            <div class="job row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                <div class="image col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
	                    <img src="{{ Storage::url($job->company->image_profile_path) }}" alt="Company Logo">
	                </div>
	                <div class="description col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
	                    <div class="title">{{ $job->name }}</div>
	                    <div class="location">{{ $job->company->subdistrict->province->name }}</div>
	                    <a href="{{ route('frontend.jobs.show', ['id' => $job->id]) }}" class="view">View
	                        <img src="{{ asset('assets/img/arrow.png') }}" class="icon">
	                    </a>
	                </div>
	                <div class="status col-xl-4 col-lg-4 col-md-4 col-sm-4">
	                    <div class="place">
	                        <div class="icon">
	                            <img src="{{ asset('assets/img/city.png') }}">
	                        </div>
	                        <div class="explanation">{{ ucfirst($job->type) }}</div>
	                    </div>
	                    <div class="position">
	                        <div class="icon">
	                            <img src="{{ asset('assets/img/group.png') }}">
	                        </div>
	                        <div class="explanation">{{ $job->slots }} Position Available</div>
	                    </div>
	                    <div class="condition {{ $job->status == 'open' ? 'open' : 'closed' }}"></div>
	                </div>
	            </div>
            @endforeach
    </section>
    <!-- !!! END OF JOB !!! -->

    <!-- ! Featured Job ! -->
    <section class="zeta-featured row col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="legend col-12">Featured Job</div>
        <!-- # Option # -->
        @foreach ($featuredJobs as $job)
	        <div class="featured-job-container col-xl-12 col-lg-4 col-md-6 col-sm-6 col-6">
	            <div class="job row">
	                <div class="image col-xl-4 col-lg-4 col-md-4 col-sm-8 col-12">
	                    <img src="{{ Storage::url($job->company->image_profile_path) }}" alt="Company Logo">
	                </div>
	                <div class="description col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
	                    <div class="title">{{ $job->name }}</div>
	                    <div class="location">{{ $job->company->subdistrict->province->name }}</div>
	                    <a href="{{ route('frontend.jobs.show', ['id' => $job->id]) }}" class="view">View
	                        <img src="{{ asset('assets/img/arrow.png') }}" class="icon">
	                    </a>
	                </div>
	            </div>
	        </div>
        @endforeach
        <!-- ## END OF OPTION ## -->
    </section>
    <!-- !!! END OF FEATURED JOB !!! -->
@endsection