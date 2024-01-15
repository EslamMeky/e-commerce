@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> Sub Category </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Main</a>
                                </li>
                                <li class="breadcrumb-item active"> Show SubCategory
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
                                    <h4 class="card-title">All SubCategory </h4>
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

                                                <input type="text" id="search" class="mb-3 form-control" placeholder="Search Here.."  name="search" />
                                                <a href="{{route('show.subCategory')}}"
                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Reset</a>

                                        </div>
                                        <div id="ajax_search_result">
                                        <table class="table display nowrap table-striped table-bordered  " >
                                            <thead>
                                            <tr>
                                                <th> Name Arabic </th>
                                                <th> Name English </th>
                                                <th> photo </th>
                                                <th> Status </th>
                                                <th> Main Category </th>
                                                <th> price </th>
                                                <th> Description Arabic </th>
                                                <th> Description English </th>
                                                <th> Options </th>
                                            </tr>

                                            </thead>
                                            <tbody id="content">
                                            @isset($categories)
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{$category->name_ar}}</td>
                                                        <td> {{$category->name_en}}</td>
                                                        <td><img style="width: 100px;height: 100px" src="{{$category->photo}}"></td>
                                                        <td>{{$category->getactive()}}</td>
                                                        <td>{{$category->mainCategory->name_en}}</td>
                                                        <td>{{$category->price}} $</td>
                                                        <td>{{$category->description_ar}}</td>
                                                        <td>{{$category->description_en}}</td>


                                                        <td>

                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('edit.subCategory',$category->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                                                                <a href="{{route('delete.subCategory',$category->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
                                                                <a href="{{route('changeStatus.subCategory',$category->id)}}"
                                                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">@if($category->active==0)On @else Off @endif </a>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $categories->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
   @include('search_js')
@endsection

