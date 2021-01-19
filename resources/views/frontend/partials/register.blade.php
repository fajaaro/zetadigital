<!-- ! Register Modal ! -->
<section class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="register-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content zeta-modal">
            <div class="title">
                Join Zetadigital <img src="{{ asset('assets/img/handwave.png') }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="content">
                <form method="post" action="{{ route('register') }}" class="modal-form">
                    @csrf

                    <div class="input-container">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="input-container">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="input-container">
                        <label for="role">I'm signin up as</label>
                        <select class="select-control dropdown-toggle" name="role" id="role">
                            <option value="">Select Role</option>
                            <option value="1">Recruiter</option>
                            <option value="2">Member</option>
                        </select>
                    </div>
                    <input type="submit" class="submit-button" value="REGISTER">
                </form>
                <div class="register-options">
                    <span>Already have an account ?</span> <a data-dismiss="modal" data-toggle="modal" data-target="#login-modal">Log in</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- !!! END OF REGISTER MODAL !!! -->