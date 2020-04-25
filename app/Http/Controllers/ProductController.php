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
                $alertPro ="thêm mới không thành công!!!";
                return redirect()->back()->with('alertPro', $alertPro);
			}
        }
        else{
            $category = new Category();
            $cates = $category::getCateActive();
            return view('admin/Product/addPro',compact('cates'));
        }
    }
}
