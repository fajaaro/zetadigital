@extends('frontend.layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/setup.css') }}">
@endpush

@section('content')
    <section class="zeta-view row">
        <section class="zeta-form">
            <div class="title">
                /Post Job
            </div>
            <form method="post" action="{{ route('frontend.jobs.store') }}">
                @csrf
                
                <div class="input-container">
                    <input type="text" name="name" id="name" placeholder="Name" required>
                </div>
                <div class="input-container">
                    <select name="type" id="type" required>
                        <option value="">Select Type</option>
                        <option value="onsite">Onsite</option>
                        <option value="freelance">Freelance</option>
                        <option value="remote">Remote</option>
                    </select>
                </div>                
                <div class="input-container">
                    <textarea name="description" id="description" cols="30" rows="8" placeholder="Description..." required></textarea>
                </div>
                <div class="input-container">
                    <input type="number" name="slots" id="slots" placeholder="Slots" style="margin-right: 7.5px;" required>
                    <input type="number" name="expired_at" id="expired_at" placeholder="Expired Time (Days)" style="margin-left: 7.5px;" required>
                </div>
                <input type="submit" class="submit-button mb-3" value="SUBMIT">
            </form>
        </section>
    </section>
@endsection
