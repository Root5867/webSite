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
    	$product = Product::getProjectByCate($id);
    	if(count($product)==0){
    		Category::deleteCate($id);
    		return redirect()->back();
    	}
    	else{
    		$alert = 'Danh mục vẫn chứa sp không được xóa!';
    		return redirect()->back()->with('alert',$alert);
    	}
    }


	public function addCategories(Request $request){
		$cate = new Category();
		if($request->cateName){
			$cateName = $request->input('cateName');
			dd($cateName);
			// $description= $request->input('description');
			// $image = $request->input('image');
			$check = $cate::getCateByName($cateName);
			if($check==null){
				$cate::addCatego($cateName);
				return json_encode('1');
			}else{
				return json_encode('0');
			}
		}else{
			return view('admin.Category.addCate');
		}
	}
    


}
