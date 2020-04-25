<div class="modal-header">
    <h1 class="modal-title" id="exampleModalLabel">New Products</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ route('product.postAddPro') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Categoryid">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <!-- categories -->
                @foreach($cates as $cate)
                <option value="{{$cate->id}}">{{$cate->cateName}}</option>
                @endforeach
                <!--  -->
            </select>

            <label>Product Name: </label>
            <input class="form-control" name="proName" id="proName" required="" placeholder="Please Enter Category Name" />

            <label for="unit_price">Unit_price: </label>
            <input class="form-control" type="number" name="unit_price" id="unit_price" required="" placeholder="400000">

            <label for="promotion_price">Promotion_price: </label>
            <input class="form-control" type="number" name="promotion_price" id="promotion_price" required="" placeholder="400000">

            <label for="ProductImage">Image: </label>
            <input type="file"  class="form-control"  name="ProductImage" id="ProductImage">
                 
            <label for="rote">Description: </label><br>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            
            {{-- <input type="submit" class="btn btn-primary" value="save"> --}}
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary" data-id="" id="add">Lưu lại</button>
            </div>
        </div>
        <form>
</div>
{{-- <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    <button type="submit" class="btn btn-primary" data-id="" id="add">Lưu lại</button>
</div> --}}
{{-- 
<script>
    var url;
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#add').click(function(event) {
        event.preventDefault();
        url = 'admin/product/addPro';

        var proName = $('#proName').val();
        // var description = $('#description').val();
        // var category_id = $('#category_id').val();
        // var unit_price =  $('#unit_price').val();
        // var promotion_price = $('#promotion_price').val();
        // var ProductImage = $('#ProductImage').val();
        
        // console.log(ProductImage);
        // console.log(proName);
        if($.trim(proName)=='') {
          Swal.fire({
              type: 'error',
              title: 'Tên sp không được để  trống!',
          })
        } else{
          //  $.ajax({
          //     async: true,
          //     url: url,
          //     type: 'post',
          //     dataType: 'json',
          
          //     data: {
          //       proName: proName,
          //       description: description,
          //       category_id: category_id,
          //       unit_price: unit_price,
          //       promotion_price: promotion_price,
          //       ProductImage: ProductImage,
          //     },
          //   })
          //   .done(function(res) {
          //     // console.log(res);
          //     if(res==0) {
          //       Swal.fire({
          //         type: 'error',
          //         title: 'Tên sp đã có!',
          //         timer: 3000
          //       })
          //     } else if(res==1) {
          //       Swal.fire({
          //         type: 'success',
          //         title: 'Thêm mới thành công',
          //         showConfirmButton: false,
          //         timer: 3000
          //       });
          //       window.location.replace('admin/product');
          //       setTimeout(function () {
          //            window.location.replace('admin/product'); 
          //         }, 3000);
          //       }
          //   })
          //   .fail(function(XMLHttpRequest, textStatus, errorThrown) {
          //       console.log(textStatus);
          //       console.log(errorThrown);
          //   })
        }
      }); 
    });
  </script> --}}