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
                /Post Job
            </div>
            <form method="post" action="">
                @csrf
                <div class="input-container">
                    <input type="text" name="name" id="name" placeholder="Name">
                </div>
                <div class="input-container">
                    <textarea name="description" id="description" cols="30" rows="8" placeholder="Description..."></textarea>
                </div>
                <div class="input-container">
                    <input type="number" name="slot" id="slot" placeholder="Slot" style="margin-right: 7.5px;">
                    <input type="text" name="expired_time" id="expired_time" placeholder="Expired Time (Days)" style="margin-left: 7.5px;">
                </div>
                <input type="submit" class="submit-button mb-3" value="SUBMIT">
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