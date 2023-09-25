<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    
    public function search(Request $request)
    {
        
        $searchTerm = $request->input('search');
        $articles = null;  

        if(!is_null($searchTerm)){
            $articles = Article::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($searchTerm) . '%'])
                ->orWhereRaw('LOWER(content) LIKE ?', ['%' . strtolower($searchTerm) . '%'])
                ->get();   
        }
        

        return view('articles.search', compact('articles'));
    }

}