@extends('layouts/app', ['title' => 'Edit blog'])

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Edit blog
                        <div class="page-title-subheading">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">blogs</a></li>
                                <li class="active breadcrumb-item" aria-current="page">Edit blog</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="{{ route('blogs.index') }}" class="btn-shadow btn-sm mr-3 btn btn-primary">
                        Kembali
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title">Edit blog</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="title">Judul <span class="text-danger">*</span></label>
                                        <input name="title" id="title" placeholder="Masukkan judul" type="title"
                                            class="form-control form-control-xs @error('title') is-invalid @enderror"
                                            value="{{ $blog->title ?? old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="image">Gambar</label>
                                        <input name="image" id="image" placeholder="Masukkan image" type="file"
                                            class="form-control form-control-xs @error('image') is-invalid @enderror"
                                            value="{{ $blog->image ?? old('image') }}">
                                        @error('image')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="isbn">ISBN <span class="text-danger">*</span></label>
                                        <input name="isbn" id="isbn" placeholder="Masukkan judul" type="isbn"
                                            class="form-control form-control-xs @error('isbn') is-invalid @enderror"
                                            value="{{ $blog->isbn ?? old('isbn') }}">
                                        @error('isbn')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="price">Harga <span class="text-danger">*</span></label>
                                        <input name="price" id="price" placeholder="Masukkan judul" type="price"
                                            class="form-control form-control-xs @error('price') is-invalid @enderror"
                                            value="{{ $blog->price ?? old('price') }}">
                                        @error('price')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="tokped">Link Tokopedia</label>
                                        <input type="tokped" name="tokped" id="tokped" class="form-control form-control-xs @error('tokped') is-invalid @enderror"
                                        value="{{$blog->tokped ?? old('tokped')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="example">Penulis</label>
                                        <select name="example[]" id="example" type='example'
                                            class="form-control form-control-xs select2 
                                            @error('example') is-invalid @enderror"
                                            value="{{$blog->examples ?? old('example')}}" multiple>
                                            @foreach ($examples as $example)
                                                <option value="{{ $example->id }}"
                                                    {{ $blog->examples()->find($example->id) ? 'selected' : '' }}>
                                                    {{ $example->name }}</option>
                                            @endforeach 
                                        </select>
                                        @error('example')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="category">Kategori</label>
                                        <select name="category[]" id="category" type="category"
                                            class="form-control form-control-xs select2 
                                            @error('category') is-invalid 
                                            @enderror"
                                            value="{{ $blog->categories ?? old('category') }}"multiple>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $blog->categories()->find($category->id) ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="dimension"> Ukuran </label>
                                        <input name="dimension" id="dimension"
                                            placeholder="Masukkan Ukuran (tidak wajib)" type="dimension"
                                            class="form-control form-control-xs @error('dimension') is-invalid @enderror"
                                            value="{{ $blog->dimension ?? old('dimension') }}">
                                        @error('dimension')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="year">Tahun Terbit <span class="text-danger">*</span></label>
                                        <input name="year" id="year" placeholder="Masukkan Tahun(tidak wajib)"
                                            type="year"
                                            class="form-control form-control-xs @error('year') is-invalid @enderror"
                                            value="{{ $blog->year ?? old('year') }}">
                                        @error('year')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="page">Jumlah Halaman <span class="text-danger">*</span></label>
                                        <input name="page" id="page"
                                            placeholder="Masukkan Jumlah Halaman (tidak wajib)" type="page"
                                            class="form-control form-control-xs @error('page') is-invalid @enderror"
                                            value="{{ $blog->page ?? old('page') }}">
                                        @error('page')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="synopsis">Sinopsis <span class="text-danger">*</span></label>
                                <textarea name="synopsis" id="synopsis" type="text"
                                    class="form-control form-control-xs @error('synopsis') is-invalid @enderror"
                                    value="{{ $blog->synopsis ?? old('synopsis') }}">{{ $blog->synopsis }}</textarea>
                                @error('synopsis')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('custom-styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                'placeholder': 'pilih kategori'
            });
        });
        ClassicEditor
            .create(document.querySelector('#body'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
