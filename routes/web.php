<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\FormController;
use App\Models\Post;
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

Route::get('/', function (){
    return view('welcome');
});
Route::post('/webhook', [WebhookController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/posts', function () {
    $posts = Post::all();
    return view('home', compact('posts'));
});
Route::get('post/{slug}', function($slug){
    $post = Post::where('slug', '=', $slug)->firstOrFail();
    return view('post', compact('post'));
});
Route::get('/bandomiji-forma', function (){
    return view('form');
});
Route::get('form/{puslapis}',[FormController::class, 'show']);