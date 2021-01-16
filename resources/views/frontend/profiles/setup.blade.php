@extends('frontend.layouts.app')

@section('content')
	<!-- ! View ! -->
    <section class="zeta-view row">
        <section class="zeta-form">
            <div class="title">
                /Set Up Your Recruiting Profile
            </div>
            <form action="" enctype="multipart/form-data">
                <div class="input-container">
                    <div class="preview-image">
                        <img id="previewImage-profile">
                    </div>
                    <input type="file" name="profile_image" id="profile_image" accept="image/*" onchange="previewProfileImage(event)" hidden>
                    <label for="profile_image" class="hidden-upload">Upload a Profile Picture</label>
                </div>
                <div class="input-container">
                    <input type="text" name="first_name" id="first_name" placeholder="First Name">
                </div>
                <div class="input-container">
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                </div>
                <div class="input-container">
                    <input type="text" name="phone" id="phone" placeholder="Phone Number">
                </div>
                <input type="submit" class="submit-button" value="SAVE PROFILE">
            </form>
        </section>
    </section>
    <!-- !!! END OF VIEW !!! -->
@endsection

@push('scripts')
	<script>
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