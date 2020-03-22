<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ModifyPasswordController extends Controller
{
    //
    
    public function index() {
        $id = Auth::id();
        return view('modifyPassword',['id'=>$id]);
    }
    
    public function update(Request $request,$id)
    {

        $old_pw = $request->old_pw;
        $new_pw = $request->new_pw;
        $new_pw_again = $request->new_pw_again;
        
        $user = User::find($id);
        if (!Hash::check($old_pw,$user->password)){
            return back()->withErrors(['旧密码错误']);
        }
        
        if ($new_pw != $new_pw_again) {
            return back()->withErrors(['两次密码不一致']);
        }
        
        $res = User::where('id',$id)->update(['password'=>Hash::make($new_pw)]);
        if($res){
            return back()->with('success','修改密码成功');
        }else{
            return back()->withErrors(['修改密码失败']);
        }
    }
}
