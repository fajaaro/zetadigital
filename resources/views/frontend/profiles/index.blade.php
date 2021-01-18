@extends('frontend.layouts.app')

@push('styles')
	@if ($user->inRole('member'))
		<link rel="stylesheet" href="{{ asset('assets/css/dashboard_employee.css') }}">
	@else
		<link rel="stylesheet" href="{{ asset('assets/css/dashboard_recruiter.css') }}">
	@endif
@endpush

@section('content')
	@php
		if ($user->inRole('member')) {
			$classOne = 'employees-container col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12';
			$classTwo = 'employee-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12';
			$classThree = 'employee row';
		} else {
			$classOne = 'recruiters-container col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12';
			$classTwo = 'recruit-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12';
			$classThree = 'recruit row';    			
		}
	@endphp

    <section class="{{ $classOne }}">
        <div class="{{ $classTwo }}">
            <div class="{{ $classThree }}">
                <div class="picture col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12">
                    <img src="{{ $user->image_profile_path ? Storage::url($user->image_profile_path) : asset('assets/img/profilepicture2_clear.png') }}">
                </div>
                <div class="description col-xl-10 col-lg-9 col-md-9 col-sm-8 col-12">
                    <div class="name">{{ $user->getFullName() }}</div>

                    @if ($user->inRole('member'))
                        <div class="condition">I'm looking to find job...</div>

                        @php
                        	$jobCount = $user->appliedJobs()->count();
                        @endphp

                        <div class="job-count">{{ $jobCount }} Job{{ $jobCount > 1 ? 's' : '' }} applied</div>
                    @else
                        <div class="company">{{ $user->recruiter->company->name }}</div>
                        <div class="condition">I'm looking to recruit...</div>

                        @php
                        	$jobCount = $user->recruiter->jobs()->count();
                        @endphp

                        <div class="job-count">{{ $jobCount }} Job{{ $jobCount > 1 ? 's' : '' }} posted</div>
                    @endif

                </div>

                @if (!$user->inRole('member'))
                    <div class="post-job-container">
                        <a href="{{ route('frontend.jobs.create') }}">
                            <div class="post-job">POST A JOB</div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection