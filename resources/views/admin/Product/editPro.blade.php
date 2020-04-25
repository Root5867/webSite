<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Product Edit</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="form-edit" method="post" action="">
        <label for="projectName">Danh mục</label>
        <select name="category_id" id="category_id" class="form-control">
            <!-- categories -->
            @foreach($cates as $cate)
            <option value="{{$cate->id}}" <?php if($prod->category_id==$cate->id){echo 'selected';} ?> >{{$cate->cateName}}</option>
            @endforeach
            <!--  -->
        </select>
        <div class="form-group">
            <label for="cateName">Product Name:</label>
            <input type="text" name="proName" id="proName" class="form-control" value="{{$prod->proName}}" required="">
        </div>
        <div class="form-group">
            <label for="unit_price">Unit_price: </label>
            <input class="form-control" type="number" name="unit_price" id="unit_price" value="{{$prod->unit_price}}" required="" placeholder="400000">
        </div>
        <div class="form-group">
            <label for="promotion_price">Promotion_price: </label>
            <input class="form-control" type="number" name="promotion_price" id="promotion_price" required="" value="{{$prod->promotion_price}}" placeholder="400000">
        </div>
        <div class="form-group">
            <label for="ProductImage">Image: </label>
            <input type="file" class="form-control" name="ProductImage" id="ProductImage"><br>
            <img src="{{ url('public/admin/images/products/'.$prod->ProductImage) }}" alt="" srcset="" width="50px" height="50px">
        </div>
        <div class="form-group">
            <label for="Description">Description:</label>
            <!-- <input type="text" name="description" id="description" class="form-control" value="{{ $prod->description }}" required=""> -->
            <textarea class="form-control" name="description" id="description" rows="3"><?php echo $prod->description  ?></textarea>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-success ">Cập nhập</button>
            <!-- <button type="submit" class="btn btn-primary" data-id="{{$prod->id}}" id="edit">Lưu lại</button> -->
        </div>

    </form>
</div>