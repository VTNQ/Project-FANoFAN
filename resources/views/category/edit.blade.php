@extends('layouts.admin')
@section('title_page')
    Edit Category
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
                                <Edit></Edit> List category
                            </header>
                            <div class="panel-body">

                                <div class="position-center">
                                    <form method="post" role="form" action="/update/{{$category[0]->id}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name category</label>
                                            <input type="text" class="form-control" value="{{$category[0]->name}}"
                                                   id="exampleInputEmail1" name="name_category"
                                                   placeholder="Enter name category">
                                        </div>


                                        <button type="submit" class="btn btn-info">Edit Category</button>
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

            <!-- footer -->
            <div class="footer"
                 style="bottom: 0;position: absolute; width: 100%; text-align: center;">
                <div class="wthree-copyright">
                    <p>© 2023. All rights reserved | Design by <a href="/about">Favorable team</a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>

        <!--main content end-->
    </section>
@endsection
