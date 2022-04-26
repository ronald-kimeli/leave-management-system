<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\department;
use Illuminate\Http\Request;

class UserController extends Controller
{
      public function index()
      {
        $users = User::all();
        return view('admin.user.index',compact('users'));  
      }
      public function edit($user_id)
      {
        $user = User::find($user_id);
        return view('admin.user.edit',compact('user'));  
      }
      public function update(Request $request,$user_id)
      {
        $user = User::find($user_id);
        if($user) //we are finding user and update
        {
            $user->role_as = $request->role_as;
            $user->update();

            return redirect('admin/users')->with(['status'=>'Role Updated Successfully','status_code'=>'success']);
        }
        else
        {
            return redirect('admin/users')->with(['status'=>'No User Found','status_code'=>'error']);
        }
    
      }
}
