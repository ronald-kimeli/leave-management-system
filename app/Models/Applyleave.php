<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\leavetype;
use App\Models\User;

class Applyleave extends Model
{
    use HasFactory;

    public function leavetype()
    {
        return $this->belongsTo(leavetype::class,'leave_type_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }  
    protected $table ='applyleaves';

    protected $fillable = [
        'user_id',
        'leave_type_id',
        'description',
        'leave_from',
        'leave_to',
        'status'
        
    ];
  
}
