@extends('admin/index') @section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>List</small>
                        <a href data-id="" class="icon-add" data-toggle="modal" data-target="#addCate"><span class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> AddCategory</span></a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-md-12">
                    <div class="row">
                        <div id="searchDiv">
                            <label for="search">Search: </label>
                            <input type="text"  id="search" name="search" placeholder="tìm kiếm theo danh mục ......">
                        </div>
                    </div>
                  
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($cates)
                        <?php $stt = 1; ?> 
                            @foreach ($cates as $cate)
                                <tr>
                                    <td scope="row">{{$stt}}</td>
                                    <td>{{$cate->cateName}}</td>
                                    <td>{{$cate->cateName}}</td>
                                    <td>
                                        @if($cate->status==1)
                                        <span class="label label-success">{{'active'}}</span> @elseif($cate->status==0)
                                        <span class="label label-danger">{{'inactive'}}</span> @endif
                                    </td>
                                    <td>{{ $cate->created_at->format('H:i:s m/d/Y ') }}</td>
                                    <td>
                                        <!-- edit -->
                                        <a href data-id="{{$cate->id}}" class="icon-edit" data-toggle="modal" data-target="#addCate" data-id="{{$cate->id}}"><span class="btn btn-primary"> <i class="fa fa-pencil-square" aria-hidden="true"></i></span> </a>
                                        <!-- delete -->
                                        <a href="{{url('/admin/category/deletecate/'.$cate->id)}}" class="icon-delete" data-title="Delete Category?" ><span class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                                    </td>
                                </tr>
                                <?php $stt++; ?> 
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                            <tr align="center">
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Option</th>
                            </tr>
                        </tfoot>
                    </table>
                    <script>
                  
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addCate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>

<script>
     var url;
    var id;
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

  
    $('.icon-add').click(function(event) {
        event.preventDefault();
        url = 'admin/category/addCate';
        $.ajax({
            url: url,
            type: "GET",
        }).done(function(res) {
            $('.modal-content').html(res);
        });
    });
    
   
    $('.icon-edit').click(function(event) {
        event.preventDefault();
        id = $(this).data('id');
        url = 'admin/category/editCate/';
        $.ajax({
            url: url + id,
            type: 'GET',
        })
        .done(function(res) {
            $('.modal-content').html(res);
        })
    });
    $('a.icon-delete').confirm({
        content: "Bạn có muốn xóa không?",
    });

 
    $('#search').on('keyup',function(){
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/category/search') }}',
            data: {
                'search': $value
            },
        }).done(function(data){
            $('tbody').html(data);

            $('.icon-edit').click(function(event) {
                event.preventDefault();
                id = $(this).data('id');
                url = 'admin/category/editCate/';
                $.ajax({
                    url: url + id,
                    type: 'GET',
                })
                .done(function(res) {
                    $('.modal-content').html(res);
                })
            });

            $('a.icon-delete').confirm({
                content: "Bạn có muốn xóa không?",
            });


        });

       
    });
</script>



@endsection