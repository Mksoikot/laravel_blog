<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //Login View
    public function Login(){
        return view('bakend.login');
    }
    function Submit_login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
    $usercheck=Admin::where(['email'=>$request->email,'password'=>$request->password])->count();
    if($usercheck > 0){
        return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error','Invalied Email/Password!!');
        }
    }
    function Dashboard(){
        return view('bakend.dashboard');
    }
}
