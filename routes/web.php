<?php
use App\Album;
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
    return view('welcome');
});


//public wesite routes
Route::get('/album/{album_name}/{year_name}', 'AlbumController@show')->name('album');
Route::get('/album/{album_name}', 'AlbumController@showDefault')->name('default_album');
Route::get('/about', 'AboutController@show')->name('about');
Route::get('/contact', function(){return view('contact'); })->name('contact');

//portal routes
Route::get('/forrestportal', function(){ return view('forrestportal.index'); })->middleware('auth');

Route::get('/forrestportal/about', 'AboutController@index')->middleware('auth');
Route::get('/forrestportal/about/{action}', 'AboutController@action')->middleware('auth');
Route::post('/forrestportal/about/{action}', 'AboutController@store')->middleware('auth');

Route::get('/forrestportal/art', 'ArtController@index')->middleware('auth');
Route::get('/forrestportal/art/{album_name}', 'ArtController@show')->middleware('auth');
Route::get('/forrestportal/art/{album_name}/{year_name}/edit', 'EditController@index')->middleware('auth');
Route::get('/forrestportal/art/{album_name}/{year_name}/edit/{action}', 'EditController@action')->middleware('auth');
Route::post('/forrestportal/art/{album_name}/{year_name}/edit/upload', 'PhotoController@store')->middleware('auth');
Route::post('/forrestportal/art/{album_name}/{year_name}/edit/delete', 'PhotoController@delete')->middleware('auth');

// Authentication Routes...
Route::get('forrestportal/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('forrestportal/login', 'Auth\LoginController@login');
Route::post('forrestportal/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('forrestportal/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('forrestportal/register', 'Auth\RegisterController@register');
// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//Route::get('/home', 'HomeController@index')->name('home');

