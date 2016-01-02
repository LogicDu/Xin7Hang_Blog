<?php

namespace App\Http\Controllers;

use App\Article;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $options = OverallSetup::getOption('site_name');
        $articles = Article::latest()->published()->where('status','!=','2')->get();
        $categorys = Category::all();
        $tags = Tag::all();
        return view('index.index',compact('articles','categorys','tags'));

    }

    public function manage_index()
    {
        $this->checkAuth();
        $articles = Article::latest()->where('status','!=','2')->get();
        return view('admin/articleslist',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkAuth();
        $cate_array = Category::lists('name','id');
        $tags = Tag::lists('name','id');

        return view('admin/createarticle',compact('cate_array','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateArticleRequest $request)
    {
        $input = $request->all();
        $input['intro'] = mb_substr($request->get('content'),0,255);
        $input['tags'] = Tag::namesToIds($request->input('tag'));
        $article = Article::create($input);
        $article->tags()->attach($request->input('tags'));
        return redirect('/articles/articleslist');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $article->readed_num = $article->readed_num + 1;
        $article->save();
        return view('articles.show',compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkAuth();
        $article = Article::findOrFail($id);
        $cate_array = Category::lists('name','id');
        $tags = Tag::lists('name','id');
        return view('admin.editarticle',compact('article','cate_array','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateArticleRequest $request, $id)
    {
        $this->checkAuth();
        $article = Article::findOrFail($id);
        $input = $request->all();
        $input['intro'] = mb_substr($request->get('content'),0,255);
        $input['tags'] = Tag::namesToIds($request->input('tag'));
        $article->update($input);
        $article->tags()->sync($input['tags']);

        return redirect('/articles/articleslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkAuth();
        $article = Article::findOrFail($id);
        $article->status = 2;
        $article->save();
        return redirect('articles/articleslist');
    }

    private function checkAuth()
    {
        if (Auth::check() == false)
        {
            abort(404);
        }
    }

    public function like($id,Request $request)
    {

        $article = Article::findOrFail($id);
        $article->like_num = $article->like_num + 1;
        $article->save();
        return ['like_num'=>$article->like_num ];
    }
}
