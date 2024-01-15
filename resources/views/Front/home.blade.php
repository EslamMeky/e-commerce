@extends('layouts.app')
@section('content')

<!-- ***** Main Banner Area Start ***** -->

<div class="main-banner" id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="inner-content">
                            <h4>{{__('messages.We Are MeKky Online Shopping')}}</h4>
                            <span>{{__('messages.Awesome')}}  </span>
                            <div class="main-border-button">

                            </div>
                        </div>
                        <img src="{{asset('site/images/left-banner-image.jpg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>{{__('messages.Women')}}</h4>
                                        <span>{{__('messages.Best Clothes For Women')}}</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>{{__('messages.Women')}}</h4>
                                            <p>{{__('messages.Best Clothes For Women')}}.</p>
                                            <div class="main-border-button">
                                                <a href="#women">{{__('messages.Discover More')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{asset('site/images/baner-right-image-01.jpg')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>{{__('messages.Men')}}</h4>
                                        <span>{{__('messages.Best Clothes For Men')}}</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>{{__('messages.Men')}}</h4>
                                            <p>{{__('messages.Best Clothes For Men')}}</p>
                                            <div class="main-border-button">
                                                <a href="#men">{{__('messages.Discover More')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{asset('site/images/baner-right-image-02.jpg')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>{{__('messages.Kids')}}</h4>
                                        <span>{{__('messages.Best Clothes For Kids')}}</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>{{__('messages.Kids')}}</h4>
                                            <p>{{__('messages.Best Clothes For Kids')}}</p>
                                            <div class="main-border-button">
                                                <a href="#kids">{{__('messages.Discover More')}} </a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{asset('site/images/baner-right-image-03.jpg')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>{{__('messages.Accessories')}}</h4>
                                        <span>{{__('messages.Best Trend Accessories')}}</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>{{__('messages.Accessories')}}</h4>
                                            <p>{{__('messages.Best Trend Accessories')}}</p>
                                            <div class="main-border-button">
                                                <a href="#accessories">{{__('messages.Discover More')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{asset('site/images/baner-right-image-04.jpg')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Men Area Starts ***** -->
<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>{{__("messages.Latest men's clothing")}}</h2>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @isset($mens)
                            @foreach($mens as$men)
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>

                                                <li><a href="{{route('add_to_cart',$men->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <img style="width: 300px;height: 300px"  src="{{$men->photo}}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>{{$men->name}}</h4>
                                        <span>$ {{$men->price}}</span>

                                    </div>
                                </div>
                            @endforeach
                        @endisset

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Men Area Ends ***** -->

<!-- ***** Women Area Starts ***** -->
<section class="section" id="women">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>{{__("messages.Latest women's clothing")}}</h2>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @isset($womens)
                            @foreach($womens as$women)
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>

                                                <li><a href="{{route('add_to_cart',$women->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <img style="width: 300px;height: 300px"  src="{{$women->photo}}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>{{$women->name}}</h4>
                                        <span>$ {{$women->price}}</span>

                                    </div>
                                </div>
                            @endforeach
                        @endisset

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Women Area Ends ***** -->

<!-- ***** Kids Area Starts ***** -->
<section class="section" id="kids">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>{{__("messages.The latest kid's clothing")}}</h2>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @isset($kids)
                            @foreach($kids as$kid)
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>

                                                <li><a href="{{route('add_to_cart',$kid->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <img style="width: 300px;height: 300px"  src="{{$kid->photo}}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>{{$kid->name}}</h4>
                                        <span>$ {{$kid->price}}</span>

                                    </div>
                                </div>
                            @endforeach
                        @endisset

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Kids Area Ends ***** -->

<!-- ***** accessories Area Starts ***** -->
<br>
<br>
<section class="section" id="accessories">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>{{__('messages.The latest accessories')}}</h2>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @isset($accessories)
                            @foreach($accessories as$accessory)
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>

                                                <li><a href="{{route('add_to_cart',$accessory->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <img style="width: 300px;height: 300px"  src="{{$accessory->photo}}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>{{$accessory->name}}</h4>
                                        <span>$ {{$accessory->price}}</span>

                                    </div>
                                </div>
                            @endforeach
                        @endisset

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** accessories Area Ends ***** -->

<!-- ***** Explore Area Starts ***** -->
<section class="section" id="explore">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <h2>{{__('messages.Explore Our Products')}}</h2>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p> {{__('messages.You liked our product, so you have the best other products')}}</p>
                    </div>
                    <div class="main-border-button">
                        <a href="{{route('products')}}">{{__('messages.Discover More')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="second-image">
                                <img src="{{asset('site/images/explore-image-02.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="types">
                                <h4>{{__('messages.Different Types')}}</h4>
                                <span>{{__('messages.More Than')}} {{\App\Models\SubCategory::count()}} {{__('messages.products')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Explore Area Ends ***** -->



<!-- ***** Subscribe Area Starts ***** -->
@include('Front.alerts.success')
@include('Front.alerts.errors')
<div class="subscribe" id="subscribe">
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



@endsection
