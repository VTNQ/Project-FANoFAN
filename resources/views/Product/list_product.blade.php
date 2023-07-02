@extends('layouts.admin')
@section('title_page')
    Product
@endsection
@section('body_content')
    <!--main content start-->
    <style>
        .col-md-3 {
            margin-top: 1vh;
        }
    </style>
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manager Product
                    </div>
                    <div class="row w3-res-tb">
                        <div class="col-sm-5 m-b-xs">

                        </div>
                        <div class="col-sm-4">
                        </div>
                        <form action="" role="form">
                            <div class="input-group">
                                <input type="text" class="input-sm form-control" name="key" placeholder="Search">
                                <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit">Go!</button>
          </span>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        @if(Session::has('success'))
                            <script>
                                toastr.success("{{session('success')}}")
                            </script>

                        @endif

                        <form action="/filter_product" method="get">
                            <div class="row" style="margin-left: 1vh;">

                                <label>Filter by product</label>

                                <select name="date" id="form-select">
                                    @foreach($list_product as $key=> $row )
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </form>
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>category</th>
                                <th>money</th>
                                <th>view</th>
                                <th style="width: 30px;"></th>


                            </tr>
                            </thead>
                            @foreach($list_product as $key=> $row )

                                <tr>
                                    <td>{{++$key}}</td>


                                    <td>{{$row->name_product}}</td>

                                    <td>{{$row->name}}</td>
                                    <td>{{$row->money}}$</td>
                                    <td><a href="{{url('/detail_product/'.$row->id_product)}}">
                                            <button class="btn btn-sm btn-secondary">view</button>
                                        </a></td>
                                    <td>
                                        <a href="{{url('/edit_product/'.$row->id_product)}}" class="active"
                                           ui-toggle-class=""><i class="fas fa-edit"> </a></i><a
                                            href="{{url('/delete_product/'.$row->id_product)}}"
                                            onclick="return confirm('Are you want to delete product?')"> <i
                                                class="fa fa-times text-danger text"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        {{$list_product->links()}}
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
