<?php

namespace App\Http\Controllers;

use App\Models\{Blog, Category};

class HomeController extends Controller
{
    public function index()
    {
        $query = request('query');
        return view('frontend.home', [
            'post_most_viewed' => Blog::orderBy('created_at', 'asc')->limit(5)->get(),
            'posts' => Blog::where("title", "like", "%$query%")->latest()->simplePaginate(5),
            'categories' => Category::get(),
        ]);
    }

    public function show(Blog $blog)
    {
        if ($blog) {
            return view('frontend.blog', [
                'title' => $blog->title,
                'post' => $blog,
                'post_related' => Blog::whereHas('categories', function ($q) use ($blog) {
                    return $q->whereIn('name', $blog->categories->pluck('name'));
                })
                    ->where('id', '!=', $blog->id)
                    ->limit(5)
                    ->get(),
            ]);
        } else {
            abort(404);
        }
    }

    public function category(Category $category)
    {
        if($category) {
            return view('frontend.category', [
                'categories' => Category::get('name'),
                'category' => $category->name,
                'posts' => $category->blogs()->latest()->simplePaginate(5),
            ]);
        } else {
            abort(404);
        }
    }
    



    public function about_us()
    {
        return view('frontend.about_us', ['title' => 'Tentang Kami']);
    }
}
