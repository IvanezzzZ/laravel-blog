<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class MainController extends Controller
{
    public function __invoke()
    {
        $userCount = User::all()->count();
        $postCount = Post::all()->count();
        $categoryCount = Category::all()->count();
        $tagCount = Tag::all()->count();

        $data = [
            'userCount' => $userCount, 
            'postCount' => $postCount, 
            'categoryCount' => $categoryCount, 
            'tagCount' => $tagCount
        ];

        return view('admin.main.index', compact('data')); 
    }
}
