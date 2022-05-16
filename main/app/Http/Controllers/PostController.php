<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = "Post Category in $category->name";
        }
        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = "Author by $author->name";
        }
        
        return view('posts', [
            "title" => $title,
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
            "active" => 'posts'
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            "title" => "post tulisan",
            "post" => $post,
            "active" => 'posts'
        ]);
    }
}
