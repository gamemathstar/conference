@extends("layouts.master")

@section("content")


@php
    $conf = \App\Models\Conference::conference();
@endphp

    <!-- ================> Banner section start here <================== -->
    <section id="home" class="banner banner--overlay" style="background-image: url('{{asset('abu_bschl.jpeg')}}');">
        <div class="container">
            <div class="banner__wrapper">
                <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="9">
                    <h3>{{Carbon\Carbon::parse($conf->start_date)->format('d M')}} In {{$conf->city}}</h3>
                    <div class="banner__bottom">
                        <ul class="countdown justify-content-center" data-date="{{ Carbon\Carbon::parse($conf->start_date)->format('F j, Y H:i:s') }}" id="countdown">
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-days">99</h3>
                                <p class="countdown__text">Days</p>
                            </li>
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-hours">18</h3>
                                <p class="countdown__text">Hours</p>
                            </li>
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-minutes">44</h3>
                                <p class="countdown__text">Min</p>
                            </li>
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-seconds">36</h3>
                                <p class="countdown__text">Sec</p>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('participant.login.form') }}" class="default-btn move-right"><span>Conference Login <i
                                class="fa-solid fa-arrow-right"></i></span> </a>
                    <a href="{{ route('participant.login.form') }}" class="default-btn move-right"><span>Journal Login <i
                                class="fa-solid fa-arrow-right"></i></span> </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> Banner section end here <================== -->






    <!-- ================> About section start here <================== -->
    <section class="about padding-top padding-bottom">
        <div class="container">
            <div class="about__wrapper">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="about__thumb" data-aos="fade-up" data-aos-duration="1500">
                            <img src="{{ asset('abu_bschl.jpeg') }}" alt="About Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content" data-aos="fade-up" data-aos-duration="2000">
                            <p class="subtitle">{{$conf->title}}</p>
                            <div>
                                {!! $conf->description !!}

                                <div class="btn-group">
                                    <a href="{{ route('participant.signup') }}" class="default-btn default-btn--secondary move-top">
                                        <span>
                                            Register Now
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> About section end here <================== -->




    <!-- ================> feature section start here <================== -->
    <section class="feature padding-top padding-bottom bg--white" id="feature">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Opportunities</p>
            </div>

            <div class="feature__wrapper">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-microphone"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4>NJAR</h4>
                                    <div class="feature__item-text">
                                        <p>
                                            Nigerian Journal of Accounting Research
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-boxes-stacked"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4> IJCRTF</h4>
                                    <div class="feature__item-text">
                                        <p>
                                            International Journal of Corporate Reporting Taxation and Finance
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="200">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-puzzle-piece"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4>Meet Up/Presentations</h4>
                                    <div class="feature__item-text">
                                        <p>
                                            Opening Ceremony Meet up and Presentations
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="300">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-award"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4>Award</h4>
                                    <div class="feature__item-text">
                                        <p>
                                            Certificates
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> feature section end here <================== -->




