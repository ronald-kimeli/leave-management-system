<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
  public function index()
  {
     $departments = Department::all();
      return view('Pages.department.index',compact('departments'));
  }
  public function create()
  {
    return view('Pages.department.create');
  }
  public function store(Request $request)
{
  $request->validate([
    'dpname' => 'required'
]);
  $department = new Department;
  $department->dpname = $request->input('dpname');
  $department->save();

  return redirect('department')->with(['status'=>'Department Added Successfully','status_code'=>'success']);

}
public function edit($id)
{
  $department = Department::find($id);
  return view('Pages.department.edit', compact('department'));
}
public function update(Request $request, $id)
{
  $request->validate([
    'dpname' => 'required',
    'status' => 'nullable'
]);
  $department = Department::find($id);
  $department->dpname = $request->input('dpname');
  $department->status = $request->input('status') == true ? '1':'0';
  $department->update();

  return redirect('department')->with(['status'=>'Updated Successfully','status_code'=>'success']);
}
public function delete($id)
{
  $department = Department::find($id);
  $department->delete();
  return redirect('department')->with(['status'=>'Deleted Successfully','status_code'=>'success']);


}


}



