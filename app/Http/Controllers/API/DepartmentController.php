<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
       if($departments)
          {
             return response()->json(['departments'=>$departments],200);
          }
        else
        {
            return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dpname' => 'required'
        ]);

        if ($validator->fails())
        {
           $errors = implode(" ", $validator->errors()->all());
           return response(['status' => 'error', 'message' => $errors]);
        }

        $user_id = Auth::user()->id;
        $role = User::where('id', $user_id)->first()->role_as;
        if ($role === 1)
        {
            $department = new Department;
            if($department)
               {
                $department->dpname = $request->input('dpname');
                $department->save();
    
                return response()->json(['message'=>'Department Added Successfully'],200);
               }
            else
               {
                return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404);   
               }
        }  
        else
        {
            return response()->json(['message' => 'Unauthorized!'],200);
        }
      
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $department = Department::find($id);
        if($department)
        {
            return response()->json(['department'=>$department],200);  
        }
        else
        {
            return response()->json(['message'=>'There is no Department Associated with this Id'],404);
        }
        
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
        $validator = Validator::make($request->all(), [
            'dpname' => 'required',
            'status' => 'required'

        ]);

        if ($validator->fails())
        {
           $errors = implode(" ", $validator->errors()->all());
           return response(['status' => 'error', 'message' => $errors]);
        }

        $user_id = Auth::user()->id;
        $role = User::where('id', $user_id)->first()->role_as;
        if ($role === 1) 
        {
            $department = Department::find($id);
            if($department)
              {
                  $department->dpname = $request->input('dpname');
                  $department->status = $request->input('status') == true ? '1' : '0';
                  $department->update();
                  
                  return response()->json(['message'=>'Department Updated Successfully'],200);
              }
            else
              {
                  return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404);  
              }
        }
        else
        {
            return response()->json(['message' => 'Unauthorized!'],200);
        }
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user_id = Auth::user()->id;
        $role = User::where('id', $user_id)->first()->role_as;
        if ($role === 1) 
        {
            $department = Department::find($id);
            if($department)
            {
                $department->delete();
                return response()->json(['message'=>'Department Deleted Successfully'],200);
            }
            else
            {
                return response()->json(['message'=>'No Department associated with this id'],404); 
            }
        }
        else
        {
            return response()->json(['message' => 'Unauthorized!'],200);  
        }
    }
}
