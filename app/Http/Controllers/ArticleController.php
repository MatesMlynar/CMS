<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Zobraz seznam článků seřazený podle abecedy.
     *
     * @return View
     */
    public function index():View
    {
        return view('article.index', ['articles'=> Article::orderBy('title')->get()]);
    }

    /**
     * Zobraz formulář pro vytváření nového článku.
     *
     * @return View
     */
    public function create():View
    {
        return view('article.create');
    }

    /**
     * Zvaliduj odeslaná data přes formulář a vytvoř nový článek.
     *
     * @param  Request $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $article->description = $request->input('description');
        $article->content = $request->input('content');
        $article->save();

        /*nebo je také možnost vytvořit nový modul pomocí řádku níže*/
        /*Article::create($request->all());*/

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article): View
    {
        return view('article.show', ['article' => $article]);
    }

    /**
     * Zobraz formulář pro editaci článku a předej danému pohledu načtený článek.
     *
     * @param  Article $article
     * @return View
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article]);
    }

    /**
     * Zvaliduj odeslaná data přes formulář a uprav načtený článek.
     *
     * @param  UpdateRequest $request
     * @param  Article $article
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article) : RedirectResponse
    {
        try {
            $article->delete();
        } catch(\Exception $exception){
            return redirect()->back()->withErrors(['Při procesu odstranění článku došlo k chybě']);
        }


        return redirect()->route('article.index');
    }
}
