@extends('frontend.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/setup.css') }}">
@endpush

@section('content')
	<!-- ! View ! -->
    <section class="zeta-view row">
        <section class="zeta-form">
            <div class="title">
                /Set Up Your {{ Auth::user()->inRole('recruiter') ? 'Recruiting' : '' }} Profile
            </div>
            <form method="post" action="{{ route('frontend.profile.setup') }}" enctype="multipart/form-data">
                @csrf

                <div class="input-container">
                    <div class="preview-image">
                        <img id="previewImage-profile">
                    </div>
                    <input type="file" name="image_profile" id="image_profile" accept="image/*" onchange="previewProfileImage(event)" hidden>
                    <label for="image_profile" class="hidden-upload">Upload a Profile Picture</label>
                </div>
                <div class="input-container">
                    <input type="text" name="first_name" id="first_name" placeholder="First Name">
                </div>
                <div class="input-container">
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                </div>
                <div class="input-container">
                    <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number">
                </div>
                @if (Auth::user()->inRole('recruiter'))
                    <hr>
                    <div class="input-container">
                        {{-- <input type="text" name="company" id="company" placeholder="Company"> --}}
                        <select id="company" class="form-control company" name="company_id" required>
                            <option value="">Select Your Company</option>
                            
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach                                 
                        </select>
                    </div>
                    <div class="input-container">
                        <input type="text" name="company_position" id="company_position" placeholder="Your position at that Company">
                    </div>
                    <p>Your company is not registered yet? <span class="font-weight-bold" style="cursor: pointer;">register</span> now!</p>
                @endif
                <input type="submit" class="submit-button mb-3" value="SAVE PROFILE">
            </form>
        </section>
    </section>
    <!-- !!! END OF VIEW !!! -->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('select').selectize({
                // sortField: 'text'
            })

            $('#company_city').on('change', function() {
                const subdistrictId = $(this).val()

                axios
                    .get(`/api/subdistricts/${subdistrictId}`)
                    .then(response => {
                        const subdistrict = response.data[0]

                        $('#company_postal_code').val(subdistrict.postal_code)

                        return subdistrict.province_code
                    })
                    .then(provinceCode => {
                        axios
                            .get(`/api/provinces/${provinceCode}`)
                            .then(response => {
                                const province = response.data[0]

                                $('#company_province').val(province.name)
                            })                      
                    })

            })
    
        })

		var previewProfileImage = function(event) {
		    var reader = new FileReader()
		    reader.onload = function() {
		        var output = document.getElementById("previewImage-profile")
		        output.src = reader.result
		    }
		    reader.readAsDataURL(event.target.files[0])
		}
    </script>
@endpush