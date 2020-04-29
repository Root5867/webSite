<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Admin;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    //
    public function getIndex(){
        $product = new Product();
        $prods = $product::getAllProduct();
        return view('admin/Product/index',compact('prods'));
    }


    public function postAddPro(Request $request){

        if($request->proName){
            // 
            $admin = new Admin();
            $product = new Product();

            $category_id = $request->input('category_id');
            $proName = $request->input('proName');
            $description = $request->input('description');
            $unit_price = $request->input('unit_price');
            $promotion_price =  $request->input('promotion_price');
            $ProductImage = $request->file('ProductImage');
            
     
            //feature image
            $ProductImageName = time().'_'.$ProductImage->getClientOriginalName();
            $ProductImage->move('public/admin/images/products',$ProductImageName);

            // put by admin_id
            $poster = $admin::findAdminByName(session('UserAdmin'));
            $posterId = $poster->id;
            		
            //
            $check = $product::getProByName($proName);
            if($check==null) {
				$product::AddProduct($proName, $description, $category_id,$unit_price, $promotion_price, $ProductImageName,$posterId);
                $alertPro ="thêm mới thành công!!!";
                return redirect()->back()->with('alertPro', $alertPro);
			}
			else {
                $errorPro ="thêm mới không thành công!!!";
                return redirect()->back()->with('errorPro', $errorPro);
			}
        }
        else{
            $category = new Category();
            $cates = $category::getCateActive();
            return view('admin/Product/addPro',compact('cates'));
        }
    }

    public function getEditPro($id){
        $category = new Category();
        $cates = $category::getCategories();
        $product = new Product();
        $prod = $product->getProductById($id);
        return view('admin/Product/edit', compact('prod','cates'));
    }

    public function postEditPro($id,Request $request){
        $admin = new Admin();
        $product = new Product();

        $category_id = $request->input('category_id');
        $proName = trim($request->input('proName'));
        $description = $request->input('description');
        $unit_price = $request->input('unit_price');
        $promotion_price =  $request->input('promotion_price');
        $ProductImage = $request->file('ProductImage');

        //feature image
        if($ProductImage!=null) {
            $ProductImageName = time().'_'.$ProductImage->getClientOriginalName();
            $ProductImage->move('public/admin/images/products',$ProductImageName);

            if(file_exists('public/admin/images/products/'.$request->input('ProductImage'))) {
                unlink('public/admin/images/products/'.$request->input('ProductImage'));
            }
        }
        else {
            $ProductImageName = $request->input('ProductImage');
        }

        // put by admin_id
        $poster = $admin::findAdminByName(session('UserAdmin'));
        $posterId = $poster->id;
                
        //check name pro
        $check = $product::getProByName($proName);
        if($check==null) {
            $product::updateProduct($id, $proName, $description, $category_id, $unit_price, $promotion_price, $ProductImageName,$posterId);
            $alertPro ="Cập nhật thành công!!!";
            return redirect('admin/product')->with('alertPro', $alertPro);
        }
        else {
            $errorPro ="Cập nhật không thành công!!!";
            return redirect('admin/product')->with('errorPro', $errorPro);
        }
    }


    public function editPro($id,Request $request){

        if($request->proName){//POST
            $admin = new Admin();
            $product = new Product();

            $category_id = $request->input('category_id');
            $proName = trim($request->input('proName'));
            $description = $request->input('description');
            $unit_price = $request->input('unit_price');
            $promotion_price =  $request->input('promotion_price');
            $ProductImage = $request->file('ProductImage');

            //feature image
            if($ProductImage!=null) {
                $ProductImageName = time().'_'.$ProductImage->getClientOriginalName();
                $ProductImage->move('public/admin/images/products',$ProductImageName);

                if(file_exists('public/admin/images/products/'.$request->input('ProductImage'))) {
                    unlink('public/admin/images/products/'.$request->input('ProductImage'));
                }
            }
            else {
                $ProductImageName = $request->input('ProductImage');
            }

            // put by admin_id
            $poster = $admin::findAdminByName(session('UserAdmin'));
            $posterId = $poster->id;
            		
            //check name pro
            $check = $product::getProByName($proName);
            if($check==null) {
				$product::updateProduct($id, $proName, $description, $category_id, $unit_price, $promotion_price, $ProductImageName,$posterId);
                $alertPro ="Cập nhật thành công!!!";
                return redirect()->back()->with('alertPro', $alertPro);
			}
			else {
                $errorPro ="Cập nhật không thành công!!!";
                return redirect()->back()->with('errorPro', $errorPro);
            }
            
        }else{//method GET
            $category = new Category();
            $cates = $category::getCategories();
            $product = new Product();
			$prod = $product->getProductById($id);
			return view('admin/Product/editPro', compact('prod','cates'));
        }
    }


    public function deletePro($id) {
		$product = new Product();
		$product::deleteProduct($id);
		return redirect()->back();
	}

}
