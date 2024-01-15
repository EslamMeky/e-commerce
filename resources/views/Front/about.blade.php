@extends('layouts.app')
@section('content')

    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>{{__('messages.About Our Company')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Front.alerts.success')
    @include('Front.alerts.errors')
    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="{{asset('site/images/about-left-image.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>{{__('messages.About Us && Our Skills')}}</h4>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>{{__('messages.Backend Laravel developer')}}</p>
                        </div>
                        <ul>
                            <li><a href="https://www.facebook.com/eslam.meky.5623?mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/eslam-meky-246817219"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Our Team Area Starts ***** -->
    <section class="our-team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>{{__('messages.Our Team')}}</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://www.facebook.com/eslam.meky.5623?mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://www.linkedin.com/in/eslam-meky-246817219"><i class="fa fa-linkedin"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                            <img style="width: 350px;height: 500px;" src="{{asset('img/mekky.jpg')}}">
                        </div>
                        <div class="down-content">
                            <h4>{{__('messages.Eslam MekKy')}}</h4>
                            <span>{{__('messages.Backend Laravel developer')}}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** Our Team Area Ends ***** -->



    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>{{__('messages.Feedback For Us')}}</h2>
                    </div>
                    <form  action="{{route('feedback')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="{{__('messages.Your Name')}}" >
                                    @error('name')
                                    <small class="text-danger">{{$message}} </small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="email" type="email" id="email"  placeholder="{{__('messages.Your Email Address')}}" >
                                    @error('email')
                                    <small class="text-danger">{{$message}} </small>
                                    @enderror
                                </fieldset>

                            </div>
                            <br> <br> <br>
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="feedback" type="text" id="email"  placeholder="{{__('messages.Your Feedback')}}" >
                                    @error('feedback')
                                    <small class="text-danger">{{$message}} </small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-5">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>{{__('messages.Store Location')}}:<br><span>{{__('messages.Desouq Kafr-Elshikh')}}</span></li>
                                <li>{{__('messages.Phone')}}:<br><span>0100-233-7574</span></li>
                                <li>{{__('messages.Office Location')}}:<br><span>{{__('messages.Desouq Kafr-Elshikh')}}</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>{{__('messages.Work Hours')}}:<br><span>07:30 AM - 9:30 PM </span></li>
                                <li>{{__('messages.Email')}}:<br><span>eslammeky111@gmail.com</span></li>
                                <li>{{__('messages.Social Media')}}:<br><span><a href="https://www.facebook.com/eslam.meky.5623?mibextid=ZbWKwL">Facebook</a>,  <a href="https://www.linkedin.com/in/eslam-meky-246817219">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
