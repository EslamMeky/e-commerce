<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo" style="color: black">
                        <img style="height: 50px; width: 50px" src="{{asset('assets/admin/images/logo/logo.png')}}">
                        MeKky

                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{route('home')}}" class="active">{{__('messages.Home')}}</a></li>
                        <li class="scroll-to-section"><a href="{{route('about')}}">{{__('messages.AboutUs')}}</a></li>
                        <li class="scroll-to-section"><a href="{{route('products')}}">{{__('messages.Products')}}</a></li>
                        <li class="scroll-to-section"><a href="{{route('contact')}}">{{__('messages.Contact')}}</a></li>
                        <li class="scroll-to-section"><a href="{{route('home')}}#explore">{{__('messages.Explore')}}</a></li>

                        <li class="submenu">
                            <a href="javascript:;">{{__('messages.lang')}}</a>
                            <ul>
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li class="scroll-to-section">
                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                        <a href="{{route('cart')}}" id="dLabel" data-toggle="dropdown"> <i class="fa fa-shopping-cart" style="font-size:20px; color: #292e31;margin-top: 10px"></i>
                        <span style="color: red;font-size: 12px">{{ count((array) session('cart')) }}</span>
                        </a>
                            <div class="dropdown-menu" aria-labelledby="dLabel">
                                <div class="row total-header-section">
                                    @php $total = 0 @endphp
                                    @foreach((array) session('cart') as $id=>$details)
                                        @php $total += $details['price'] * $details['quantity']@endphp
                                    @endforeach
                                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                        <p>Total:<span class="text-info">$ {{$total}}</span></p>
                                    </div>
                                </div>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id=>$details)
                                        <div class="row cart-detail" >
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                <img src="{{$details['photo'] }}" style="height: 50px;width: 50px"/>
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                <p>{{$details['product_name']}}</p>
                                                <span class="price text-info">$ {{$details['price']}}</span> <span class="count">Quantity:{{$details['quantity']}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{route('cart')}}" class="btn btn-primary btn-block"> View All</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="user-name text-bold-700">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>

                                <span class="avatar avatar-online">
                  <img  style="height: 30px;border-radius: 30px" src="{{\Illuminate\Support\Facades\Auth::user()->photo}}" alt="avatar"><i></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('logout')}}"><i class="ft-power"></i>
                                    LogOut </a>
                            </div>
                        </li>

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>


        </div>
    </div>
</header>
