@extends('layouts.admin')
@section('title_page')
Add Product
@endsection
@section('body_content')
<!--main content start-->
<style>
    button.btn.btn-info {
        margin-left: 28vh;
    }

    button.btn.btn-info {
        margin-left: 0vh;
        margin-top: 4vh;
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
                            Add List Product
                        </header>
                        <div class="panel-body">


                            <div class="position-center">
                                @if(Session::has('success'))
                                <script>
                                    toastr.success("{{session('success')}}")
                                </script>

                                @endif

                                <form role="form" action="/add_Product" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name Product</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="nameProduct" placeholder="Enter name Product">
                                        @error('nameProduct')
                                        <div class="alert alert-danger">Please Enter name Product</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="Price" placeholder="Enter name Product">
                                        @error('Price')
                                        <div class="alert alert-danger">Please Enter Money again</div>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Description</label>
                                        <textarea name="description" id="ckeditor" class="ckeditor" style="resize: none;" rows="8" placeholder="Enter Product Description"></textarea>
                                        @error('description')
                                        <div class="alert alert-danger">Please Enter Description Again</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>

                                        <select name="category" class="form_control input-sm m-bot15" id="">
                                            @foreach($list_category as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                    <div class="mb-3">
                                        <label for="MultipleFile" class="form-label">
                                            Main
                                        </label>
                                        <input class="form-control" type="file" name="Main" id="MultipleFile">
                                        @error('Main')
                                        <div class="alert alert-danger">Please upload Image main</div>

                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="MultipleFile" class="form-label">
                                            Extra
                                        </label>
                                        <input class="form-control" type="file" id="file" name="file[]" multiple="multiple" value="{{ old('file.*') }}">
                                        @error('file*')
                                        <div class="alert alert-danger">Upload Extra error</div>
                                        @enderror


                                    </div>
                                    <button type="submit" class="btn btn-info">Add Product</button>
                                </form>
                            </div>

                        </div>
                    </section>

                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Photo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <div class="position-center">

                                    <form role="form" action="/bonus_photo" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name photo</label>
                                            <input type="file" class="form-control" id="fileImg" accept="image/*" name="fileImg" placeholder="Enter name category">
                                            <div class="preview">
                                                <img src="https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg" alt="Preview" id="img" style="width: 100%; height: 100%;">
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
                                            <select name="product" class="form_control input-sm m-bot15" id="" style="width: 36vh;">
                                                @foreach($list_product as $row)
                                                <option value="{{$row->id_product}}">{{$row->name_product}}</option>
                                                @endforeach
                                            </select>

                                        </div>



                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="">Send message</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
</section>

<!--main content end-->

<script>
    CKEDITOR.replace('ckeditor');
</script>

@endsection
