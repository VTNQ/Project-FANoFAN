<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CeilingFanController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserEmailController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('/')->group(function () {
    Route::get('/', [IndexController::class, 'index']);
    Route::get('/about', [IndexController::class, 'about']);
    Route::get('/contact', [IndexController::class, 'contact']);
    Route::get('/search', [SearchController::class, 'search']);
    Route::get('/ceiling_fan', [CeilingFanController::class, 'ShowProduct']);
});
Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/my_account', [UserController::class, 'my_account']);
    Route::get('/history_feedback', [UserController::class, 'history_feedback']);
    Route::get('/my_account/edit_username', [UserController::class, 'EditUsername']);
    Route::get('/my_account/edit_email', [UserController::class, 'EditEmail']);
    Route::get('/my_account/edit_password', [UserController::class, 'EditPassword']);
});
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
//xu ly login xem user va pass
Route::post('/login', [AdminController::class, 'check_login']);
Route::get('/login', [AdminController::class, 'login']);
//xu y logout
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::get('/logout', [AdminController::class, 'logout1']);
//xu ly register
Route::get('/register', [AdminController::class, 'register']);
Route::post('/add_register', [AdminController::class, 'addRegister']);
//category product

Route::post('/save_category', [CategoryController::class, 'save_category']);
//list_category
Route::get('/profile_category', [CategoryController::class, 'list_category']);
//Photo
Route::get('/add_photo', [PhotoController::class, 'add_photo']);
Route::post('/save_photo', [PhotoController::class, 'save_photo']);
//list photo
Route::get('/show_photo', [PhotoController::class, 'show_photo']);
//edit status photo
Route::get('/unlike/{id}', [PhotoController::class, 'unlike']);
Route::get('/like/{id}', [PhotoController::class, 'like']);
//Product
Route::get('/add_Product', [ProductController::class, 'product']);
Route::post('/add_Product', [ProductController::class, 'add_product']);
Route::get('/list_product', [ProductController::class, 'show_add_product']);
//page products index
Route::get('/category', [CategoryController::class, 'index']);
//delete category
Route::get('/delete/{id}',[CategoryController::class,'delete']);
Route::delete('/delete_all',[CategoryController::class,'delete_all'])->name('category.delete');
//edit category
Route::get('/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/update/{id}', [CategoryController::class, 'update']);
//delete photo
Route::get('/delete_picture/{id_photo}', [PhotoController::class, 'delete_picture']);
//bonus_photo
Route::post('/bonus_photo', [ProductController::class, 'bonus_photo']);
//delete product
Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);
//edit product
Route::get('/edit_product/{id_product}', [ProductController::class, 'edit_product']);
//update product
Route::post('/update_product/{id_product}', [ProductController::class, 'update_product']);
//detail_product
Route::get('/detail_product/{id_product}', [ProductController::class, 'detail_product']);
Route::get('/CeilingFan', [CeilingFanController::class, 'ShowProduct1']);
Route::get('/CeilingFan/{id_product}', [CeilingFanController::class, 'ShowProduct']);
Route::post('/addFeedback/{id_product}', [CeilingFanController::class, 'addFeedback']);
//
Route::get('/forgot-password', [UserEmailController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/forgot-password/{token}', [UserEmailController::class, 'forgotPasswordValidate']);
Route::post('/forgot-password', [UserEmailController::class, 'resetPassword'])->name('forgot-password');

Route::put('reset-password', [UserEmailController::class, 'updatePassword'])->name('reset-password');
//
Route::get('categories_list/{id}', [CeilingFanController::class, 'categories_list']);
Route::get('/filter_product',[ProductController::class,'filter_product']);
Route::post('/account',[UserController::class,'upload_photo']);
Route::post('/filter-feedback-by-date',[AdminController::class,'filter_feedback_by_date']);