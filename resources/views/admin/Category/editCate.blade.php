<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form id="form-edit" method="post" action="">
  	<div class="form-group">
    	<label for="cateName">Category Name:</label>
    	<input type="text" name="cateName" id="cateName" class="form-control" value="{{$cate->cateName}}" required="">
    </div>
    <div class="form-group">
      <label for="Description">Description:</label>
      <input type="text" name="description" id="description" class="form-control" value="{{ $cate->description }}" required="">
    </div>
  	<div class="form-group">
  		<label class="label label-success" for="active" >Hoạt động</label>
  		<input type="radio" class="status" id="active" value="1" name="status" <?php if($cate->status==1){echo 'checked';} ?> >
  		<label class="label label-danger" for="unactive">Không hoạt động</label>
  		<input type="radio" class="status" id="unactive" value="0" name="status" <?php if($cate->status==0){echo 'checked';} ?> >
  	</div>
  </form>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  <button type="submit" class="btn btn-primary" data-id="{{$cate->id}}" id="edit">Lưu lại</button>
</div>
<script>
  var url;
  var status;
  var checkbox = $('.status');
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    for(var i = 0; i < checkbox.length; i++) {
      if (checkbox[i].checked === true){
        status = checkbox[i].value;
      //  console.log(status);
      }
    }

    $('.status').click(function(event) {
      for(var i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked === true){
          status = checkbox[i].value;
        //  console.log(status);
        }
      }
    });


    $('#edit').click(function(event) {
      event.preventDefault();
      id = $(this).data('id');
      url = 'admin/category/editCate/';
      var cateName = $('#cateName').val();
      var description = $('#description').val();
      edit
      console.log(cateName);

      if($.trim(cateName)=='') {
        Swal.fire({
            type: 'error',
            title: 'Tên danh mục không được để trống!',
        })
      } else{
         $.ajax({
            async: true,
            url: url+id,
            type: 'POST',
            dataType: 'json',
            data: {
              cateName: cateName,
              description: description,
              status: status
            },
          })
          .done(function(res) {
            if(res==0) {
              Swal.fire({
                type: 'error',
                title: 'Tên danh mục đã có!',
                timer: 3000
              })
            } else if(res==1) {
              Swal.fire({
                type: 'success',
                title: 'Cập nhập thành công',
                showConfirmButton: false,
                timer: 3000
              });
              window.location.replace('admin/category');
                setTimeout(function () {
                     window.location.replace('admin/category'); 
                  }, 3000);
                }


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
          })
      }
    }); 
  });
</script>