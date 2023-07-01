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
                                Add List category
                            </header>
                            <div class="panel-body">

                                <div class="position-center">
                                    <form method="post" role="form" action="/update/{{$student[0]->id}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name category</label>
                                            <input type="text" class="form-control" value="{{$student[0]->name}}"
                                                   id="exampleInputEmail1" name="name_category"
                                                   placeholder="Enter name category">
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

            <!-- footer -->
            <div class="footer" style="width: 100%; position: absolute; bottom: 0; text-align: center">
                <div class="wthree-copyright">
                    <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>

        <!--main content end-->
    </section>
@endsection
