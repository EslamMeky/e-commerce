@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>Brands</h4>
                                            <h6 class="text-muted">Brand</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Models\MainCategory::count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>Categories</h4>
                                            <h6 class="text-muted">Category
                                            </h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Models\SubCategory::count()}} </h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>Users</h4>
                                            <h6 class="text-muted">User</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Models\User::count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- Candlestick Multi Level Control Chart -->

                <!-- Sell Orders & Buy Order -->

                <div class="row match-height">
                    <div class="col-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Orders </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted">Cash On Delivery</p>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table display nowrap table-striped table-bordered  ">
                                        <thead>
                                        <tr>
                                            <th> Num Order </th>
                                            <th> Items </th>
                                            <th> quy </th>
                                            <th> Price </th>
                                            <th> Name </th>
                                            <th> Mobile </th>
                                            <th> Address </th>
                                            <th> Status </th>
                                            <th> Created_at </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @isset($orders)
                                            @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->items}}</td>
                                            <td>{{$order->quy}}</td>
                                            <td>$ {{$order->total}}</td>
                                            <td>{{$order->order->users->name}}</td>
                                            <td>{{$order->order->users->mobile}}</td>
                                            <td>{{$order->order->users->address}}</td>
                                            <td>{{$order->status}}</td>
                                            <td>{{$order->created_at}}</td>

                                        </tr>
                                        </tbody>
                                        @endforeach
                                        @endisset
                                    </table>
                                    <div class="justify-content-center d-flex">
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/ Sell Orders & Buy Order -->



                <!-- Active Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">



                            <section id="dom">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Active Category </h4>
                                                <a class="heading-elements-toggle"><i
                                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                                <div class="heading-elements">
                                                    <ul class="list-inline mb-0">
                                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="card-content collapse show">
                                                <div class="card-body card-dashboard">
                                                    <table class="table display nowrap table-striped table-bordered  ">
                                                        <thead>
                                                        <tr>
                                                            <th> Name  </th>
                                                            <th> Brand </th>
                                                            <th> photo </th>
                                                            <th> Status </th>
                                                            <th> Created</th>
                                                            <th> Updated </th>
                                                        </tr>

                                                        </thead>
                                                        <tbody>
                                                        @isset($categories)
                                                            @foreach($categories as $category)
                                                                <tr>
                                                                    <td>{{$category->name_en}}</td>
                                                                    <td> {{$category->mainCategory->name_en}}</td>
                                                                    <td><img style="width: 100px;height: 100px" src="{{$category->photo}}"></td>
                                                                    <td>{{$category->getactive()}}</td>
                                                                    <td>{{$category->created_at}}</td>
                                                                   <td>{{$category->updated_at}}</td>


                                                                </tr>
                                                            @endforeach
                                                        @endisset
                                                        </tbody>
                                                    </table>
                                                    <div class="justify-content-center d-flex">
                                                        {{ $categories->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
