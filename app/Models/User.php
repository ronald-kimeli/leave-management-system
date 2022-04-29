<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Department;
use App\Models\Applyleave;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function Applyleave()
    {
        return $this->hasMany(Applyleave::class);
    }
  //,'department_id'

  //   should be available on
  //$table->Integer('department_id');
           // Removed from add_department_id_to_users_table --table=users
        //$table->unsignedInteger('department_id')->nullable();

       // $table->foreign('department_id')->references('id')->on('departments');

    protected $table = 'users';

    protected $fillable = [
        'department_id',
        'name',
        'last_name',
        'gender',
        'phone',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
    ];



}

