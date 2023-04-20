<?php

namespace App\Http\Controllers;

use App\DataTables\BlogsDataTable;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BlogStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\{Blog, Category,Example};

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-read', ['only' => ['index', 'show']]);
        $this->middleware('permission:blog-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }

    public function index(BlogsDataTable $datatable)
    {
        return $datatable->render('blog.blog');
    }

    public function show($id)
    {
        $blog = Blog::where('id', $id)->findOrFail($id);
        return response()->json($blog);
    }

    public function create()
    {
        return view('blog.create', [
            'categories' => Category::all(),
            'examples' => Example::all(),
        ]);
    }

    public function store(BlogStoreRequest $request)
    {
        $request->validated();
        $extension = $request->file('image')->getClientOriginalExtension();
        $image = date('YmdHis') . ''  . '.' . $extension;
        $path = base_path('public/images/blogs');
        $request->file('image')->move($path, $image);

        $blog = Blog::create([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'image' => $image,
            'dimension' => $request->dimension,
            'year' => $request->year,
            'synopsis' => $request->synopsis,
            'price' => $request->price,
            'page' => $request->page,
            'tokped' => $request->tokped,
        ]);
        $blog->categories()->sync($request->category);
        $blog->examples()->sync($request->example);
        flash('Data berhasil ditambahkan!');
        return redirect()->route('blogs.index');        
    }
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $examples = Example::all();
        $blog->load( 'examples');
        return view('blog.edit', compact('blog', 'categories', 'examples'));
    }

    public function update(Blog $blog)
    {
        $this->validate(request(), [
            'title' => 'required|max:255,' . $blog->id,
            'image' => 'image|mimes:jpg,jpeg,png|max:2058',
        ]);

        // Pengkondisian update gambar
        if (request('image')) {
            // Jika ada request maka delete old img
            File::delete('images/blogs/' . $blog->image);
            $extension = request()->file('image')->getClientOriginalExtension();
            $image = date('YmdHis') . ''  . '.' . $extension;
            $path = base_path('public/images/blogs');
            request()->file('image')->move($path, $image);
        } elseif ($blog->image) {
            // jika tidak ada biarkan old image
            $image = $blog->image;
        } else {
            $image = null;
        }

        $blog->update([
            'title' => request('title'),
            'isbn' => request('isbn'),
            'dimension' => request('dimension'),
            'image' => $image,
            'year' => request('year'),
            'synopsis' => request('synopsis'),
            'price' => request('price'),
            'page' => request('page'),
            'tokped' => request('tokped'),
        ]);
        $blog->categories()->sync(request('category'));
        $blog->examples()->sync(request('example'));
        flash('Data berhasil diedit!');
        return redirect()->route('blogs.index');
    }

    public function destroy(Blog $blog)
    {
        File::delete('images/blogs/' . $blog->image);
        $blog->delete();
        flash('Data berhasil dihapus!');
        return redirect()->route('blogs.index');
    }
}
