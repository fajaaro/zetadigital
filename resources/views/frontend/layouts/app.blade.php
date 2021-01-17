<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Zetadigital') }}</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/zetamodal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo-zetadigital.png') }}">

    @stack('styles')
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <!-- ! Sidebar Modal ! -->
    <section class="modal fade" id="sidebar-modal" tabindex="-1" role="dialog" aria-labelledby="sidebar-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <section class="zeta-sidebar col-12">
                    <div class="zeta-navbar">
                        <div class="menu-section">
                            <a href="" class="menu-item">
                                <div class="discover">
                                    Discover
                                </div>
                            </a>
                            @auth 
                                <div class="menu-item">
                                    <div class="profile">
                                        <div class="image">
                                            <img src="{{ asset('assets/img/profilepicture2.png') }}">
                                        </div>
                                        <div class="name">
                                            {{ Auth::user()->getFullName() }}
                                        </div>
                                    </div>
                                </div>
                            @else 
                                <div class="menu-item">
                                    <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#login-modal" class="login">Login / Register</button>
                                </div>
                            @endauth
                        </div>
                    </div>
                    <div class="menu-items row">
                        <!-- # Option # -->
                        <a href="{{ route('home') }}" class="{{ request()->is('/') || request()->is('jobs*') ? 'active' : '' }}">
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
                        <a href="{{ route('frontend.companies.index') }}" class="{{ request()->is('/') || request()->is('companies*') ? 'active' : '' }}">
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
                            <a href="{{ route('frontend.people.index') }}" class="{{ request()->is('/') || request()->is('people*') ? 'active' : '' }}">
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
            </div>
        </div>
    </section>
    <!-- !!! END OF SIDEBAR MODAL !!! -->

    <div class="zeta-container">
        <!-- ! Navbar ! -->
        <section class="zeta-navbar">
            <a href="{{ route('home') }}" class="logo-section">
                <img src="{{ asset('assets/img/zetalogo.png') }}" alt="ZetaLogo">
            </a>
            <div class="menu-section">
                <a href="" class="menu-item">
                    <div class="discover">
                        Discover
                    </div>
                </a>
                @auth
                    <div class="menu-item">
                        <div class="profile">
                            <div class="image">
                                <img src="{{ asset('assets/img/profilepicture2.png') }}">
                            </div>
                            <div class="name">
                                {{ Auth::user()->getFullName() }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="menu-item">
                        <button type="button" data-toggle="modal" data-target="#login-modal" class="login">Login / Register</button>
                    </div>
                @endauth
            </div>
            <button type="button" data-toggle="modal" data-target="#sidebar-modal" class="open-navbar">=</button>
        </section>
        <!-- !!! END OF NAVBAR !!! -->
        <!-- ! View ! -->
        <section class="zeta-view row">
            @yield('sidebar')

            @yield('content')
        </section>
        <!-- !!! END OF VIEW !!! -->
    </div>

    @stack('scripts')
</body>

</html>