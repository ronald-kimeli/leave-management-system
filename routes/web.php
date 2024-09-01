<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeavetypeController;
use App\Http\Controllers\Admin\ApplyleaveController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about'); //Gets whats inside pages controller
Route::get('/users/{id}/{comp}', 'PagesController@users');
// Route::get('/users/{id}/{comp}', function ($id,$comp) {
//     return 'User is:'.$id.'<br>'.'Company Name:'.$comp;
// });

// Apply Leave on Frontend
Route::get('add/applyleave', [ApplyleaveController::class, 'create']);
Route::post('add/applyleave', [ApplyleaveController::class, 'store']);
Route::get('show/applyleave', [ApplyleaveController::class, 'show']);
Route::get('edit/applyleave/{id}', [ApplyleaveController::class, '_edit']);
Route::put('update/applyleave/{id}', [ApplyleaveController::class, '_update']);


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

//  Route::get('/register', [RegisterController::class, 'create'])->name('auth.register');
//  Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {   //,'isAdmin'
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin/dashboard');
  Route::get('category', [CategoryController::class, 'index']);
  Route::get('add/category', [CategoryController::class, 'create']);
  Route::post('add_category', [CategoryController::class, 'store']);
  Route::get('edit_category/{category_id}', [CategoryController::class, 'edit']);
  Route::put('update_category/{category_id}', [CategoryController::class, 'update']);
  Route::delete('delete_category/{category_id}', [CategoryController::class, 'delete']);

  // Leavetype inside admin panel
  Route::get('leavetype', [LeavetypeController::class, 'index']);

  Route::get('add/leavetype', [LeavetypeController::class, 'create']);
  Route::post('add/leavetype', [LeavetypeController::class, 'store']);
  Route::get('edit/leavetype/{id}', [LeavetypeController::class, 'edit']);
  Route::put('update/leavetype/{id}', [LeavetypeController::class, 'update']);
  Route::delete('delete/leavetype/{id}', [LeavetypeController::class, 'delete']);

  //users inside admin panel
  Route::get('users', [UserController::class, 'index']);
  Route::get('add/user', [UserController::class, 'create']);
  Route::post('add/user', [UserController::class, 'store']);
  Route::get('user/{user_id}/edit', [UserController::class, 'edit']);
  Route::put('update_user/{user_id}', [UserController::class, 'update']);
  //  Don't Integrate delete User. It brings error when trying to access leaves, especially when he/she had applied for leave
  //Route::delete('delete/user/{user_id}',[UserController::class,'destroy']);

  // Leave Types Routes
  Route::get('applyleave', [ApplyleaveController::class, 'index']);
  Route::get('add/applyleave', [ApplyleaveController::class, '_create']);// contructed create for admin
  Route::post('add/applyleave', [ApplyleaveController::class, 'register']);// store in admin contsructed
  Route::get('edit/applyleave/{id}', [ApplyleaveController::class, 'edit']);
  Route::put('update/applyleave/{id}', [ApplyleaveController::class, 'update']);
  Route::delete('delete/applyleave/{id}', [ApplyleaveController::class, 'delete']);

  // Department Routes inside admin
  Route::get('departments', [DepartmentController::class, 'index']);
  Route::get('add/department', [DepartmentController::class, 'create']);
  Route::post('store/department', [DepartmentController::class, 'store']);
  Route::get('edit/department/{id}', [DepartmentController::class, 'edit']);
  Route::put('update/department/{id}', [DepartmentController::class, 'update']);
  // Route::get('delete_department/{id}', 'departmentcontroller@delete']);
  Route::delete('delete/department/{id}', [DepartmentController::class, 'delete']);
});



