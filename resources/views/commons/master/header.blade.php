<!-- ========== Multipage Header Section Starts Here========== -->
<header class="header-section">
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{route('login')}}" style="color: #fc4d6e;font-size: 24px;">
{{--                        <img src="{{asset('assets/images/logo/logo.png')}}" alt="logo">--}}
                        Department of Accounting Conference & Journal
                    </a>
                </div>
                <div class="menu-area">
                    <ul class="menu">
                        <li>
                            <a href="{{route('login')}}">Home</a>
                        </li>


                        <li>
                            <a href="#about">Journal</a>
                            <ul class="submenu">
                                <li><a href="{{ route("about") }}">About</a></li>
                                <li><a href="{{ route("author") }}">Author's Guide</a></li>
                                <li><a href="{{ route("ethical") }}">Ethical Statement</a></li>
{{--                                <li><a href="{{ route("about") }}">Ticket Pricing</a></li>--}}
                            </ul>
                        </li>

{{--                        <li>--}}
{{--                            <a href="#about">About</a>--}}
{{--                            <ul class="submenu">--}}
{{--                                <li><a href="about.html">About</a></li>--}}
{{--                                <li><a href="speaker.html">Speakers</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#faq">Pages</a>--}}
{{--                            <ul class="submenu">--}}
{{--                                <li><a href="schedule.html">Schedule</a></li>--}}
{{--                                <li><a href="pricing.html">Pricing</a></li>--}}
{{--                                <li><a href="faq.html">FAQ</a></li>--}}
{{--                                <li><a href="speaker.html">Speakers</a></li>--}}
{{--                                <li><a href="speaker-single.html">Speaker single</a></li>--}}
{{--                                <li><a href="signup.html">Sign Up</a></li>--}}
{{--                                <li><a href="signin.html">Sign In</a></li>--}}
{{--                                <li><a href="forgot-pass.html">Reset Password</a></li>--}}
{{--                                <li><a href="coming-soon.html">Coming Soon</a></li>--}}
{{--                                <li><a href="404.html">404 Page</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                        @auth("participant")
                        <li>
                            <a href="{{route('participant.logout')}}">Logout</a>
                        </li>
                        @endauth

                        @auth("admin")
                            <li>
                                <a href="{{route('admin.logout')}}">Logout</a>
                            </li>
                        @endauth

                        @auth()
                    </ul>
                        @else

                            <li>
                                <a href="{{route('participant.login.form')}}">Sign in</a>
                            </li>
                        </ul>
                        <div class="header-btn">
                            <a href="{{route('participant.signup')}}" class="default-btn move-right">
                                <span>Join Now <i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                        @endauth



                    <!-- toggle icons -->
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ========== Multipage Header Section Ends Here========== -->

