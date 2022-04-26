<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\leavetype;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class LeavetypeController extends Controller
{
    public function index()
    {
        $leavetype = leavetype::all();  // declare and import
        return view('admin.leavetype.index', compact('leavetype'));
    }
    public function create()
    {
        return view('admin.leavetype.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required',
            'status' => 'required'
        ]);
        $leavetype = new leavetype;
        $leavetype->leave_type = $request->input('leave_type');
        $leavetype->status = $request->status == true ? '1' : '0';
        $leavetype->save();

        return redirect('admin/leavetype')->with(['status' => 'Leave Type Added Successfully', 'status_code' => 'success']);
    }
    public function edit($id)
    {
        $leavetype = leavetype::find($id);
        return view('admin.leavetype.edit', compact('leavetype'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'leave_type' => 'required',
            'status' => 'required'
        ]);
        $leavetype = leavetype::find($id);
        $leavetype->leave_type = $request->input('leave_type');
        $leavetype->status = $request->input('status') == true ? '1' : '0';
        $leavetype->update();

        return redirect('admin/leavetype')->with(['status' => 'Updated Successfully', 'status_code' => 'success']);
    }
    public function delete($id)
    {
        $leavetype = leavetype::find($id);
        $leavetype->delete();
        return redirect('admin/leavetype')->with(['status' => 'Deleted Successfully', 'status_code' => 'success']);
    }
}
