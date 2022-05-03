<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('admin.user.index', ['users' => $users]);
  }
  public function create()
  {
    $departments = Department::all();
    $users = User::all();
    return view('admin.user.create', ['departments' => $departments, 'users' => $users]);
  }
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'gender' => ['required', 'string', 'max:50'],
      'phone' => ['required', 'string', 'max:12'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'department_id' => ['required', 'integer'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = new User;
    $user->name = $request->input('name');
    $user->last_name = $request->input('last_name');
    $user->gender = $request->input('gender');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->department_id = $request->input('department_id');
    $user->password = Hash::make($request->input('password'));
    $user->save();

    return redirect('admin/add/user')->with(['status' => 'User Added Successfully', 'status_code' => 'success']);
  }

  public function edit($user_id)
  {
    $user = User::find($user_id);
    return view('admin.user.edit', compact('user'));
  }
  public function update(Request $request, $user_id)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'gender' => ['required', 'string', 'max:50'],
      'phone' => ['required', 'string', 'max:12'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'role_as' => ['required', 'integer'],
      'password' => ['required', 'string', 'min:8'],
    ]);

    $user = User::find($user_id);
    if ($user) //we are finding user and update
    {
      $user->name = $request->input('name');
      $user->last_name = $request->input('last_name');
      $user->gender = $request->input('gender');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->role_as = $request->role_as;
      $user->password = Hash::make($request->input('password'));
      $user->update();

      return redirect('admin/users')->with(['status' => 'User Updated Successfully', 'status_code' => 'success']);
    }
     else
    {
      return redirect('admin/users')->with(['status' => 'No User Found', 'status_code' => 'error']);
    }
  }
  public function destroy($user_id)
  {
    $user = User::find($user_id);
    $user->delete();
    return redirect('admin/users')->with(['status' => 'User Deleted Successfully', 'status_code' => 'success']);
  }
}
