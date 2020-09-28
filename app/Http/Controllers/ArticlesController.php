<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{
  /*
  public function show($id) {
    $article = Article::findOrFail($id);
    return view('articles.show', ['article' => $article]);
  }
  */

  public function show(Article $article) {
    return view('articles.show', compact('article'));
  }

  public function index() {

    if (request('tag')) {
      $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
    }
    else {
      $articles = Article::latest()->get();
    }
    return view('articles.index', ['articles' => $articles]);
  }

  public function create() {
    return view('articles.create', [
      'tags'=>Tag::all()
    ]);
  }

  public function store() {
    //dump(request()->all());

    /*
    $validatedAttributes = request()->validate([
      'title' => ['required', 'min:2', 'max:255'],
      'excerpt' => 'required',
      'body' => 'required'
    ]);
    */

    /*
    $article = new Article();
    $article->title = request('title');
    $article->excerpt = request('excerpt');
    $article->body = request('body');
    $article->save();
    */

    /*
    Article::create([
      'title' => request('title'),
      'excerpt' => request('excerpt'),
      'body' => request('body')
    ]);
    */

    // Article::create($validatedAttributes);
    /*
    Article::create(request()->validate([
      'title' => ['required', 'min:2', 'max:255'],
      'excerpt' => 'required',
      'body' => 'required'
    ]));
    */

    //Article::create($this->validateArticle());
    $article = new Article($this->validateArticle());
    $article->user_id = 1;
    $article->save();

    $article->tags()->attach(request('tags'));

    return redirect('/articles');
  }

  public function edit(Article $article) {
    //$article = Article::findOrFail($id);
    //return view('articles.edit', ['article' => $article]);
    // Using compact() instead:
    return view('articles.edit', compact('article'));
  }

  public function update(Article $article) {

    $article->update($this->validateArticle());
    //return redirect('/articles/' . $article->id);
    //return redirect(route('articles.show', $article));
    return redirect($article->path());
  }

  protected function validateArticle() {
    return request()->validate([
      'title' => ['required', 'min:2', 'max:255'],
      'excerpt' => 'required',
      'body' => 'required',
      'tags' => 'exists:tags,id'
    ]);
  }
}
