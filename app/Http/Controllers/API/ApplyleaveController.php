<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Applyleave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplyleaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $applyleaves = Applyleave::all();
            if($applyleaves)
                {
                return response()->json(['applyleaves'=>$applyleaves],200);
                }
            else
                {
                    return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404);
                }
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
            'leave_type_id'=> 'required',
            'description' => 'required',
            'leave_from' => 'required',
            'leave_to' => 'required'
        ]);

        if ($validator->fails())
        {
           $errors = implode(" ", $validator->errors()->all());
           return response(['status' => 'error', 'message' => $errors]);
        }


        $data = new Applyleave;
        if($data)
            {
            $data->user_id = Auth::user()->id;
            $data->leave_type_id = $request->input('leave_type_id');
            $data->description = $request->input('description');
            $data->leave_from = $request->input('leave_from');
            $data->leave_to = $request->input('leave_to');
            $data->save();

            return response()->json(['message'=>'Leave successfully received and is being processed'],200);
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
        $applyleave = Applyleave::find($id);
        if($applyleave)
            {
                return response()->json(['applyleave'=>$applyleave],200);
            }
        else
            {
                return response()->json(['message'=>'No Leave Found'],404);
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
            'description' => 'required',
            'leave_from' => 'required',
            'leave_to' => 'required'
        ]);

        if ($validator->fails())
        {
           $errors = implode(" ", $validator->errors()->all());
           return response(['status' => 'error', 'message' => $errors]);
        }


        $data = Applyleave::find($id);
        if($data)
            {
            $data->user_id = Auth::user()->id;
            $data->description = $request->input('description');
            $data->leave_from = $request->input('leave_from');
            $data->leave_to = $request->input('leave_to');
            $data->update();

            return response()->json(['message'=>'Leave updated successfully and is being processed'],200);
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
        $data = Applyleave::find($id);
        if($data)
        {
            $data->delete();
            return response()->json(['message'=>'You have cancelled your leave successfully. You can still apply for consideration.'],200);
        }
        else
        {
            return response()->json(['message'=>'You have no leave associated to this id'],404); 
        }
    }
}
