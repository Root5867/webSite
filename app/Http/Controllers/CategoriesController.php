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
			$category = new Category();
			$cateName = $request->input('cateName');
			$description= $request->input('description');
			// $image = $request->input('image');
			//check Name category
			$check = $category::getCateByName($cateName);
			if($check==null) {
				$category::addCate($cateName,$description);
				return json_encode('1');
			}
			else {
				return json_encode('0');
			}
		}else{
			return view('admin/Category/addCate');
		}
	}

	//edit category
	public function editCate($id, Request $request) {//editCate
		$category = new category();

		if($request->cateName){
			$cateName = trim($request->cateName);
			$description = $request->description;
			$status = $request->status;

			$check = $category::getCateByNameDifId($id, $cateName);
			if($check != null){
				return json_encode('0');
			}
			else {
				$category::updateCate($id, $cateName,$description, $status);
	    		// $cates = $category::getCategories();
	    		return json_encode('1');
			}
		}
		else {
			$category = new category();
			$cate = $category->getCateById($id);
			return view('admin/Category/editCate', compact('cate'));
		}

	}

	public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $category = Category::where('cateName', 'LIKE', '%' . $request->search . '%')->paginate(5);
            if ($category) {
                foreach ($category as $key => $category) {
					$output .= 
					'<tr>
						<td>' . $category->id . '</td>
						<td>' . $category->cateName . '</td>
						<td>' . $category->cateName . '</td>
						<td>' . $category->status . '</td>
						<td>' . $category->created_at . '</td>
						<td>
						<a href data-id="'.$category->id.'" class="icon-edit" data-toggle="modal" data-target="#addCate" data-id="'.$category->id.'"><span class="btn btn-primary"> <i class="fa fa-pencil-square" aria-hidden="true"></i></span> </a>
						<a href="http://localhost/webSite/admin/category/deletecate/'.$category->id.'" class="icon-delete"><span class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
						
						</td>
                    </tr>';
                }
            }
            
            return Response($output);
        }
    }

    


}
