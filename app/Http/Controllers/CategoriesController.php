<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoriesController extends Controller
{
	
    public function getCategories() {
    	$cate = new Category();
    	$cates = $cate::getCategories();
    	return view('admin.Category.index', compact('cates'));
    }

    //
    public function deleteCate($id) {
		$product = Product::getProductById($id);
		// dd($product);
    	if($product ==Null){
    		Category::deleteCate($id);
    		return redirect()->back();
    	}
    	else{
    		$alert = 'Danh mục vẫn chứa sp không được xóa!';
    		return redirect()->back()->with('alert',$alert);
    	}
    }


	public function postAddCate(Request $request) {

		if($request->cateName){
			$category = new Category;
			$cateName = $request->input('cateName');
			$description= $request->input('description');
			$image = $request->input('image');
			//check Name category
			$check = $category::getCateByName($cateName);
			if($check==null) {
				$category::addCate($cateName,$description,$image);
				return json_encode('1');
			}
			else {
				return json_encode('0');
			}
		}else{
			return view('admin/Category/addCate');
		}
	}

    


}
