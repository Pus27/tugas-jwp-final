<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function homepage () {
        $posts = Post::all();
        return view('public_pages.homepage', ['posts' => $posts]);
    }

    public function show ($slug) {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::whereIn('id', $post->categories->pluck('category_id'))->get();
        return view('public_pages.show', ['post' => $post, 'categories' => $categories]);
    }

    public function showPosts () {
        $posts = Post::all();
        return view('public_pages.post', ['posts' => $posts]);
    }
}
