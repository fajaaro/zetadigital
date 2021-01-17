<!-- ! Sidebar ! -->
<section class="zeta-sidebar col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="menu-items row">
        <!-- # Option # -->
        <a href="{{ route('home') }}" class="col-xl-12 col-lg-4 col-md-4 col-sm-4 col-12 {{ request()->is('/') || request()->is('jobs*') ? 'active' : '' }}">
            <div class="link-container">
                <div class="image">
                    <img src="{{ asset('assets/img/suitcase.png') }}" alt="suitcase.png">
                </div>
                <div class="title">
                    Jobs
                </div>
            </div>
        </a>
        <!-- ## END OF OPTION ## -->
        <a href="{{ route('frontend.companies.index') }}" class="col-xl-12 col-lg-4 col-md-4 col-sm-4 col-12 {{ request()->is('companies*') ? 'active' : '' }}">
            <div class="link-container">
                <div class="image">
                    <img src="{{ asset('assets/img/city.png') }}" alt="city.png">
                </div>
                <div class="title">
                    Companies
                </div>
            </div>
        </a>
        @if (Auth::check() && !Auth::user()->inRole('member'))
            <a href="{{ route('frontend.people.index') }}" class="col-xl-12 col-lg-4 col-md-4 col-sm-4 col-12 {{ request()->is('people*') ? 'active' : '' }}">
                <div class="link-container">
                    <div class="image">
                        <img src="{{ asset('assets/img/group.png') }}" alt="group.png">
                    </div>
                    <div class="title">
                        Hire People
                    </div>
                </div>
            </a>
        @endif
    </div>
</section>
<!-- !!! END OF SIDEBAR !!! -->