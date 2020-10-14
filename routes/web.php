<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/registration', function () {
    return view('registration');
});
Route::get('/search', function () {
    return view('search');
});
Route::get('/catergories',function(){
    return view('catergories');
});
Route::get('/author',function(){
    return view('author');
});
Route::get('/article_with_the_author',function(){
    return view('article_with_the_author');
});
Route::get('/article_with_the_author',function(){
    return view('article_with_the_author');
});
Route::get('/account',function(){
    return view('account');
});
Route::get('/404',function(){
    return view('404');
});
//admin
Route::get('/admin',function(){
    return view('admin.index');
});
//user
Route::get('/user',function(){
    return view('admin.user.index');
});
Route::get('/user/edit',function(){
    return view('admin.user.edit');
});
Route::get('/user/new_user',function(){
    return view('admin.user.new_user');
});
//post
Route::get('/post',function(){
    return view('admin.post.index');
});
Route::get('/post/edit',function(){
    return view('admin.post.edit');
});
Route::get('/post/new_post',function(){
    return view('admin.post.new_post');
});
