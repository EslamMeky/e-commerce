@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> Subscribes </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Main</a>
                                </li>
                                <li class="breadcrumb-item active"> Show Subscribes
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Subscribes </h4>
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

                                @include('Admin.alerts.success')
                                @include('Admin.alerts.errors')

                                <div class="card-content collapse show overflow-auto">
                                    <div class="card-body card-dashboard">
                                        <div class="continer">

{{--                                            <input type="text" id="search" class="mb-3 form-control" placeholder="Search Here.."  name="search" />--}}

                                        </div>
                                        <div id="ajax_search_result">
                                        <table class="table display nowrap table-striped table-bordered  " >
                                            <thead>
                                            <tr>

                                                <th> NameCustomer </th>
                                                <th> email </th>
                                                <th> Code  </th>
                                                <th> Created_at</th>
                                            </tr>

                                            </thead>
                                            <tbody id="content">
                                            @isset($subs)
                                                @foreach($subs as $sub)
                                                    <tr>
                                                        <td>{{$sub->name}}</td>
                                                        <td> {{$sub->email}}</td>
                                                        <td>{{$sub->code}}</td>
                                                        <td>{{$sub->created_at}}</td>




                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $subs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
{{--   @include('search_js')--}}
@endsection

