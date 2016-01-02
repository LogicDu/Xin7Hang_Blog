<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Article;

class AdminController extends Controller
{
    public function TrashArticles()
    {
        $this->checkAuth();
        $articles = Article::latest()->where('status','2')->get();
        return view('admin/articlesTrash',compact('articles'));
    }

    private function checkAuth()
    {
        if (Auth::check() == false)
        {
            abort(404);
        }
    }

}
