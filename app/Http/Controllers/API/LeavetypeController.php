<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Leavetype;
use Illuminate\Http\Request;

class LeavetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leavetypes = Leavetype::all();
        return response()->json(['leavetypes'=>$leavetypes],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required'
        ]);
          $leavetype = new Leavetype();
          $leavetype->leave_type = $request->input('leave_type');
          $leavetype->save();

          return response()->json(['message'=>'Leave Type Added Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'leave_type' => 'required',
            'status' => 'required'
        ]);
        $leavetype = Leavetype::find($id);
        $leavetype->leave_type = $request->input('leave_type');
        $leavetype->status = $request->input('status') == true ? '1' : '0';
        $leavetype->update();

          return response()->json(['message'=>'Leave Type Added Successfully'],200);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leavetype = Leavetype::find($id);
        if($leavetype)
        {
            $leavetype->delete();
            return response()->json(['message'=>'Leave Type Deleted Successfully'],200);
        }
        else
        {
            return response()->json(['message'=>'No Leave Type associated with this id'],404); 
        }
    }
}
