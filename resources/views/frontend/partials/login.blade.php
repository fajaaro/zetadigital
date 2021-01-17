<!-- ! Login Modal ! -->
<section class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content zeta-modal">
            <div class="title">
                Welcome Back! <img src="../assets/img/handwave.png">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="content">
                <form method="post" action="{{ route('login') }}" class="modal-form">
                    @csrf

                    <div class="input-container">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    
                    @php
                        session()->put('referer', url()->current());
                    @endphp

                    <input type="submit" class="submit-button" value="LOGIN">
                </form>
                <div class="login-options">
                    <button type="button" data-toggle="modal" data-dismiss="modal" data-target="#register-modal">Don't have an account ?</button>
                    @if (Route::has('password.request'))
                        <a href="setup_resetpassword.html">Forgot Your Password ?</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- !!! END OF LOGIN MODAL !!! -->