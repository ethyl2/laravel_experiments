<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class AllArticlesController extends Controller
{
  public function show() {

    $articles = Article::latest()->get();
    return view('articles.showAll', ['articles' => $articles]);
  }
};
