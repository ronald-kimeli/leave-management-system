<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplyleaveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'status' =>$this->status,
            'user'=>new UserResource($this->User) ,
            'leave_type_id' =>new LeavetypeResource($this->leavetype),
            'desription' =>$this->description,
            'leave_from' =>$this->leave_from,
            'leave_to' =>$this->leave_to,
            'created_at' => $this->created_at
    ];
    }
}
