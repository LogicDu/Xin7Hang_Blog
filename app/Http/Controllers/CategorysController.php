<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::where('status','!=','2')->get();
        return view('admin.categorylist',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(Auth::check());
        $this->checkAuth();
        return view('admin.createcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateCategoryRequest $request)
    {
        $this->checkAuth();
        Category::create($request->all());

        return redirect('categorys');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $articles = Article::latest()->published()->incategory($id)->get();
        return view('category.show',compact('category','articles'));
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
        $category = Category::findOrFail($id);

        return view('admin.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateCategoryRequest $request, $id)
    {
        $this->checkAuth();
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect('categorys');
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
        $category = Category::findOrFail($id);
        $category->status = 2;
        $category->save();
        return redirect('categorys');
    }

    private function checkAuth()
    {
        if(Auth::check() == false)
        {
            abort(404);
        }

    }
}
