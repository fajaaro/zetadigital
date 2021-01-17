@extends('frontend.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/jobs-description.css') }}">
@endpush

@guest
    @include('frontend.partials.register')
    @include('frontend.partials.login')
@endguest

@section('sidebar')
    @include('frontend.partials.sidebar')
@endsection

@section('content')
    @if ($job->status == 'open' && Auth::check() && !Auth::user()->hasApplyJob($job->id))
        @include('frontend.partials.send-cv-modal')
    @endauth

    <!-- ! View ! -->
    <section class="zeta-view col-xl-10 col-lg-10 col-1md-12 col-sm-12 col-12 row">
        <section class="job-description-container col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="job-description">
                <div class="condition {{ $job->status == 'open' ? 'open' : 'closed' }}"></div>
                <div class="job-information">
                    <div class="title">{{ $job->name }}</div>
                    <div class="time-and-condition">
                        <div class="time"><img src="{{ asset('assets/img/clock.png') }}" class="icon"> {{ formatDate($job->expired_at, 'd F Y') }}</div>
                        <div class="explanation"><img src="{{ asset('assets/img/city.png') }}" class="icon"> {{ ucfirst($job->type) }}</div>
                    </div>
                </div>
                <div class="description">
                    <div class="title">Description</div>
                    <div class="content">{{ $job->description }}</div>
                </div>
                <div class="apply-container">
                    @if (Auth::check() && Auth::user()->hasApplyJob($job->id))
                        <button type="button" class="apply" style="opacity: 0.8;" disabled>Applied</button> 
                    @else
                        @if ($job->status == 'open')
                            <button type="button" data-toggle="modal" data-target="{{ Auth::check() ? '#apply-modal' : '#login-modal' }}" class="apply">Apply</button>
                        @endif
                    @endif  
                </div>
            </div>
        </section>
        <section class="posted-by-container col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="posted-by">
                <div class="title">Posted By:</div>
                <div class="profile row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="picture col-xl-4 col-lg-4 col-md-2 col-sm-2 col-3"><img src="{{ asset('assets/img/profilepicture2_clear.png') }}"></div>
                    <div class="data col-xl-8 col-lg-8 col-md-10 col-sm-10 col-9">
                        <div class="name">{{ $job->recruiter->getFullName() }}</div>
                        <div class="location">{{ $job->company->subdistrict->subdistrict }}, {{ $job->company->subdistrict->district }}, {{ $job->company->subdistrict->city }}</div>
                        <div class="company">{{ $job->company->name }}</div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- !!! END OF VIEW !!! -->
@endsection

@push('scripts')
	<script>
		var previewFileCv = function(event) {
		    var output = document.getElementById("previewFile-cv")
		    output.innerHTML = "You Inputed: " + event.target.files[0].name
		}
	</script>
@endpush