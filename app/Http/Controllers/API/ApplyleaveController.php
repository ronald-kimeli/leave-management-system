<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplyleaveCollection;
use App\Models\Applyleave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use DateTime;

class ApplyleaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // Try this one or else uncomment the second one. This uses resource to show specific info
            $applyleaves = new ApplyleaveCollection(Applyleave::all());
            // $applyleaves = Applyleave::all();
            if ($applyleaves) {
                return response()->json(['applyleaves' => $applyleaves], 200);
            } else {
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
            'leave_type_id' => 'required',
            'description' => 'required',
            'leave_from' => 'required',
            'leave_to' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = implode(" ", $validator->errors()->all());
            return response(['status' => 'error', 'message' => $errors]);
        }


        $data = new Applyleave;
        if ($data) {
            $user_id = Auth::user()->id;
            $role = User::where('id', $user_id)->first()->role_as;
            if ($role == 0) $data->user_id = $user_id; // User applying, user_id should be null// picked automatically by system
            if ($role == 1) $data->user_id = $request->input('user_id'); // Admin applying, must insert role

            $data->leave_type_id = $request->input('leave_type_id');
            $data->description = $request->input('description');
            $data->leave_from = $request->input('leave_from');
            $data->leave_to = $request->input('leave_to');
            $data->save();

            return response()->json(['message' => 'Leave successfully received. You have two days to update before processing.'], 200);
        } else {
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
        if ($applyleave) {
            return response()->json(['applyleave' => $applyleave], 200);
        } else {
            return response()->json(['message' => 'No Leave Found'], 404);
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

        // if ($validator->fails())
        // {
        //    $errors = implode(" ", $validator->errors()->all());
        //    return response(['status' => 'error', 'message' => $errors]);
        // }
        
        $data = Applyleave::find($id);

        $user_id = Auth::user()->id;
        $role = User::where('id', $user_id)->first()->role_as;
        if ($role === 0) 
            {
                // declaring  values.
                $fdata = $data->created_at ;
                $account_active_days = 2;

                // calculating the expiration date.
                $account_expires = "{$fdata} + {$account_active_days} days";

                // creating objects from the two dates.
                $origin = new DateTime($fdata);
                $expire = new Datetime($account_expires);

                $today = new DateTime();
            
                if ($expire < $today)
                {
                    return response()->json(['message' => 'Your update time has expired!'],200);
                }

                if ($data)
                {
                    $user_id = Auth::user()->id;
                    $role = User::where('id', $user_id)->first()->role_as;
                    if ($role == 0) $data->user_id = $user_id; // User updating
                    
                    if ($role == 1) $data->user_id = $request->input('user_id');
    
                    // $data->leave_type_id = $request->input('leave_type_id');# I didnt wanted user to change leave_type just other details
                    $data->description = $request->input('description');
                    $data->leave_from = $request->input('leave_from');
                    $data->leave_to = $request->input('leave_to');
                    $data->update();
    
                    return response()->json(['message' => 'Leave updated successfully and is being processed'], 200);
                }
                else{
                    return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404);
                }
                 

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
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'You have cancelled your leave successfully. You can still apply for consideration.'], 200);
        } else {
            return response()->json(['message' => 'You have no leave associated to this id'], 404);
        }
    }
}
