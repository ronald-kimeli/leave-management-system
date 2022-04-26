<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Applyleave;

class leavetype extends Model
{
    use HasFactory;

    public function Applyleave()
    {
        return $this->hasMany(Applyleave::class);
    } 

    protected $table = 'leavetypes';
    protected $fillable = ['leave_type'];
}
