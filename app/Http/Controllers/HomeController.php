<?php

namespace App\Http\Controllers;

use App\Models\{Blog, Category, Example};

class HomeController extends Controller
{
    public function index()
    {
        $query = request('query');
        return view('frontend.home', [

            'new_post' => Blog::orderBy('created_at', 'asc')->paginate(18),
            // post kategori terpopuler
            'best_post' => Blog::whereHas('categories', function ($query) {
                $query->where('name', 'Terpopuler');
        })->with('categories')->orderBy('created_at')->limit(6)->get(),

        //simple paginate tidak bisa pakai latest()
            'new_post' => Blog::where("title", "like", "%$query%")->latest()->simplePaginate(18),
            //tampilan kategori kecuali terpopuler
            'categories' => Category::whereNotIn('name', ['Terpopuler', 'Populer', 'Best Seller'])->get(),
        ]);
    }

    public function show(Blog $blog)
    {if ($blog) {
        $relatedByCategories = Blog::whereHas('categories', function ($q) use ($blog) {
            $q->whereIn('name', $blog->categories->pluck('name'));
        })
        ->where('id', '!=', $blog->id)
        ->limit(5)
        ->get();
    
        $relatedByExamples = Blog::whereHas('examples', function ($q) use ($blog) {
            $q->whereIn('name', $blog->examples->pluck('name'));
        })
        ->where('id', '!=', $blog->id)
        ->limit(5)
        ->get();
    
        $post_related = $relatedByCategories->merge($relatedByExamples);
        
        return view('frontend.blog', [
            'title' => $blog->title,
            'post' => $blog,
            'post_related' => $post_related,
        ]);
    }
    else {
            abort(404);
        }
    }

    public function category(Category $category)
    {
        if ($category) {
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
