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
                            <form action="" >
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" name="key" placeholder="Search">
                                    <span class="input-group-btn">
            <input class="btn btn-sm btn-default" type="submit" >Go!</input>
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
                                    <th>value</th>
                                    <th>status</th>
                                    <th>Approval/Deny</th>
                                    <td>Product</td>
                                    <th style="width: 30px;"></th>


                                </tr>
                                </thead>
                                @foreach($photo  as $key=> $row )


                                    <tr>
                                        <td><input type="checkbox" name="ids" class="checkbox_ids" value="{{$row->id_photo}}"></td>
                                        <td>{{++$key}}</td>
                                        <td><img src="/public/upload/{{$row->value}}" alt="" height="100" width="100"></td>
                                        <td><?php
                                                if($row->status==1){
                                                    echo 'main';
                                                }else{
                                                    echo 'extra';
                                                }
                                                ?></td>
                                        <td><span class="text-ellipsis">
        <?php
                                                if($row->status==1){
                                                    ?>
             <a href="{{ url('/unlike/'.$row->id_photo) }}"><span class="fa-solid fa-toggle-on"></span></a>
             <?php
                                                }else{
                                                    ?>

            <a href="{{ url('/like/'.$row->id_photo) }}"><span class="fa-solid fa-toggle-off"></span></a>
            <?php
                                                }
                                                    ?>

       </span>



                                        </td>
                                        <td>{{$row->name_product}}</td>
                                        <td>
                                            <a onclick="return confirm('Do you want delete this photo?')" href="{{url('/delete_picture/'.$row->id_photo)}}" ><i class="fa fa-times text-danger text"></i></a>
                                        </td>
                                @endforeach


                            </table>
                            {{$photo->links()}}
                        </div>
                    </div>
                    <footer class="panel-footer">

                    </footer>
                </div>
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
<script>
        $(function(e){
            $("#select_all_ids").click(function(){
                $('.checkbox_ids').prop('checked',$(this).prop('checked'));
            });
            $('#deleteAllSelectedRecord').click(function(e){
                e.preventDefault();
                var all_ids=[];
                $('input:checkbox[name=ids]:checked').each(function(){
                    all_ids.push($(this).val());
                })
                $.ajax({
                    url:"{{route('category.delete')}}",
                    type:'DELETE',
                    data:{
                        ids:all_ids,
                        _token:'{{csrf_token()}}'
                    },
                    success:function(response){
                        $.each(all_ids,function(key,val){
                            $('#category_ids'+val).remove();
                        })
                    }
                });
            });
        });
    </script>
        @endsection
