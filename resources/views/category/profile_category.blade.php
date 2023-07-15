@extends('layouts.admin')
@section('title_page')
    Category
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
                                Manager category
                            </header>
                            <div class="panel-body">

                                @if(Session::has('success'))
                                    <script>
                                        toastr.success("{{session('success')}}")
                                    </script>

                                @endif
                                <div class="position-center">

                                    <form role="form" action="/save_category" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name Category</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                   name="name_category" placeholder="Enter name category">
                                            <br>
                                            @error('name_category')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>


                                        <button type="submit" class="btn btn-info">Add Category</button>
                                    </form>
                                </div>

                            </div>
                        </section>

                    </div>
                    <section class="panel">
                        <div class="col-sm-3" style="float: right;">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" name="key" placeholder="Search">
                                    <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit">Go!</button>
          </span>
                                </div>
                            </form>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-8 pb-2">
                                <button href="" class="btn btn-danger" id="btn-confirm">Delete Multiple</button>
                            </div>
                        </div>
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th><input type="checkbox" name="" id="select_all_ids"></th>
                                <th>#</th>
                                <th>Name Category</th>

                                <th style="width: 30px;"></th>
                            </tr>
                            </thead>
                            <?php
                                $url = $_SERVER['REQUEST_URI'];
                                $string = substr($url, 23);
                                $item=(int)$string;
                                $i = $item ? ($item -1)*5 + 1 : 1;
                            ?>
                            @foreach($all_list_login as $key=> $row )

                                <tr id="{{$row->id}}">
                                    <td><input type="checkbox" name="ids[]" class="checkbox_ids" value="{{$row->id}}"></td>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>
                                        <a href="{{url('/edit/'.$row->id)}}" class="active" ui-toggle-class=""><i
                                                class="fas fa-edit"></i></a><a href="{{url('/delete/'.$row->id)}}"
                                                                                onclick="return confirm('Are you want to delete category?')">
                                            <i class="fa fa-times text-danger text"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </section>
                </div>
                {{$all_list_login->links()}}

                <!-- page end-->
            </div>
        </section>
        <!-- footer -->
        <div class="footer" style="width: 100%;bottom: 0; text-align: center">
            <div class="wthree-copyright">
                <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>

    <!--main content end-->
    <form action="/save_category"></form>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="mi-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Are you Delete</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="deleteAllSelectedRecord">Yes</button>
                    <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#deleteAllSelectedRecord').on('click',function () {
            var ids = [];

            $('.checkbox_ids').on('click', function() {
                if ($(this).prop('checked')) {
                    ids.push($(this).val());
                } else {
                    ids.splice(ids.indexOf($(this).val()), 1);
                }
            });
            $.ajax({
                url: "{{route('category.delete_all')}}",
                type: 'PUT',
                data: {
                    ids: ids,
                },
                success: function(response) {
                    // Close the modal and show a success message
                    $("#mi-modal").modal('hide');
                    alert(response);
                }
            });
        });
    </script>
    <script>
        var modalConfirm = function (callback) {

            $("#btn-confirm").on("click", function () {
                $("#mi-modal").modal('show');
            });

            $("#modal-btn-si").on("click", function () {
                callback(true);
                $("#mi-modal").modal('hide');
            });

            $("#modal-btn-no").on("click", function () {
                callback(false);
                $("#mi-modal").modal('hide');
            });
        };

        modalConfirm(function (confirm) {
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
