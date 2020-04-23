<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
            $product = new Product();
            

        }
        else{
            $category = new Category();
            $cates = $category::getCateActive();
            return view('admin/Product/addPro',compact('cates'));
        }
    }
}
