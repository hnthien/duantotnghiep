<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
    if (Auth::check())
    {
        if(Auth::user()->role_user == 0){
            return redirect(url('/'));
        }else{
            return view('admin.index');
            // return redirect()->action('HomeController@admin');
        }
    } else {
        return redirect(url('/login'));
    }
});

//user


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
//category
Route::get('/category',function(){
    return view('admin.category.index');
});
Route::get('/category/edit',function(){
    return view('admin.category.edit');
});
Route::get('/category/new_category',function(){
    return view('admin.category.new_category');
});
//comment
Route::get('/comment',function(){
    return view('admin.comment.index');
});

Route::get('/comment/detail_comment',function(){
    return view('admin.comment.detail_comment');
});
//feedback

//report
Route::get('/report',function(){
    return view('admin.report.index');
});

Route::get('/report/detail_report',function(){
    return view('admin.report.detail_report');
});
//error


Auth::routes();


Route::get('/home',function(){
    return view('home');
});
// phần ngon phần này làm ngon nên đừng đụng vào với lại nếu làm ở phần admin thêm vào đây
Route::group(['prefix'=>'admin'],function(){
    // account admin
    Route::group(['prefix'=>'user'],function(){
            Route::get('/','Admin_UserController@index');
            Route::get('/search','Admin_UserController@search');
            Route::post('/edit/{id}','Admin_UserController@edit');
            Route::post('/updata/{id}','Admin_UserController@updata');
            Route::post('/delete/{id}','Admin_UserController@delete');
            Route::post('/delete_all','Admin_UserController@delete_all');
    });
    //feedback
    Route::group(['prefix'=>'feedback'],function(){
        Route::get('/','FeedbackController@index');
        Route::get('/search','FeedbackController@search');
        Route::get('/detail_feedback/{id}','FeedbackController@detail_feedback');
        Route::post('/create_feedback','FeedbackController@create_feedback');
   
    });
   //error
   Route::group(['prefix'=>'error'],function(){
    Route::get('/','ErrorController@index');
    Route::get('/search','ErrorController@search');
    Route::get('/detail_error/{id}','ErrorController@detail_error');
    Route::post('/create_error','ErrorController@create_error');
    });
});
//người dùng client
Route::group(['prefix'=>'user'],function(){
    Route::get('/profile/{name}', function(){
        return view('account');
    });
    //
    Route::get('/successful',function(){
        return view('successful');
    });
    Route::get('/logged',function(){
        return view('logged');
    });
    Route::get('/register',function(){
        return view('register');
    });
    Route::get('/dong-gop-y-kien',function(){
        return view('feedback');
    });
    Route::get('/change_password','HomeController@password');
    // Route::post('/edit_password/{id}','HomeController@edit_password');
    Route::post('/edit_pass/{id}','HomeController@edit_pass');
    // Route::get('/successfully','HomeController@index1');
    Route::get('/logout','HomeController@logout');
    Route::post('/account','HomeController@account');

});
