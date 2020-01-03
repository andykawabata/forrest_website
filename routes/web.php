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

Auth::routes();



Route::get('/album/{album_name}/{year_name}', 'AlbumController@show')->name('album');
Route::get('/album/{album_name}', 'AlbumController@showDefault')->name('default_album');

Route::get('/forrestportal/edit/{album}/{year}/{action}', 'EditController@action');
//upload form submitted
Route::post('/forrestportal/edit/{album}/{year}/upload', 'PhotoController@store');


Route::get('/forrestportal', function(){
    return view('forrestportal.index');
});
Route::get('/forrestportal/art', 'ArtController@index');
Route::get('/forrestportal/art/{album_name}', 'ArtController@show');
Route::get('/forrestportal/art/{album_name}/{year_name}/edit', 'EditController@index');
Route::get('/forrestportal/art/{album_name}/{year_name}/edit/{action}', 'EditController@action');


Route::post('/forrestportal/art/{album_name}/{year_name}/edit/upload', 'PhotoController@store');
Route::post('/forrestportal/art/{album_name}/{year_name}/edit/delete', 'PhotoController@delete');


