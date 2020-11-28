<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Post;
use App\Category;
use App\Comment;
use App\Feedback;
use App\User;
use App\Error;
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

Route::get('/search', function () {
    return view('search');
});
Route::get('/catergories', function () {
    return view('catergories');
});
Route::get('/author', function () {
    return view('author');
});
Route::get('/article_with_the_author', function () {
    return view('article_with_the_author');
});
Route::get('/article_with_the_author', function () {
    return view('article_with_the_author');
});
Route::get('/account', function () {
    return view('account');
});
Route::get('/404', function () {
    return view('404');
});
//admin
Route::get('/admin', function () {
    if (Auth::check()) {
        if (Auth::user()->role_user == 0) {
            return redirect(url('/'));
        } else {
            $category = Category::all();
            $feedback = Feedback::all();
            $error = Error::all();
            $user = User::all();
            $post =  Post::orderBy('post_id', 'DESC')->take(6)->get();
            return view('admin.index', compact('post', 'category', 'user', 'feedback', 'error'));
        }
    } else {
        return redirect(url('/login'));
    }
});
//news

//comment
Route::get('/comment', function () {
    return view('admin.comment.index');
});

Route::get('/admin/comment/detail_comment', function () {
    return view('admin.comment.detail_comment');
});
//feedback

//report
Route::get('/report', function () {
    return view('admin.report.index');
});

Route::get('/report/detail_report', function () {
    return view('admin.report.detail_report');
});
//error


Auth::routes();


Route::get('/home', function () {
    return view('home');
});
// phần ngon phần này làm ngon nên đừng đụng vào với lại nếu làm ở phần admin thêm vào đây
Route::group(['prefix' => 'admin'], function () {


    // account admin
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Admin_UserController@index');
        Route::get('/search', 'Admin_UserController@search');
        Route::get('/editt/{id}', 'Admin_UserController@edit');
        Route::post('/edit/{id}', 'Admin_UserController@edit');
        Route::post('/updata/{id}', 'Admin_UserController@updata');
        Route::post('/delete/{id}', 'Admin_UserController@delete');
        Route::post('/delete_all', 'Admin_UserController@delete_all');
    });
    //feedback
    Route::group(['prefix' => 'feedback'], function () {
        Route::get('/', 'FeedbackController@index');
        Route::get('/search', 'FeedbackController@search');
        Route::get('/detail_feedback/{id}', 'FeedbackController@detail_feedback');
        Route::post('/create_feedback', 'FeedbackController@create_feedback');
    });
    //error
    Route::group(['prefix' => 'error'], function () {
        Route::get('/', 'ErrorController@index');
        Route::get('/search', 'ErrorController@search');
        Route::get('/detail_error/{id}', 'ErrorController@detail_error');
        Route::post('/create_error', 'ErrorController@create_error');
    });
    //post
    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'PostController@index');
        Route::get('/url', 'PostController@url');
        Route::get('/new_post', 'PostController@new_post');
        Route::post('/create_post', 'PostController@create_post');
        Route::get('/edit/{post_slug}/{id}', 'PostController@edit');
        Route::post('/update/{id}', 'PostController@update');
        Route::get('/delete/{id}', 'PostController@delete');
        Route::get('/search', 'PostController@search');
    });
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index');
        Route::get('/new_category', 'CategoryController@new_category');
        Route::post('/create_category', 'CategoryController@create_category');
        Route::get('/new_category_branch/{id}', 'CategoryController@new_category_branch');
        Route::post('/create_category_branch/{id}', 'CategoryController@create_category_branch');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/update/{id}', 'CategoryController@update');
        Route::get('/delete/{id}', 'CategoryController@delete');
    });
    // comment
    Route::group(['prefix' => 'comment'], function () {
        Route::get('/', 'CommentController@index');

        // Route::get('/new_category', 'CategoryController@new_category');
        Route::post('/create_comment', 'CommentController@create_comment');
        // Route::get('/new_category_branch/{id}', 'CategoryController@new_category_branch');
        // Route::post('/create_category_branch/{id}', 'CategoryController@create_category_branch');
        // Route::get('/edit/{id}', 'CategoryController@edit');
        // Route::post('/update/{id}', 'CategoryController@update');
        // Route::get('/delete/{id}', 'CategoryController@delete');
    });

});
//người dùng client
Route::group(['prefix' => 'user'], function () {
    Route::get('/profile/{name}', function () {
        return view('account');
    });
    //
    Route::get('/successful', function () {
        return view('successful');
    });
    Route::get('/logged', function () {
        return view('logged');
    });
    Route::get('/register', function () {
        return view('register');
    });
    Route::get('/dong-gop-y-kien', function () {
        return view('feedback');
    });
    Route::get('/change_password', 'HomeController@password');
    // Route::post('/edit_password/{id}','HomeController@edit_password');
    Route::post('/edit_pass/{id}', 'HomeController@edit_pass');
    // Route::get('/successfully','HomeController@index1');
    Route::get('/logout', 'HomeController@logout');
    Route::post('/account', 'HomeController@account');
});
//News client
Route::group(['prefix' => 'post'], function () {
    Route::get('/{url}/{id}', 'PostController@view_post');
});
// category client
Route::group(['prefix' => 'category'], function () {
    Route::get('/{category_title}/{id}', 'PostController@view_post_category');
});
Route::group(['prefix' => 'category_branch'], function () {
    Route::get('/{category_title}/{id}', 'PostController@view_post_category_branch');
});
// index
Route::get('/', function () {
    $category = Category::all();
    $user = User::all();
    $post =  Post::orderBy('post_id', 'DESC')->get();
    return view('index', compact('post', 'category', 'user'));
});

// comment
// giờ mi tạo model để kết nói csdl rồi
//  đén tạo route bên web.php này xong dẫn
//  link bên chỗ form inset coment vô