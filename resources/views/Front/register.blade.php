@extends('layouts.login')
@section('title','Login')
@section('content')
    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-8 col-8 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{asset('assets/admin/images/logo/logo.png')}}" width="100" height="100" class="img" alt="LOGO"/>

                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span> Register </span>
                        </h6>
                    </div>
                    @include('Front.alerts.errors')
                    @include('Front.alerts.success')
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('saveUser')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input name="id" value="" type="hidden">

                                <div class="form-group">

                                    <label> User Photo  </label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="file" name="photo">
                                        <span class="file-custom"></span>
                                    </label>
                                    @error('photo')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-body">

                                    <h4 class="form-section"><i class="ft-home"></i> Data User </h4>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">Name  </label>
                                                <input type="text" value="" id="name"
                                                       class="form-control"
                                                       placeholder=" Enter Name  "
                                                       name="name">
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="projectinput1"> Email  </label>
                                                <input type="text"  id="name"
                                                       class="form-control"
                                                       placeholder=" Enter Email  "
                                                       value=""
                                                       name="email">
                                                @error("email")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="projectinput1"> Mobile User </label>
                                            <input type="text"  id="name"
                                                   class="form-control"
                                                   placeholder=" Enter Mobile  "
                                                   value=""
                                                   name="mobile">
                                            @error("mobile")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="projectinput1"> Address  </label>
                                                <input type="text"  id="name"
                                                       class="form-control"
                                                       placeholder=" Enter Mobile  "
                                                       value=""
                                                       name="address">
                                                @error("address")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="projectinput1"> Password  </label>
                                                <input type="password"  id="name"
                                                       class="form-control"
                                                       placeholder=" Enter Password "
                                                       value=""
                                                       name="password">
                                                @error("password")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="projectinput1"> Confirm Password  </label>
                                                <input type="password"  id="name"
                                                       class="form-control"
                                                       placeholder=" Enter Confirm the Password "
                                                       value=""
                                                       name="con_password">
                                                @error("con_password")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions">

                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i>Register
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
