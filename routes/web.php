<?php

use App\Http\Controllers\admin\AdminUserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\post\CatogaryController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\post\TagController;
use App\Models\Permission;
use App\Models\Role;
use Faker\Guesser\Name;

/**
 * admin redirect middleware
 */
Route::group(['middleware'   => 'admin.redirect'], function(){

//   admin route

Route::get('admin-login', [LoginController::class, 'showLogin'])->name('admin.login');
Route::post('admin-login-system', [LoginController::class, 'loginSystem'])->name('admin.login.system');
Route::get('admin-register', [LoginController::class, 'showReg'])->name('admin.reg');
Route::post('admin-register', [LoginController::class, 'store'])->name('admin.reg.store');

});




/**
 * admin middleware
 */
Route::group(['middleware' => 'admin'], function(){

//   admin  route

    Route::get('admin-dashboard', [DashboardController::class, 'showDashboard'])-> name('admin.dashboard');
    Route::get('admin-logout', [LoginController::class, 'logoutSystem'])->name('admin.logout.system');

//   permission route

Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission');
Route::post('permission-get', [PermissionController::class, 'store'])->name('permission.store');
Route::get('permission-delete/{id}', [PermissionController::class, 'destroy'])->name('permission.delete');
Route::get('permission-edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
Route::post('permission-update/{id}', [PermissionController::class, 'update'])->name('permission.update');


//   role route

Route::get('role', [RoleController::class, 'index'])->name('admin.role');
Route::post('role', [RoleController::class, 'store'])->name('role.store');
Route::get('role-delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
Route::get('role-edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::post('role-update/{id}', [RoleController::class, 'update'])->name('role.update');


//   admin user route

Route::get('admin-user', [AdminUserController::class, 'index'])->name('admin.user');
Route::post('admin-create', [AdminUserController::class, 'create'])->name('admin.user.create');
Route::get('admin-user-delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.user.delete');
Route::get('admin-user-edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
Route::post('admin-user-update/{id}', [AdminUserController::class, 'updateAdmin'])->name('admin.user.update');

// profile route

Route::get('admin-user-profile', [ProfileController::class, 'showProfile'])->name('admin.user.profile');
Route::post('admin-user-profile-photo-upload/{id}',[ProfileController::class, 'uploadPhoto'])->name('admin.user.profile.upload.photo');
Route::post('admin-user-password-change/{id}', [ProfileController::class, 'changePassword'])->name('admin.user.password.change');


// tag route

Route::get('post-tag', [TagController::class, 'index'])->name('post.tag');
Route::post('post-tag', [TagController::class, 'create'])->name('post.create');
Route::get('post-tag-delete/{id}', [TagController::class, 'destroy'])->name('post.tag.delete');
Route::get('post-tag-edit/{id}', [TagController::class, 'edit'])->name('post.tag.edit');
Route::post('post-tag-update/{id}', [TagController::class, 'update'])->name('post.tag.update');


// category route

Route::get('post-category', [CatogaryController::class, 'index'])->name('post.category');
Route::post('post-category', [CatogaryController::class, 'store'])->name('post.category.store');
Route::get('post-category-delete/{id}', [CatogaryController::class, 'destroy'])->name('post.category.delete');
Route::get('post-category-edit/{id}', [CatogaryController::class, 'edit'])->name('post.category.edit');
Route::post('post-category-edit/{id}', [CatogaryController::class, 'update'])->name('post.category.update');


// post route

Route::get('post', [PostController::class, 'index'])->name('post.index');
Route::get('post-create', [PostController::class, 'create'])->name('post.create');





});
