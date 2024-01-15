@extends('layouts.app')
@section('content')

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>{{__('messages.Contact')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Contact Area Starts ***** -->
    <div class="contact-us">
        <div class="container">
            <div class="row">

                </div>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>{{__('messages.By Subscribing To Our Newsletter You Can Get 30% Off')}}</h2>
                    </div>

                    <form  action="{{route('subscribe')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">

                                <input name="name" type="text" id="name" placeholder="{{__('messages.Your Name')}}" >
                                @error('name')
                                <small class="text-danger">{{$message}} </small>
                                @enderror

                            </div>
                            <div class="col-lg-5">

                                <input name="code" type="text" id="code" placeholder="{{__('messages.Your code')}}" >
                                @error('code')
                                <small class="text-danger">{{$message}} </small>

                                @enderror

                            </div>
                            <br><br><br>
                            <div class="col-lg-5">

                                <input name="email" type="text" id="email"  placeholder="{{__('messages.Your Email Address')}}" >
                                @error('email')
                                <small class="text-danger">{{$message}} </small>

                                @enderror

                            </div>
                            <div class="col-lg-2">

                                <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>

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
                                <li>{{__('messages.Social Media')}}:<br><span><a href="#">Facebook</a>,  <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Subscribe Area Ends ***** -->

        <!-- ***** Footer Start ***** -->



        <!-- ***** Subscribe Area Ends ***** -->

@endsection
