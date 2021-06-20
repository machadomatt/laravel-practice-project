<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $metatags = $this->seo->render(
            env('APP_NAME') . ' - Laravel + Bootstrap 5',
            'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi fuga ratione, fugit sapiente ab maxime!',
            url('/'),
            'https://dummyimage.com/1280x720/343a40/6c757d'
        );

        $posts = Post::orderBy('published_at', 'DESC')->limit(3)->get();

        return view('front.index', ['metatags' => $metatags, 'posts' => $posts]);
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function pricing()
    {
        return view('front.pricing');
    }

    public function faq()
    {
        return view('front.faq');
    }

    public function blog()
    {
        return view('front.blog');
    }

    public function post()
    {
        return view('front.post');
    }

    public function sendContact()
    {
        return redirect()->route('contact');
    }
}
