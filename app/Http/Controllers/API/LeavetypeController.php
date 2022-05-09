<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Leavetype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        if($leavetypes)
        {
            return response()->json(['leavetypes'=>$leavetypes],200);
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
            'leave_type' => 'required'
        ]);

        if ($validator->fails())
        {
           $errors = implode(" ", $validator->errors()->all());
           return response(['status' => 'error', 'message' => $errors]);
        }

          $leavetype = new Leavetype();

          if($leavetype)
          {
            $leavetype->leave_type = $request->input('leave_type');
            $leavetype->save();
            
            return response()->json(['message'=>'Leave Type Added Successfully'],200);
          }
          else
          {
            return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404); 
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
        $leavetype = Leavetype::find($id);
        if ($leavetype) 
        {
            return response()->json(['leavetype' => $leavetype], 200);
        } 
        else 
        {
            return response()->json(['message' => 'No Leave Type associated with this id'], 404);
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
            'leave_type' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails())
        {
           $errors = implode(" ", $validator->errors()->all());
           return response(['status' => 'error', 'message' => $errors]);
        }


        $leavetype = Leavetype::find($id);
        if($leavetype)
            {
                $leavetype->leave_type = $request->input('leave_type');
                $leavetype->status = $request->input('status') == true ? '1' : '0';
                $leavetype->update();
        
                  return response()->json(['message'=>'Leave Type Added Successfully'],200);
            }
            else
            {
                return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404); 
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
