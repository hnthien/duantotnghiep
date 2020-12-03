<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

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

//comment
Route::get('/comment', function () {
    return view('admin.comment.index');
});

Route::get('/comment/detail_comment', function () {
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

// phần ngon phần này làm ngon nên đừng đụng vào với lại nếu làm ở phần admin thêm vào đây
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'Admin\Home@index');

    // account admin
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Admin\User@index');
        Route::get('/search', 'Admin\User@search');
        Route::get('/editt/{id}', 'Admin\User@edit');
        Route::post('/edit/{id}', 'Admin\User@edit');
        Route::post('/updata/{id}', 'Admin\User@updata');
        Route::post('/delete/{id}', 'Admin\User@delete');
        Route::post('/delete_all', 'Admin\User@delete_all');
    });
    //feedback
    Route::group(['prefix' => 'feedback'], function () {
        Route::get('/', 'Admin\Feedback@index');
        Route::get('/search', 'Admin\Feedback@search');
        Route::get('/detail_feedback/{id}', 'Admin\Feedback@detail_feedback');
        Route::post('/create_feedback', 'Admin\Feedback@create_feedback');
    });
    //error
    Route::group(['prefix' => 'error'], function () {
        Route::get('/', 'Admin\Errors@index');
        Route::get('/search', 'Admin\Errors@search');
        Route::get('/detail_error/{id}', 'Admin\Errors@detail_error');
        Route::post('/create_error', 'Admin\Errors@create_error');
    });
    //post
    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'Admin\Posts@index');
        Route::get('/is_approved', 'Admin\Posts@is_approved');
        Route::get('/is_not_approved', 'Admin\Posts@is_not_approved');
        Route::get('/url', 'Admin\Posts@url');
        Route::get('/new_post', 'Admin\Posts@new_post');
        Route::post('/create_post', 'Admin\Posts@create_post');
        Route::get('/edit/{post_slug}/{id}', 'Admin\Posts@edit');
        Route::post('/update/{id}', 'Admin\Posts@update');
        Route::get('/delete/{id}', 'Admin\Posts@delete');
        Route::get('/search', 'Admin\Posts@search');
    });
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Admin\Categories@index');
        Route::get('/new_category', 'Admin\Categories@new_category');
        Route::post('/create_category', 'Admin\Categories@create_category');
        Route::get('/new_category_branch/{id}', 'Admin\Categories@new_category_branch');
        Route::post('/create_category_branch/{id}', 'Admin\Categories@create_category_branch');
        Route::get('/edit/{id}', 'Admin\Categories@edit');
        Route::post('/update/{id}', 'Admin\Categories@update');
        Route::get('/delete/{id}', 'Admin\Categories@delete');
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
    Route::get('/change_password', 'Clients\Home@password');
    // Route::post('/edit_password/{id}','Admin\Home@edit_password');
    Route::post('/edit_pass', 'AdmiClientsn\Home@edit_pass');
    // Route::get('/successfully','Admin\Home@index1');
    Route::get('/logout', 'Clients\Home@logout');
    Route::post('/account', 'Clients\Home@account');
});
//News client
Route::group(['prefix' => 'post'], function () {
    Route::get('/{url}/{id}', 'Clients\Posts@view_post');
    Route::get('/search', 'PostCClients\Postsontroller@search_post');
    Route::post('/searchs', 'Clients\Posts@search_posts');
});
// category client
Route::group(['prefix' => 'category'], function () {
    Route::get('/{category_title}/{id}', 'Clients\Posts@view_post_category');
});

// post like
Route::group(['prefix' => 'post_like'], function () {
    Route::post('/like/{id}', 'Cliens\PostLikes@post_like');
    Route::get('/{id}', 'Cliens\PostLikes@view_like');
});
// index
Route::get('/', 'Clients\Home@index');