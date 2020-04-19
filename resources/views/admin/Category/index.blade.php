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
                    <table class="table " id="dataTables-example">
                        <tr align="center">
                            <th scope="col">STT</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Option</th>
                        </tr>
                        <?php $stt = 1; ?> @foreach ($cates as $cate)
                        <tr>
                            <td scope="row">{{$stt}}</td>
                            <td>{{$cate->cateName}}</td>
                            <td>{{$cate->cateName}}</td>
                            <td>
                                @if($cate->status==1)
                                <span class="label label-success">{{'Hoạt động'}}</span> @elseif($cate->status==0)
                                <span class="label label-danger">{{'Không hoạt động'}}</span> @endif
                            </td>
                            <td>{{ $cate->created_at }}</td>
                            <td>
                                <!-- edit -->
                                <a href data-id="{{$cate->id}}" class="icon-edit" data-toggle="modal" data-target="#addCate" data-id="{{$cate->id}}"><span class="btn btn-primary"> <i class="fa fa-pencil-square" aria-hidden="true"></i></span> </a>
                                <!-- delete -->
                                <a href="{{url('admin/deletecate/'.$cate->id)}}" class="icon-delete" onclick="return confirm('Bạn có muốn xóa không?');"><span class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                            </td>
                        </tr>
                        <?php $stt++; ?> @endforeach
                        <tr align="center">
                            <th scope="col">STT</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Option</th>
                        </tr>
                    </table>
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
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    var url;
    var id;
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
</script>
@endsection