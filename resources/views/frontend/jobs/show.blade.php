@extends('frontend.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/jobs-description.css') }}">
@endpush

@guest
    @include('frontend.partials.register')
    @include('frontend.partials.login')
@endguest

@section('content')
	<!-- ! Send CV Modal ! -->
    <section class="modal fade" id="apply-modal" tabindex="-1" role="dialog" aria-labelledby="apply-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content zeta-modal" id="apply-modal">
                <div class="title">
                    Send Your CV
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="content">
                    <form action="" class="modal-form" enctype="multipart/form-data">
                        <div class="input-container">
                            <label for="file_cv">Attach CV in PDF format</label>
                            <input type="file" name="file_cv" id="file_cv" accept=".pdf" onchange="previewFileCv(event)" required hidden>
                            <label for="file_cv" class="hidden-upload"><img src="../assets/img/desktop.png" class="icon"> Choose File...</label>
                        </div>
                        <div class="preview-file" id="previewFile-cv">
                        </div>
                        <input type="submit" class="submit-button" value="SEND">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- !!! END OF SEND CV MODAL !!! -->

    <!-- ! View ! -->
    <section class="zeta-view col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 row">
        <section class="job-description-container col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="job-description">
                <div class="condition {{ $job->status == 'open' ? 'open' : 'closed' }}"></div>
                <div class="job-information">
                    <div class="title">{{ $job->name }}</div>
                    <div class="time-and-condition">
                        <div class="time"><img src="../assets/img/clock.png" class="icon"> {{ formatDate($job->expired_at, 'd F Y') }}</div>
                        <div class="explanation"><img src="../assets/img/city.png" class="icon"> {{ ucfirst($job->type) }}</div>
                    </div>
                </div>
                <div class="description">
                    <div class="title">Description</div>
                    <div class="content">{{ $job->description }}</div>
                </div>
                <div class="apply-container">
                    <button type="button" data-toggle="modal" data-target="{{ Auth::check() ? '#apply-modal' : '#login-modal' }}" class="apply">Apply</button>
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