<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Post;

class FrontendController extends Controller
{
    public function home()
    {
        $posts = Post::latest()->take(4)->get();

        $news = News::latest()->take(4)->get();

        return view('home', compact('posts', 'news'));
    }

    public function posts()
    {
        $posts = Post::latest()->paginate(6);

        return view('posts', compact('posts'));
    }

    public function news()
    {
        $news = News::latest()->paginate(6);

        return view('news', compact('news'));
    }

    public function postShow($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->where('approved',1)->paginate(2);
        return view('post', compact('post','comments'));
    }

    public function newsShow($id)
    {
        $article = News::findOrFail($id);
        $comments = $article->comments()->where('approved',1)->paginate(2);
        return view('article', compact('article','comments'));
    }
}
