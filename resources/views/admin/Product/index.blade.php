@extends('admin/index') @section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">prodgory
                        <small>List</small>
                        <a href data-id="" class="icon-add" data-toggle="modal" data-target="#addprod"><span class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Addprodgory</span></a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-controller" id="search" name="search"></input>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th scope="col">STT</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">unit_price</th>
                                <th scope="col">promotion_price</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($prods)
                        <?php $stt = 1; ?> 
                            @foreach ($prods as $prod)
                                <tr>
                                    <td scope="row">{{$stt}}</td>
                                    <td align="center">
                                        <img src="{{ url('public/admin/images/bg2.jpeg') }}" alt="" srcset="" width="50px" height="50px">
                                    </td>
                                    <td>{{$prod->proName}}</td>
                                    <td>{{ $prod->unit_price }}</td>
                                    <td>{{ $prod->promotion_price }}</td>
                                    <td>{{ $prod->created_at }}</td>
                                    <td>
                                        <!-- edit -->
                                        <a href data-id="{{$prod->id}}" class="icon-edit" data-toggle="modal" data-target="#addprod" data-id="{{$prod->id}}"><span class="btn btn-primary"> <i class="fa fa-pencil-square" aria-hidden="true"></i></span> </a>
                                        <!-- delete -->
                                        <a href="{{url('/admin/prodgory/deleteprod/'.$prod->id)}}" class="icon-delete" data-title="Delete prodgory?" ><span class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                                    </td>
                                </tr>
                                <?php $stt++; ?> 
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                            <tr align="center">
                                <th scope="col">STT</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">unit_price</th>
                                <th scope="col">promotion_price</th>
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
<div class="modal fade" id="addprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        url = 'admin/prodgory/addprod';
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
        url = 'admin/prodgory/editprod/';
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
            url: '{{ URL::to('admin/prodgory/search') }}',
            data: {
                'search': $value
            },
        }).done(function(data){
            $('tbody').html(data);

            $('.icon-edit').click(function(event) {
                event.preventDefault();
                id = $(this).data('id');
                url = 'admin/prodgory/editprod/';
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