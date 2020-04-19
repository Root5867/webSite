<div class="modal-header">
    <h1 class="modal-title" id="exampleModalLabel">Levels</h1>
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
            {{-- <label for="rote">Description: </label><br>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            <label for="image">Image: </label>
            <input type="file" name="image" id="image"> --}}
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
            // var description = $('#description').val();
            // var image = $('#image').val();
            console.log(cateName);
            if ($.trim(cateName) == '') {
                Swal.fire({
                    type: 'error',
                    title: 'Tên danh mục không được để trống!',
                })
            } else {
                $.ajax({
                        async: true,
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            cateName: cateName,
                        },
                    })
                    .done(function(res) {
                        console.log(res);
                        if (res == 0) {
                            Swal.fire({
                                type: 'error',
                                title: 'Danh muc đã có!',
                            })
                        } else if (res == 1) {
                            Swal.fire({
                                type: 'success',
                                title: 'Thêm mới thành công',
                                showConfirmButton: false,
                                timer: 2500
                            });
                            window.location.replace('admin/levels');
                            setTimeout(function() {
                                window.location.replace('admin/levels');
                            }, 3000);
                        }
                    })
                    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    })
            }
        });
    });
</script>

<script>
    var url;
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

  
  
      $('#edit').click(function(event) {
        event.preventDefault();
        // id = $(this).data('id');
        url = 'admin/category/addCate/';
        var cateName = $('#cateName').val();
        console.log(cateName);
        if($.trim(cateName)=='') {
          Swal.fire({
              type: 'error',
              title: 'Tên danh mục không được để trống!',
          })
        } else{
           $.ajax({
              // async: true,
              url: url,
              type: 'POST',
              dataType: 'json',
              data: {
                cateName: cateName,
              },
            })
            .done(function(res) {
              if(res==0) {
                Swal.fire({
                  type: 'error',
                  title: 'Tên danh mục đã có!',
                  timer: 1500
                })
              } else if(res==1) {
                Swal.fire({
                  type: 'success',
                  title: 'Cập nhập thành công',
                  showConfirmButton: false,
                  // timer: 1500
                });
                window.location.replace('categories');
                setTimeout(function () {
                     window.location.replace('categories'); 
                  }, 3000);
                }
  
  
              $('.icon-edit').click(function(event) {
                event.preventDefault();
                id = $(this).data('id');
                url = 'editcate/';
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