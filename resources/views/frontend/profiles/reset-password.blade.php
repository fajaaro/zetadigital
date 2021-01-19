@extends('frontend.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/resetpassword.css') }}">
@endpush

@section('content')
	<section class="zeta-view row">
        <section class="zeta-form">
            <div class="title">
                /Reset Password
            </div>
            <form method="post" action="{{ route('frontend.profile.resetPassword') }}">
            	@csrf

                <div class="input-container">
                    <input type="password" name="old_password" id="old_password" placeholder="Old Password">
                </div>
                <div class="input-container">
                    <input type="password" name="new_password" id="new_password" placeholder="New Password">
                </div>
                <div class="input-container">
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Repeat New Password">
                </div>
                <input type="submit" class="submit-button" value="Confirm">
            </form>
        </section>
    </section>
@endsection