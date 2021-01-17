@extends('frontend.layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/index_hire.css') }}">
@endpush

@guest
    @include('frontend.partials.register')
    @include('frontend.partials.login')
@endguest

@section('sidebar')
    @include('frontend.partials.sidebar')   
@endsection

@section('content')
    <!-- ! hire ! -->
    <section class="zeta-content col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="hire-people-container row">
            <!-- # Option # -->
            @foreach ($members as $member)
                <div class="hire-container col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="hire row">
                        <div class="picture col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <img src="{{ asset('assets/img/profilepicture.png') }}" alt="Profile Picture">
                        </div>
                        <div class="description col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="name">{{ $member->getFullName() }}</div>
                            <div class="condition">I’m looking to find job...</div>

                            @php
                                $jobCount = $member->appliedJobs()->count();
                            @endphp
                            <div class="job-count">{{ $jobCount }} Job{{ $jobCount > 1 ? 's' : '' }} applied</div>
                        </div>
                        <div class="hire-me-container">
                            <a href="">
                                <div class="hire-me">HIRE ME</div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- ## END OF OPTION ## -->
        </div>
    </section>
    <!-- !!! END OF hire !!! -->
@endsection