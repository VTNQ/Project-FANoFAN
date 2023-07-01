@extends('layouts.admin')
@section('title_page')
    Edit Picture
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
                                    <form role="form" action="/update_photo/{$student[0]->id_photo}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name photo</label>
                                            <input type="file" class="form-control" id="fileImg" value="{{$student[0]->value}}" name="fileImg"  placeholder="Enter name catelogy">
                                            <div class="preview">
                                                <img src="/public/upload/{{$student[0]->value}}" alt="Preview" id="img" style="width: 100%; height: 100%;">
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

                                                <option value="{{$student[0]->id_product}}">{{$student[0]->name_product}}</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info">Add catelogies</button>
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
        <div class="footer">
            <div class="wthree-copyright">
                <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
@endsection

