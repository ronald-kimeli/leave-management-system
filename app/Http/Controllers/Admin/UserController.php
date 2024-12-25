<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('admin.user.index', ['users' => $users]);
  }

  public function show()
  {
    $user = Auth::user();
    return view('auth.profile.show', compact('user'));
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

  public function updateProfile(Request $request)
  {
    $user_id = Auth::user()->id;
    $user = User::findOrFail($user_id); // Ensure the user exists

    $request->validate([
      'name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users,email,' . $user_id,
      'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Update user attributes
    $user->fill([
      'name' => $request->input('name'),
      'last_name' => $request->input('last_name'),
      'email' => $request->input('email'),
    ]);

    // Handle profile picture upload
    if ($request->hasFile('profile_picture')) {
      // Delete old profile picture if exists
      if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
        unlink(public_path('profile_pictures/' . $user->profile_picture));
      }

      // Save new profile picture
      $file = $request->file('profile_picture');
      $filename = time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('profile_pictures'), $filename);
      $user->profile_picture = $filename;
    }

    // Save updated user
    $user->save();

    return redirect()->route('profile')->with(['status' => 'Profile updated successfully.', 'status_code' => 'success']);
  }
  // public function update(Request $request, $user_id)
  // {
  //   $request->validate([
  //     'name' => ['required', 'string', 'max:255'],
  //     'last_name' => ['required', 'string', 'max:255'],
  //     'gender' => ['required', 'string', 'max:50'],
  //     'phone' => ['required', 'string', 'max:12'],
  //     'email' => ['required', 'string', 'email', 'max:255'],
  //     'role_as' => ['required', 'integer'],
  //     'password' => ['required', 'string', 'min:8'],
  //   ]);

  //   $user = User::find($user_id);
  //   if ($user) //we are finding user and update
  //   {
  //     $user->name = $request->input('name');
  //     $user->last_name = $request->input('last_name');
  //     $user->gender = $request->input('gender');
  //     $user->phone = $request->input('phone');
  //     $user->email = $request->input('email');
  //     $user->role_as = $request->role_as;
  //     $user->password = Hash::make($request->input('password'));
  //     $user->update();

  //     return redirect('admin/users')->with(['status' => 'User Updated Successfully', 'status_code' => 'success']);
  //   } else {
  //     return redirect('admin/users')->with(['status' => 'No User Found', 'status_code' => 'error']);
  //   }
  // }


  public function update(Request $request, $user_id)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'gender' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string', 'max:12'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'role_as' => ['required', 'integer'],
        'password' => ['nullable', 'string', 'min:8'],
    ]);

    $user = User::find($user_id);
    if ($user) {
        // Update user attributes
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->gender = $request->input('gender');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->role_as = $request->input('role_as');

        // Only update the password if a new one is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->update();

        return redirect('admin/users')->with(['status' => 'User Updated Successfully', 'status_code' => 'success']);
    } else {
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
