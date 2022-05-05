<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applyleave;
use App\Models\Leavetype;
use App\Models\User;
use Illuminate\Http\Request;

class ApplyleaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Applyleave::all();
        return view('admin.Applyleave.index',compact('data')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $leavetype = Leavetype::all();
        return view('Pages.Applyleave.create',['users'=>$users],['leavetype'=>$leavetype]);
    }

    public function _create()
    {
        $users = User::all();
        $leavetype = Leavetype::all();
        return view('admin.Applyleave.create',['users'=>$users],['leavetype'=>$leavetype]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'user_id'=> 'required',
            'leave_type_id'=> 'required',
            'description' => 'required',
            'leave_from' => 'required',
            'leave_to' => 'required'
        ]);

        $data = new Applyleave;
        $data->user_id = $request->input('user_id');
        $data->leave_type_id = $request->input('leave_type_id');
        $data->description = $request->input('description');
        $data->leave_from = $request->input('leave_from');
        $data->leave_to = $request->input('leave_to');
        $data->save();

        return redirect('admin/add/applyleave')->with(['status' => 'Leave Applied Successfully', 'status_code' => 'success']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=> 'required',
            'leave_type_id'=> 'required',
            'description' => 'required',
            'leave_from' => 'required',
            'leave_to' => 'required'
        ]);

        $data = new Applyleave;
        $data->user_id = $request->input('user_id');
        $data->leave_type_id = $request->input('leave_type_id');
        $data->description = $request->input('description');
        $data->leave_from = $request->input('leave_from');
        $data->leave_to = $request->input('leave_to');
        $data->save();

        return redirect('add/applyleave')->with(['status' => 'Leave Applied Successfully', 'status_code' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Applyleave::all();
        return view('Pages.Applyleave.show',compact('data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Applyleave::find($id);
        return view('admin.Applyleave.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        
        $data = Applyleave::find($id); 
        $data->status = $request->input('status');
        $data->update();

        return redirect('admin/applyleave')->with(['status' => 'Updated Successfully', 'status_code' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Applyleave::find($id);
        $data->delete();
        return redirect('admin/applyleave')->with(['status' => 'Deleted Successfully', 'status_code' => 'success']);
    }
}
