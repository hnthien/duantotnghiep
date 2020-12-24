<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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




Route::get('/search', function () {
    return view('search');
});
Route::get('/catergories', function () {
    return view('catergories');
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

Route::get('/googled0d7ced230692106.html', function () {
    return view('googled0d7ced230692106');
});
Route::get('/sitemap', function () {
    return view('sitemap');
});

Auth::routes();


Route::get('/home', function () {
    return view('home');
});
// phần ngon phần này làm ngon nên đừng đụng vào với lại nếu làm ở phần admin thêm vào đây

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\Home@index');

    // account admin
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Admin\User@index');
        Route::get('/search', 'Admin\User@search');
        Route::get('/editt/{id}', 'Admin\User@edit');
        Route::get('/edit/{id}', 'Admin\User@edit');
        Route::post('/updata/{id}', 'Admin\User@updata');
        Route::get('/delete/{id}', 'Admin\User@delete');
    });
    //feedback
    Route::group(['prefix' => 'feedback'], function () {
        Route::get('/', 'Admin\Feedback@index');
        Route::get('/watched', 'Admin\Feedback@watched');
        Route::get('/search', 'Admin\Feedback@search');
        Route::get('/detail_feedback/{id}', 'Admin\Feedback@detail_feedback');
        Route::post('/create_feedback', 'Clients\Feedback@create_feedback');
    });
    //error
    Route::group(['prefix' => 'error'], function () {
        Route::get('/', 'Admin\Errors@index');
        Route::get('/watched', 'Admin\Errors@watched');
        Route::get('/search', 'Admin\Errors@search');
        Route::get('/detail_error/{id}', 'Admin\Errors@detail_error');
        Route::post('/create_error', 'Clients\Errors@create_error');
    });
    //post
    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'Admin\Posts@index');
        Route::get('/is_approved', 'Admin\Posts@is_approved');
        Route::get('/is_not_approved', 'Admin\Posts@is_not_approved');
        // 
        Route::get('/my_index', 'Admin\Posts@my_index');
        Route::get('/my_is_approved', 'Admin\Posts@my_is_approved');
        Route::get('/my_is_not_approved', 'Admin\Posts@my_is_not_approved');
        // 
        Route::get('/url', 'Admin\Posts@url');
        Route::get('/new_post', 'Admin\Posts@new_post');
        Route::post('/create_post', 'Admin\Posts@create_post');
        Route::get('/edit/{post_slug}/{id}', 'Admin\Posts@edit');
        Route::get('/approval/{post_slug}/{id}', 'Admin\Posts@approval');
        Route::post('/approval_updata/{id}', 'Admin\Posts@approval_updata');
        Route::post('/update/{id}', 'Admin\Posts@update');
        Route::get('/delete/{id}', 'Admin\Posts@delete');
        Route::get('/delete_my/{id}', 'Admin\Posts@delete_my');
        Route::get('/search', 'Admin\Posts@search');
    });
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Admin\Categories@index');
        Route::get('/url', 'Admin\Categories@url');
        Route::get('/new_category', 'Admin\Categories@new_category');
        Route::post('/create_category', 'Admin\Categories@create_category');
        Route::get('/new_category_branch/{id}', 'Admin\Categories@new_category_branch');
        Route::post('/create_category_branch/{id}', 'Admin\Categories@create_category_branch');
        Route::get('/edit/{slug}/{id}', 'Admin\Categories@edit');
        Route::post('/update/{slug}/{id}', 'Admin\Categories@update');
        Route::get('/delete/{id}', 'Admin\Categories@delete');
    });
    // comment
    Route::group(['prefix' => 'comment'], function () {
        Route::get('/', 'Admin\Comments@index');
         Route::get('/all_comment', 'Admin\Comments@all');
        Route::get('/detail_comment/{id}', 'Admin\Comments@detail_comment');
        Route::get('/delete_branch/{id}', 'Admin\Comments@delete');
        Route::get('/hidden/{nur}/{id}', 'Admin\Comments@hidden');
        //
       
    });
     //report
     Route::group(['prefix' => 'report'], function () {
        Route::get('/', 'Admin\Report_comment@index');
        Route::get('/hidden', 'Admin\Report_comment@hiddencomment');
        Route::get('/create_report/{id}', 'Clients\Comments@create_report');
        Route::get('/hidden/{nur}/{id}/{idd}', 'Admin\Report_comment@hidden');
        
       
    });

});
//người dùng client
Route::group(['prefix' => 'user'], function () {
    Route::get('/thong-tin-tai-khoan/{name}', function () {
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
    Route::get('/author/{name}/{id}','Clients\Home@author');
    Route::get('/change_password', 'Clients\Home@password');
    Route::post('/edit_pass', 'Clients\Home@edit_pass');
    Route::get('/logout', 'Clients\Home@logout');
    Route::post('/account', 'Clients\Home@account');
});
//News client
Route::group(['prefix' => 'comment'], function () {
    Route::get('/comment_view/{id}', 'Clients\Comments@comment_view');
    Route::post('/create_comment', 'Clients\Comments@create_comment');
    Route::post('/create_comment_branch/{id}', 'Clients\Comments@create_comment_branch');
});
Route::group(['prefix' => 'post'], function () {
    Route::get('/{url}/{id}', 'Clients\Posts@view_post');
    Route::get('/search', 'Clients\Posts@search_post');
    Route::post('/searchs', 'Clients\Posts@search_posts');
});
// category client
Route::group(['prefix' => 'category'], function () {
    Route::get('/{category_slug}/{id}', 'Clients\Posts@view_post_category');
});

// post like
Route::group(['prefix' => 'post_like'], function () {
    Route::post('/like/{id}', 'Clients\Posts_like@post_like');
    Route::get('/{id}', 'Clients\Posts_like@view_like');
});
// index
Route::get('/gioi-thieu-t20news', function () {
    return view('introduce');
});
Route::get('/chinh-sach-t20news', function () {
    return view('policy');
});
Route::get('/quy-dinh-t20news', function () {
    return view('regulations');
});
Route::get('/', 'Clients\Home@index');
Route::get('/posts/searchs/{tag}', 'Clients\Posts@search_posts_tag');

