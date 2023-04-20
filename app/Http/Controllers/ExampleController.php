<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExampleController extends Controller
{
    public function index()
    {
        $data = Example::all();
        return view('examples.index', compact('data'));
    }

    public function create()
    {
        return view('examples.create');
    }

    public function edit(Example $example)
    {
        return view('examples.edit', compact('example'));
    }

    public function store(Request $request)
    { 
        $request->validate( [
            'name' => 'required',
            'detail' => 'required',
        ]
        );
        $extension = $request->file('image')->getClientOriginalExtension();
        $image = date('YmdHis') . ''  . '.' . $extension;
        $path = base_path('public/images/examples');
        $request->file('image')->move($path, $image);

        Example::create([
            'name' => request('name'),
            'image' => $image,
            'detail' => request('detail'),
        ]);

        flash('Data berhasil ditambahkan!');
        return redirect()->route('examples.index');
    }

    public function update(Example $example)
    {
        $this->validate(request(), [
            'name' => 'required|max:255,' . $example->id,
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'detail' => 'required|max:255,',
        ]
        );

        if (request('image')) {
            Storage::delete($example->image);
            $extension = request()->file('image')->getClientOriginalExtension();
            $image = date('YmdHis') . ''  . '.' . $extension;
            $path = base_path('public/images/examples');
            request()->file('image')->move($path, $image);
        } elseif ($example->image) {
            $image = $example->image;
        }else {
            $image = null;
        }

        $example->update([
            'name' => request('name'),
            'detail' => request('detail'),
            'image' => $image,
        ]);

        flash('Data berhasil diedit!');
        return redirect()->route('examples.index');
    }

    public function destroy(Example $example)
    {
        $example->delete();
        flash('Data berhasil diedit!');
        return redirect()->route('examples.index');
    }
}
