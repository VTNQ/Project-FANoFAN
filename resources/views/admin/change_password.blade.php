@extends('layouts.admin')
@section('title_page')
    Change Password
@endsection
@section('body_content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <!-- page start-->
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                            Change Password
                            </header>
                            <div class="panel-body">
                                <div class="position-center">
                                @if (session()->has('message'))
            <div class="alert alert-success text-center" role="alert">{{ session('message') }}</div>
        @elseif(session()->has('old'))
            <div class="alert alert-danger" role="alert">{{ session('old') }}</div>
        @elseif(session()->has('accept'))
            <div class="alert alert-danger" role="alert">{{ session('accept') }}</div>

        @elseif(session()->has('same'))
            <div class="alert alert-danger" role="alert">{{ session('same') }}</div>

        @endif
                                    <form role="form" action="/change_pass" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Old Password</label>
                                            <input type="password" class="form-control" id="fileImg"
                                                   name="old_password" placeholder="Enter name category" value="{{ old('old_password') }}">
                                        @error('old_password')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="password" class="form-control" id="fileImg"
                                                   name="New_password" placeholder="Enter name category" value="{{old('New_password')}}">
                                         @error('New_password')
                                         <div class="alert alert-danger">{{$message}}</div>
                                         @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Conform Password</label>
                                            <input type="password" class="form-control" id="fileImg"
                                                   name="re_New_password" placeholder="Enter name category" value="{{old('re_New_password')}}">
                                            @error('re_New_password')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>




                                        <button type="submit" class="btn btn-info">Update Password</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                    <section class="panel">

                    </section>
                </div>
                <!-- page end-->
            </div>
        </section>
        <!-- footer -->
        <div class="footer" style="width: 100%; position: absolute;bottom: 0; text-align: center">
            <div class="wthree-copyright">
                <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>

    <!--main content end-->
    </section>
@endsection
