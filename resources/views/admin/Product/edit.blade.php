@extends('admin/index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<h2 class="main-title-w3layouts mb-2 text-center">Sửa dự án</h2>
				<div class="col-md-12">
					<form method="post" enctype="multipart/form-data" class="row">
						@csrf
						<div class="form-group col-md-6">
							<label for="projectName">Danh mục</label>
							<select name="category_id" id="category_id" class="form-control">
								<!-- categories -->
								@foreach($cates as $cate)
								<option value="{{$cate->id}}"
									<?php if($prod->category_id==$cate->id){echo 'selected';} ?>>
									{{$cate->cateName}}</option>
								@endforeach
								<!--  -->
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="cateName">Product Name:</label>
							<input type="text" name="proName" id="proName" class="form-control"
								value="{{$prod->proName}}" required="">
						</div>
						<div class="form-group col-md-6">
							<label for="ProductImage">Ảnh</label>
							<input type="hidden" name="ProductImage" value="{{$prod->ProductImage}}">
							<img width="30%" src="{{asset('public/admin/images/products/'.$prod->ProductImage) }}" alt="">
							<input type="file" name="ProductImage" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="unit_price">Unit_price: </label>
							<input class="form-control" type="number" name="unit_price" id="unit_price" value="{{$prod->unit_price}}" required="" placeholder="400000">
						</div>
						<div class="form-group col-md-6">
							<label for="promotion_price">Promotion_price: </label>
							<input class="form-control" type="number" name="promotion_price" id="promotion_price" required="" value="{{$prod->promotion_price}}" placeholder="400000">
						</div>
						<div class="form-group col-md-12">
							<label for="Description">Description:</label>
							<!-- <input type="text" name="description" id="description" class="form-control" value="{{ $prod->description }}" required=""> -->
							<textarea class="form-control" name="description" id="description"
								rows="3"><?php echo $prod->description  ?></textarea>
						</div>
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-success form-control">Cập nhập</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection