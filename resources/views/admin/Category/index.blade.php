@extends('admin/index') @section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>List</small>
                        <a href data-id="" class="icon-add" data-toggle="modal" data-target="#addlevel"><span class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Addlevel</span></a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-md-12">
                    <table class="table " id="dataTables-example">
                        <tr align="center">
                            <th scope="col">STT</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Home</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Option</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Trần Anh Đức</td>
                            <td>03/08/1993</td>
                            <td>Nam</td>
                            <td>Cần Thơ</td>
                            <td>Cần Thơ</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kiều Thị Thu Hằng</td>
                            <td>04/09/1991</td>
                            <td>Nữ</td>
                            <td>Vĩnh Long</td>
                            <td>Cần Thơ</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Vương Thị Lê Na</td>
                            <td>06/10/1991</td>
                            <td>Nữ</td>
                            <td>Sóc Trăng</td>
                            <td>Cần Thơ</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Dương Kim Thương</td>
                            <td>16/11/1990</td>
                            <td>Nam</td>
                            <td>Trà Vinh</td>
                            <td>Cần Thơ</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Mai Đức Hiếu</td>
                            <td>18/06/1989</td>
                            <td>Nam</td>
                            <td>Hậu Giang</td>
                            <td>Cần Thơ</td>
                        </tr>
                        <tr align="center">
                            <th scope="col">STT</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Home</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Option</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection