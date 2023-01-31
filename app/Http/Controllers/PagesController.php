<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    
    public function show()
    {
        
        $posts = Post::orderBy('updated_at', 'DESC')->limit(2)->get();
        return view('index', ['posts'=>$posts]);
    }
}