{{--    <!-- ================> Event access section start here <================== -->--}}
{{--    <section class="event-access padding-top padding-bottom">--}}
{{--        <div class="mockup" data-aos="fade-up-left" data-aos-duration="900">--}}
{{--            <img class="mok-img" src="./assets/images/event/mobile.png" alt="">--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <div class="contact__wrapper">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="event-access-content" data-aos="fade-right" data-aos-duration="900">--}}
{{--                            <h2>You can access us from mobile !</h2>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi--}}
{{--                                dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci--}}
{{--                                tation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in--}}
{{--                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur--}}
{{--                            </p>--}}
{{--                            <a href="#" class="default-btn move-right"><span>Get Ticket <i--}}
{{--                                        class="fa-solid fa-arrow-right"></i></span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- ================> Event access section end here <================== -->--}}



    <!-- ================> Event schedule section start here <================== -->
    <section class="schedule padding-top padding-bottom">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">15th October - 6th December </p>
                <h2>Events Schedule</h2>
            </div>
            <div class="schedule__wrapper">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="schedule__item" data-aos="fade-up-left" data-aos-duration="1000">
                            <div class="schedule__item-inner">
                                <div class="schedule__item-time">
                                    <h6>15th Oct-24th Nov</h6>
                                </div>
                                <div class="schedule__item-content">
                                    <h4>Submission of Abstract and full Paper</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-6">
                        <div class="schedule__item schedule__item--right" data-aos="fade-up-right"
                             data-aos-duration="1000">
                            <div class="schedule__item-inner">
                                <div class="schedule__item-time">
                                    <h6>3rd Dec</h6>
                                </div>
                                <div class="schedule__item-content">
                                    <h4>Arrival</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="schedule__item" data-aos="fade-up-left" data-aos-duration="1000">
                            <div class="schedule__item-inner">
                                <div class="schedule__item-time">
                                    <h6>4th December</h6>
                                </div>
                                <div class="schedule__item-content">
                                    <h4>Opening Ceremony and Postgraduate Colloquim</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-6">
                        <div class="schedule__item schedule__item--right" data-aos="fade-up-right"
                             data-aos-duration="1000">
                            <div class="schedule__item-inner">
                                <div class="schedule__item-time">
                                    <h6>5th Dec</h6>
                                </div>
                                <div class="schedule__item-content">
                                    <h4>Plenary Sessions</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-6">
                        <div class="schedule__item schedule__item--left" data-aos="fade-up-right"
                             data-aos-duration="1000">
                            <div class="schedule__item-inner">
                                <div class="schedule__item-time">
                                    <h6>6th Dec</h6>
                                </div>
                                <div class="schedule__item-content">
                                    <h4>Departure</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> Event schedule section end here <================== -->

    <!-- ================> Pricing section start here <================== -->
    <section class="pricing padding-top padding-bottom">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Conference</p>
                <h2>Fee</h2>
            </div>
            <div class="pricing__wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900">
                            <div class="pricing__inner">
                                <div class="pricing__body">
                                    <h4>Student</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"> <span>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </span> Local &#8358; 20,000 </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </span> International $40</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
                            <div class="pricing__inner">
                                <div class="pricing__body">
                                    <h4>Academics/Individuals</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-circle-check"></i></span>Local &#8358; 25,000 </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-check"></i></span>International $50
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="200">
                            <div class="pricing__inner">
                                <div class="pricing__body">
                                    <h4>Organizations</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-circle-check"></i></span>Local &#8358; 200,000 </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-check"></i></span>International $300
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> Pricing section end here <================== -->



    @php
        $keynoteSpeaker = $conf->keynoteSpeaker();


    @endphp
    <!-- ================>Team section start here <================== -->
    <section class="team padding-top padding-bottom" id="team" style="background-image:url(assets/images/team/bg.png)">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <h2>Events Speakers</h2>
            </div>
            <div class="team__wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="team__item" data-aos="fade-left" data-aos-duration="900">
                            <div class="team__item-inner">
                                <div class="team__item-thumb">
                                    <img src="{{asset($keynoteSpeaker->image_path)}}" alt="Team Image">
                                </div>
                                <div class="team__item-content">
                                    <div class="team__item-author">
                                        <h5><a href="speaker-single.html">{{$keynoteSpeaker->name}}</a> </h5>
                                        <p>Keynote Speaker</p>
                                    </div>
                                    <p>
                                        {{Illuminate\Support\Str::limit($keynoteSpeaker->description, 200)}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($conf->otherSpeakers() as $speaker)
                    <div class="col-lg-6">
                        <div class="team__item" data-aos="fade-right" data-aos-duration="900">
                            <div class="team__item-inner">
                                <div class="team__item-thumb">
                                    <img src="{{asset($speaker->image_path)}}" alt="Team Image">
                                </div>
                                <div class="team__item-content">
                                    <div class="team__item-author">
                                        <h5><a href="speaker-single.html">{{$speaker->name}}</a> </h5>
                                        <p>{{ucwords($speaker->speaker_type)}}</p>
                                    </div>
                                    <div>
                                        {{\Illuminate\Support\Str::limit($speaker->description,200)}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- ================>Team section end here <================== -->





    <!-- ================>Sponsor section start here <================== -->
    <section class="sponsor padding-top padding-bottom bg--white">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <h2>Our Sponsors</h2>
            </div>
            <div class="sponsor__wrapper">
                <div class="swiper sponsor__slider mb-4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/1.png" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/2.png" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/3.png" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/4.png" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/5.png" alt="sponsor image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================>Sponsor section end here <================== -->










    <!-- ================Venue section start here <================== -->
    <section class="venue padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="venue__content">
                        <h3>Event Venue</h3>
                        <ul class="venue__list">
                            <li class="venue__list-item"><span><i class="fa-solid fa-location-dot"></i></span>
                                {{$conf->location}}
                            </li>
                            <li class="venue__list-item"><span><i class="fa-solid fa-phone"></i></span> +234 8069643221
                            </li>
                            <li class="venue__list-item"><span><i class="fa-solid fa-envelope"></i></span>
                                departmentabua@gmail.com </li>
                            <li class="venue__list-item"><span><i class="fa-solid fa-globe"></i></span>
                                accountingabu.com.ng
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="venue__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3914.586326970306!2d7.650256974849656!3d11.144155089027834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11b285da2b6e7897%3A0xf62c1cf6cf73bbd1!2sABU%20Business%20School%20(Center%20for%20Excellence)!5e0!3m2!1sen!2sng!4v1697958239945!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!-- ================Venue section end here <================== -->



@endsection
