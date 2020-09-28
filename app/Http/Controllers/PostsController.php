<?php

namespace App\Http\Controllers;

class PostsController  {
  public function show($post) {
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
  }
}
