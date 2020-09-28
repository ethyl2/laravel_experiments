<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostsController2;
use App\Http\Controllers\PostsController3;
use App\Http\Controllers\PostsController4;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AllArticlesController;
use App\Http\Controllers\ProjectsController;


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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/vuetest', function() {
  return view('viewtest');
});

Route::get('skills', function() {
  // This will automatically be converted to a JSON response.
  return ['Laravel', 'PHP', 'JavaScript', 'React', 'Python'];
});

Route::get('/contact', function() {
  return view('contact');
});

Route::get('/template', function() {
  return view('sample');
});

Route::get('/about', function() {
  $articles = App\Models\Article::take(3)->latest()->get();
  return view('about', [
    'articles' => $articles
  ]);
});

Route::get('/abouttest', function() {
  $articles = App\Models\Article::take(2)->latest()->get();
  return $articles;
});

Route::get('/test',  function() {
  return 'Hello from Laravel Land';
});

Route::get('/test2', function() {
  return ['foo' => 'bar', 'cheese' => 'cake'];
});

Route::get('/test3', function() {
  return view('test');
});

Route::get('/names', function() {
  $name = request('name');
  return $name;
});

Route::get('/names-again', function() {
  $name = request('name');
  return view('names', [
    'name' => $name
  ]);
});

Route::get('/posts/{post}', function($post) {
  $posts = [
    'first-post' => 'Here goes nothing.',
    'second-post' => 'Here goes something.'
  ];

  if (!array_key_exists($post, $posts)) {
    abort(404, 'Sorry, that blog post cannot be found.');
  }

  return view('posts', [
    'post' => $posts[$post],
    'title' => $post
  ]);
});

//Route::get('/moreposts/{post}', 'PostsController@show');

Route::get('/moreposts/{post}', [PostsController::class, 'show']);

Route::get('/evenmoreposts/{post}', [PostsController2::class, 'show']);

Route::get('/dbposts/{post}', [PostsController3::class, 'show']);

Route::get('/modelposts/{post}', [PostsController4::class, 'show']);

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles/{article}', [ArticlesController::class, 'update']);

//Route::get('/articles', [AllArticlesController::class, 'show']);
// note: I didn't need to use this different controller;
// Used a different method in the controller, index(). See above.

Route::get('/projects/create', [ProjectsController::class, 'create']);
Route::post('projects', [ProjectsController::class, 'store']);

