@extends('frontend.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/index_company.css') }}">
@endpush

@guest
    @include('frontend.partials.register')
    @include('frontend.partials.login')
@endguest

@section('content')
	<!-- ! Company ! -->
    <section class="zeta-content col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="companies-container row">
            <!-- # Option # -->
            @foreach ($companies as $company)
	            <div class="company-container col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	                <div class="company row">
	                    <div class="logo col-xl-auto col-lg-3 col-md-3 col-sm-12 col-4">
	                        <img src="{{ Storage::url($company->image_profile_path) }}" alt="Company Logo">
	                    </div>
	                    <div class="description col-xl-auto col-lg-9 col-md-9 col-sm-12 col-8">
	                        <div class="title">{{ $company->name }}</div>
	                        <div class="location">{{ $company->subdistrict->subdistrict }}, {{ $company->subdistrict->district }}, {{ $company->subdistrict->city }}</div>
	                    </div>
	                </div>
	            </div>
            @endforeach
        </div>
    </section>
    <!-- !!! END OF COMPANY !!! -->
@endsection