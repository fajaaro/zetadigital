@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous">
@endpush

<!-- ! Modal Add Company ! -->
<section class="modal fade" id="add-company-modal" tabindex="-1" role="dialog" aria-labelledby="add-company-modal" aria-hidden="true">

<!-- ----------------NOTES----------------- -->

<!-- aria-labelledby="tambahan-modal" -->
<!-- sama id="tambahan-modal" -->
<!-- "tambahan"-modalnya diganti aja ya bebas mau apa namanya -->
<!-- disesuaiin sama data-target di setup.blade.php nya -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content zeta-modal">
            <div class="title">
                Setup your Company
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="content">
                <form id="form-add-company" class="modal-form" enctype="multipart/form-data">
                    <div class="input-container">
                        <div class="preview-image">
                            <img id="previewImage-company">
                        </div>
                        <input type="file" name="company_image_profile" id="company_image_profile" accept="image/*" onchange="previewCompanyImage(event)" hidden>
                        <label for="company_image_profile" class="hidden-upload">Upload a Company Image</label>
                    </div>
                    <div class="input-container">
                        <label for="email">Company Name</label>
                        <input type="text" name="company_name" id="company_name">
                    </div>
                    <div class="input-container">
                        <label for="company_subdistrict_id">Company At</label>
                        <select class="form-control" name="company_subdistrict_id" id="company_subdistrict_id">
                            <option value="">Select City</option>
                            @foreach ($subdistricts as $subdistrict)
                                <option value="{{ $subdistrict->id }}">{{ $subdistrict->subdistrict }}, {{ $subdistrict->district }}, {{ $subdistrict->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="company_address">Company Address</label>
                        <textarea name="company_address" id="company_address" cols="10" rows="3"></textarea>
                    </div>
                    <input type="submit" class="submit-button" value="SUBMIT">
                    
                    @php
                        session()->put('referer', url()->current());
                    @endphp
                </form>
            </div>
        </div>
    </div>
</section>
<!-- !!! END OF LOGIN MODAL !!! -->

@push('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#company_subdistrict_id').selectize({
                // sortField: 'text'
            })

            function getAllCompanies() {
                const apiToken = $('meta[name=api_token]').attr('content')

                axios
                    .get(`{{ route('api.companies.index') }}?api_token=${apiToken}`)
                    .then(res => {
                        if (res.status == 200) {
                            let companies = res.data.companies


                            $('#company').empty()
                            $('#company').append('<option value="">Select Your Company</option>')

                            companies.map((item, index) => {
                                let optionCompanyHTML = `<option value="${item.id}">${item.name}</option>`
                                $('#company').append(optionCompanyHTML) 
                            })
                        }
                    }) 
                    .catch(err => {
                        console.log(err)
                    })
            }

            $('#form-add-company').on('submit', function(e) {
                e.preventDefault()

                const companyImageProfile = document.getElementById('company_image_profile').files[0]
                
                let data = new FormData()
                data.append('user_id', {{ Auth::id() }})
                data.append('subdistrict_id', $('#company_subdistrict_id').val())
                data.append('name', $('#company_name').val())
                data.append('address', $('#company_address').val())
                data.append('image_profile', companyImageProfile)
                
                let settings = { 
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json',
                    }
                }

                const apiToken = $('meta[name=api_token]').attr('content')

                axios
                    .post(`{{ route('api.companies.store') }}?api_token=${apiToken}`, data, settings)
                    .then(res => {
                        if (res.status == 200) {
                            getAllCompanies()

                            Swal.fire({
                                text: 'Success add new company!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(result => {
                                result.isConfirmed ? $('#add-company-modal').modal('hide') : ''
                            })
                        }
                    }) 
                    .catch(err => {
                        console.log(err)
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
        var previewCompanyImage = function(event) {
            var reader = new FileReader()
            reader.onload = function(){
                var output = document.getElementById("previewImage-company")
                output.src = reader.result
            }
            reader.readAsDataURL(event.target.files[0])
        }
    </script>
@endpush