<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //
     
    public function getLogin(){
		if(session('UserAdmin')!=null) {
			return redirect('admin');
		}
    	return view('admin/login');
    }
    
    public function logOut(){
        session()->forget('UserAdmin');
        return redirect('admin/login');
    }

    public function postLogin(Request $request){
        $admin = new Admin();
        $adminName = $request->adminName;
        $password = $request->password;
        $admins = $admin::checkLogin($adminName,$password);
        if($admins== null){
            $alert ="Sai mat khau hoac tai khoan";
            // return redirect()->back()
            return redirect()->back()->with('alert', $alert);
        }
        else{
            $roles = $admin::findAdminByName($adminName);
            $role = $roles->role;
            session([
				'UserAdmin'=>$adminName,
				'Role'=>$roles->role
			]);
			return redirect('admin');
        }
    }

    public function getIndex(){
        return view('admin/index');
    }

}
