@extends('layouts.admin')
@section('title_page')
    Detail Product
    @endsection
    @section('body_content')<!DOCTYPE html>
    <!--main content start-->
    <style>
        button.btn.btn-outline-primary {
            float: left;
            margin-top: 10px;
            color: white;

            background-color: dodgerblue;
            /* color: whitesmoke; */
            margin-left: -14px;
        }
    </style>

    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <a href="/list_product">
                            <button type="button" class="btn btn-outline-primary">Back</button>
                        </a>
                        Detail Product
                    </div>

                    <?php

                    ?>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm=12 col-md-12">
                                <div class="form-group">
                                    <strong>Name Product:</strong>
                                    {{$data->name_product}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-sm=12 col-md-12">
                                <div class="form-group">
                                    <strong>Money:</strong>
                                    {{$data->money}}$
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-sm=12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    @foreach($data1 as $row)
                                        <img src="/public/upload/{{$row->value}}" alt="" width="200px">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm=12 col-md-12">
                                <div class="form-group">
                                    <strong>category Product:</strong>
                                    {{$data->name}}
                                </div>
                            </div>

                        </div>

                    </div>
                    <footer class="panel-footer">

                    </footer>
                </div>
            </div>
        </section>
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
