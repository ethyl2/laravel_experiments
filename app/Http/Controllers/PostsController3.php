<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController3 extends Controller
{

    public function show($slug) {
    $post = \DB::table('posts')->where('slug', $slug)->first();

    if (!$post) {
      abort(404, 'post not found, sorry');
    }

  return view('posts2', [
    'post' => $post
  ]);
  }
}
