<!-- ! Login Modal ! -->
<section class="modal fade" id="tambahan-modal" tabindex="-1" role="dialog" aria-labelledby="tambahan-modal" aria-hidden="true">

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
                <form method="post" action="" class="modal-form" enctype="multipart/form-data">
                    @csrf

                    <div class="input-container">
                        <div class="preview-image">
                            <img id="previewImage-company">
                        </div>
                        <input type="file" name="company_image" id="company_image" accept="image/*" onchange="previewCompanyImage(event)" hidden>
                        <label for="company_image" class="hidden-upload">Upload a Company Image</label>
                    </div>
                    <div class="input-container">
                        <label for="email">Company Name</label>
                        <input type="text" name="company_name" id="company_name">
                    </div>
                    <div class="input-container">
                        <label for="city">Company At</label>
                        <select class="select-control dropdown-toggle" name="city" id="city">
                            <option value="">Select City</option>
                            <option value="1">Jakarta</option>
                            <option value="2">Bandung</option>
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
<script>
    var previewProfileImage = function(event) {
        var reader = new FileReader()
        reader.onload = function() {
            var output = document.getElementById("previewImage-profile")
            output.src = reader.result
        }
        reader.readAsDataURL(event.target.files[0])
    }
  var previewCompanyImage = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById("previewImage-company");
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>