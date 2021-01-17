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
                <form method="post" action="{{ route('frontend.jobs.apply', ['id' => $job->id]) }}" class="modal-form" enctype="multipart/form-data">
                    @csrf

                    <div class="input-container">
                        <label for="file_cv">Attach CV in PDF format</label>
                        <input type="file" name="cv" id="file_cv" accept=".pdf" onchange="previewFileCv(event)" required hidden>
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