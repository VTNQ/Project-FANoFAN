@extends('layouts.admin')
@section('title_page')
    Edit Product
@endsection
@section('body_content')
    <!--main content start-->
    <style>
        .btn-info {
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
            margin-left: 31vh;
        }
    </style>
    <section id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <!-- page start-->
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Edit Product
                            </header>

                            <div class="panel-body">


                                <div class="position-center">

                                    @foreach($student as $row)
                                        <form role="form" action="{{URL::to('/update_product/'.$row->id_product)}}"
                                              method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name Product</label>
                                                <input type="text" class="form-control" value="{{$row->name_product}}"
                                                       id="exampleInputEmail1" name="nameProduct"
                                                       placeholder="Enter name Product">
                                                       @error('nameProduct')
                                                       <div class="alert alert-danger">{{$message}}</div>
                                                       @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Price</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1"
                                                       value="{{$row->money}}" name="Price"
                                                       placeholder="Enter name Product">
                                                       @error('Price')
                                                       <div class="alert alert-danger">{{$message}}</div>
                                                       @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Description</label>
                                                <textarea name="description" id="ckeditor" class="ckeditor"
                                                      style="resize: none;" rows="8"
                                                      placeholder="Enter Product Description">{{$row->content}}
                                                </textarea>
                                                @error('description')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="category">category</label>
                                                <select name="category" class="form_control input-sm m-bot15" id="">
                                                    @foreach($list_category as $category)
                                                        @if($category->id==$row->id_category)
                                                            <option selected
                                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                        @else
                                                            <option
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                    @endforeach
                                </div>


                                <button type="submit" class="btn btn-info">Edit Product</button>
    </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <section class="panel">
            <div></div>
        </section>
        <!-- footer -->
        <div class="footer" style="width: 100%; position: absolute; text-align: center">
            <div class="wthree-copyright">
                <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <!--main content end-->
    </section>
@endsection
