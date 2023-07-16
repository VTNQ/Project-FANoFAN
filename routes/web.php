<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecycleBinController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilterController;

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
    Route::get('/search', [SearchController::class, 'Search']);
    Route::post('/contact_post', [IndexController::class, 'postContact']);
});
Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/my_account', [UserController::class, 'my_account']);
    Route::get('/history_feedback', [UserController::class, 'history_feedback']);
    Route::get('/my_account/edit_username', [UserController::class, 'EditUsername']);
    Route::get('/my_account/edit_email', [UserController::class, 'EditEmail']);
    Route::get('/my_account/edit_phone', [UserController::class, 'EditPhone']);
    Route::get('/my_account/edit_password', [UserController::class, 'EditPassword']);
    Route::post('/upload_photo', [UserController::class, 'upload_photo']);
});

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/logout', [AdminController::class, 'logout']);
});
//xu ly login xem user va pass
Route::post('/login', [AdminController::class, 'check_login']);
Route::get('/login', [AdminController::class, 'login']);
//xu y logout
Route::get('/logout', [AdminController::class, 'logout1']);
//xu ly register
Route::get('/register', [AdminController::class, 'register']);
Route::post('/add_register', [AdminController::class, 'addRegister']);

//Photo
Route::get('/add_photo', [PhotoController::class, 'add_photo']);
Route::post('/save_photo', [PhotoController::class, 'save_photo']);
//list photo
Route::get('/show_photo', [PhotoController::class, 'show_photo']);
//edit status photo
Route::get('/unlike/{id}', [PhotoController::class, 'unlike']);
Route::get('/like/{id}', [PhotoController::class, 'like']);
//delete photo
Route::get('/delete_picture/{id_photo}', [PhotoController::class, 'delete_picture']);
Route::get('/filter', [PhotoController::class, 'filter']);
Route::delete('/delete_all_photo', [PhotoController::class, 'delete_all_photo'])->name('photo.delete');


//Product
Route::get('/add_Product', [ProductController::class, 'product']);
Route::post('/add_Product', [ProductController::class, 'add_product']);
Route::get('/list_product', [ProductController::class, 'show_list_product']);
//delete product
Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);
Route::delete('/delete_all', [ProductController::class, 'delete_all'])->name('category.delete');
//edit product
Route::get('/edit_product/{id_product}', [ProductController::class, 'edit_product']);
//update product
Route::post('/update_product/{id_product}', [ProductController::class, 'update_product']);
//detail_product
Route::get('/detail_product/{id_product}', [ProductController::class, 'detail_product']);
Route::get('/Product/{id_product}', [ProductController::class, 'ShowProduct']);
Route::post('/addFeedback/{id_product}', [ProductController::class, 'addFeedback']);
Route::get('/categories_list/{id}', [ProductController::class, 'categories_list']);
Route::get('/all_product',[ProductController::class,'all_product']);
Route::delete('/delete_product', [ProductController::class, 'delete_all_product'])->name('product.delete');

Route::get('/all_product',[ProductController::class,'all_product']);
//category product
Route::post('/save_category', [CategoryController::class, 'save_category']);
//list_category
Route::get('/profile_category', [CategoryController::class, 'list_category']);
//delete category
Route::get('/delete/{id}', [CategoryController::class, 'delete']);
Route::delete('/delete_all', [CategoryController::class, 'delete_all'])->name('category.delete');
//edit category
Route::get('/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/update/{id}', [CategoryController::class, 'update']);
//
Route::get('/forgot-password', [UserEmailController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/forgot-password/{token}', [UserEmailController::class, 'forgotPasswordValidate']);
Route::post('/forgot-password', [UserEmailController::class, 'resetPassword'])->name('forgot-password');
Route::put('reset-password', [UserEmailController::class, 'updatePassword'])->name('reset-password');
Route::get('/feedback',[AdminController::class,'feedback']);

Route::get('/change_pass',[AdminController::class,'Change_pass']);
Route::post('/change_pass',[AdminController::class,'Change_password']);
//
Route::get('/recycle_bin/product',[RecycleBinController::class,'recycle_bin_product']);
Route::get('/recycle_bin/category',[RecycleBinController::class,'recycle_bin_category']);
Route::get('/recycle_bin/photo',[RecycleBinController::class,'recycle_bin_photo']);

Route::get('/recycle_bin/product/restore/{id_product}',[RecycleBinController::class,'restore_product']);
Route::get('/recycle_bin/category/restore/{id_category}',[RecycleBinController::class,'restore_category']);
Route::get('/recycle_bin/photo/restore/{id_photo}',[RecycleBinController::class,'restore_photo']);

Route::get('/recycle_bin/product/delete/{id_product}',[RecycleBinController::class,'delete_product']);
Route::get('/recycle_bin/category/delete/{id}',[RecycleBinController::class,'delete_category']);
Route::get('/recycle_bin/photo/delete/{id_photo}',[RecycleBinController::class,'delete_photo']);
