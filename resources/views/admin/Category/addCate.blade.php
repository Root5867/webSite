<div class="modal-header">
    <h1 class="modal-title" id="exampleModalLabel">Danh mục sản phẩm</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label>Category Name: </label>
            <input class="form-control" name="cateName" id="cateName" required="" placeholder="Please Enter Category Name" />
            <br>
            <label for="rote">Description: </label><br>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            <label for="image">Image: </label>
            <input type="file" name="image" id="image">
        </div>
        <form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    <button type="submit" class="btn btn-primary" data-id="" id="add">Lưu lại</button>
</div>

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
        url = 'admin/category/addCate';

        var cateName = $('#cateName').val();
        var description = $('#description').val();
        var image = $('#image').val();
        
        // console.log(cateName);
        if($.trim(cateName)=='') {
          Swal.fire({
              type: 'error',
              title: 'Tên danh mục không được để trống!',
          })
        } else{
           $.ajax({
              async: true,
              url: url,
              type: 'GET',
              dataType: 'json',
              data: {
                cateName: cateName,
                description: description,
                image: image,
              },
            })
            .done(function(res) {
              // console.log(res);
              if(res==0) {
                Swal.fire({
                  type: 'error',
                  title: 'Tên danh mục đã có!',
                  timer: 1500
                })
              } else if(res==1) {
                Swal.fire({
                  type: 'success',
                  title: 'Thêm mới thành công',
                  showConfirmButton: false,
                  // timer: 1500
                });
                window.location.replace('admin/category');
                setTimeout(function () {
                     window.location.replace('admin/category'); 
                  }, 3000);
                }
            })
            .fail(function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
            })
        }
      }); 
    });
  </script>