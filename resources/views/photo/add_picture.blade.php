@extends('layouts.admin')
@section('title_page')
    Add Picture
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
                                Add List Photo
                            </header>
                            <div class="panel-body">

                                @if(Session::has('success'))
                                    <script>
                                        toastr.success("{{session('success')}}")
                                    </script>

                                @endif
                                <div class="position-center">
                                    @if(count($errors)>0)
                                        <div class="alert alert-danger">{{$errors->first()}}</div>
                                    @endif
                                        @if(Session::has('error'))
                                            <script>
                                                toastr.error("{{session('error')}}")
                                            </script>

                                        @endif
                                    <form role="form" action="/save_photo" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-gzroup">
                                            <label for="exampleInputEmail1">Name photo</label>
                                            <input type="file" class="form-control" id="fileImg"
                                                   name="fileImg" placeholder="Enter name category">
                                            <div class="preview">
                                                <img
                                                    src="https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg"
                                                    alt="Preview" id="img" height="100" width="100">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select name="status" class="form_control input-sm m-bot15" id="">
                                                <option value="1">Main</option>
                                                <option value="0">Extra</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product</label>
                                            <select name="product" class="form_control input-sm m-bot15" id="">
                                                @foreach($list_product as $row)
                                                    <option value="{{$row->id_product}}">{{$row->name_product}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info">Add Photo</button>
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
