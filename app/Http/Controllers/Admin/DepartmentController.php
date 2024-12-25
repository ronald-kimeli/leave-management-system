<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
  public function index()
  {
    $departments = Department::all();
    return view('admin.department.index', compact('departments'));
  }
  public function create()
  {
    return view('admin.department.create');
  }
  public function store(Request $request)
  {
    $request->validate([
      'dpname' => ['required', 'unique:departments'],
      'description' => ['nullable', 'string'],
    ]);
    $department = new Department;
    $department->dpname = $request->input('dpname');
    $department->description = $request->input('description');
    $department->save();

    return redirect('admin/departments')->with(['status' => 'Department Added Successfully', 'status_code' => 'success']);

  }
  public function edit($id)
  {
    $department = Department::find($id);
    return view('admin.department.edit', compact('department'));
  }
  public function update(Request $request, $id)
  {
    $request->validate([
      'dpname' => 'required|unique:departments,dpname,' . $id,
      'description' => ['nullable', 'string'],
      'status' => 'nullable'
    ]);
    $department = Department::find($id);
    $department->dpname = $request->input('dpname');
    $department->description = $request->input('description');
    $department->status = $request->input('status') == true ? '1' : '0';
    $department->update();

    return redirect('admin/departments')->with(['status' => 'Department updated successfully', 'status_code' => 'success']);
  }
  public function delete($id)
  {
    $department = Department::find($id);
    $department->delete();
    return redirect('admin/departments')->with(['status' => 'Department deleted successfully', 'status_code' => 'success']);
  }
}



