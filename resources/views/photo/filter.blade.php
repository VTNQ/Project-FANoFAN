@extends('layouts.admin')
@section('title_page')
List Picture
@endsection
@section('body_content')
<style>
    .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
        margin-left: 3vh;
    }
</style>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manager photo
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">


                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="input-sm form-control" name="key" placeholder="Search">
                                <span class="input-group-btn">
                                    <input class="btn btn-sm btn-default" type="submit">Go!</input>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <?php

                ?>
                <div class="panel-body">
                    @if(Session::has('success'))
                    <script>
                        toastr.success("{{session('success')}}")
                    </script>

                    @endif

                    <div class="table-responsive">
                        <div class="row py-2" style="    margin-right: 1vh;">
                            <div style="float: right;">
                                <button href="" class="btn btn-danger" id="btn-confirm">Delete Multiple</button>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{url('filter')}}">
                                        <div class="row" style="margin-left: 4px;">
                                            <div class="col-md-8">
                                                <select name="roles" id="" class="form-control">
                                                    <option value="">Default</option>
                                                    <option value="1">Main</option>
                                                    <option value="0">Extra</option>
                                                </select>

                                            </div>
                                            <button type="submit" class="btn btn-primary ">FILTER</button>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped b-t b-light">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>Approval/Deny</th>
                                    <td>Product</td>
                                    <th style="width: 30px;"></th>
                                </tr>
                            </thead>
                            @foreach($photo as $key=> $row )
                            @foreach(explode('|',$row->value) as $value )
                            <tr>
                                <td>{{++$key}}</td>
                                <td><img src="{{$value}}" alt="" height="100" width="100">
                                </td>
                                <td><?php
                                    if ($row->status == 1) {
                                        echo 'main';
                                    } else {
                                        echo 'extra';
                                    }
                                    ?></td>
                                <td><span class="text-ellipsis">
                                        <?php
                                        if ($row->status == 1) {
                                        ?>
                                            <a href="{{ url('/unlike/'.$row->id_photo) }}"><span class="fa-solid fa-toggle-on"></span></a>
                                        <?php
                                        } else {
                                        ?>

                                            <a href="{{ url('/like/'.$row->id_photo) }}"><span class="fa-solid fa-toggle-off"></span></a>
                                        <?php
                                        }
                                        ?>

                                    </span>


                                </td>
                                <td>{{$row->name_product}}</td>
                                <td>
                                    <a onclick="return confirm('Do you want delete this photo?')" href="{{url('/delete_picture/'.$row->id_photo)}}"><i class="fa fa-times text-danger text"></i></a>
                                </td>
                                @endforeach
                                @endforeach
                        </table>

                    </div>
                </div>
                <footer class="panel-footer">

                </footer>
            </div>
        </div>
    </section>
    <!-- footer -->
    <div class="footer" style="width: 100%; bottom: 0; text-align: center">
        <div class="wthree-copyright">
            <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
        </div>
    </div>
    <!-- / footer -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Are you Delete</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="deleteAllSelectedRecord">Yes</button>
                    <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
                </div>
            </div>
        </div>
    </div>
    <!--main content end-->
</section>
<script>
    var modalConfirm = function(callback) {

        $("#btn-confirm").on("click", function() {
            $("#mi-modal").modal('show');
        });

        $("#modal-btn-si").on("click", function() {
            callback(true);
            $("#mi-modal").modal('hide');
        });

        $("#modal-btn-no").on("click", function() {
            callback(false);
            $("#mi-modal").modal('hide');
        });
    };

    modalConfirm(function(confirm) {
        if (confirm) {
            //Acciones si el usuario confirma
            $("#result").html("CONFIRMADO");
        } else {
            //Acciones si el usuario no confirma
            $("#result").html("NO CONFIRMADO");
        }
    });
</script>
@endsection