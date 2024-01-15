@extends('layouts.app')
@section('content')

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Check Our Products</h2>
                        <span>Awesome &amp; Creative </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    @include('Front.alerts.success')
    @include('Front.alerts.errors')

    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <h3 style="text-align: center">PRODUCTS</h3>
        <div class="continer">
            <form method="get" action="{{route('search_product')}}">
            <input type="text" id="search" class="mb-3 form-control" placeholder="Search name.." name="search"/>
            <a href="{{route('products')}}"
               class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Reset</a>
                   <button  class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" >search</button>
                    </form>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row">
                @isset($mens)
                    @foreach($mens as $men)
                        <div class="col-lg-4">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            {{--                                    <li><a href="{{route('singleProduct',$men->id)}}"><i class="fa fa-eye"></i></a></li>--}}
                                            <li><a href="{{route('add_to_cart',$men->id)}}"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img style="width: 300px;height: 300px" src="{{$men->photo}}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$men->name}}</h4>
                                    <h6 style="font-size: 12px; color: #4c4c4d">{{$men->description}}</h6>
                                    <span>$ {{$men->price}}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
                <div class="col-lg-12">
                    {{$mens->links()}}
                </div>
            </div>
        </div>


    </section>
{{--    @include('Front.search_product_ajax')--}}

    <!-- ***** Products Area Ends ***** -->

@endsection


