<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController4 extends Controller
{


  public function show(Post $post) {
    // Finds the correct post by 'slug'
    // b/c of getRouteKeyName() overridden in model
    return view('posts2', compact('post'));
  }
  /*
  public function show($slug) {

  //$post = Post::where('slug', $slug)->firstOrFail();
  //return view('posts2', [
  // 'post' => $post
  //]);

  return view('posts2', [
    'post' => Post::where('slug', $slug)->firstOrFail()
  ]);
  }
  */
}
