<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applyleave;
use App\Models\Department;
use App\Models\Leavetype;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $departments = Department::count();
        $leavetypes = Leavetype::count();
        $leaves = Applyleave::count();
        $users = User::where('role_as', '0')->count();
        $admins = User::where('role_as', '1')->count();
        return view('admin.dashboard', compact('departments', 'leavetypes', 'leaves', 'users', 'admins'));
    }
}
