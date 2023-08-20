@extends('layouts/app', ['title' => 'Tambahkan Artikel'])

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Tambahkan Buku
                        <div class="page-title-subheading">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">Buku</a></li>
                                <li class="active breadcrumb-item" aria-current="page">Tambahkan Buku</li>
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
                <h5 class="card-title">Tambahkan buku</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="title">Judul <span class="text-danger">*</span></label>
                                        <input name="title" id="title" placeholder="Masukkan judul" type="text"
                                            class="form-control form-control-xs @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}">
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
                                        <input name="image" id="image" type="file"
                                            class="form-control form-control-xs @error('image') is-invalid @enderror"
                                            value="{{ $blog->image ?? old('image') }}">
                                        @error('image')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="ISBN">ISBN <span class="text-danger">*</span></label>
                                        <input name="isbn" id="isbn" placeholder="Masukkan ISBN" type="text"
                                            class="form-control form-control-xs @error('isbn') is-invalid @enderror"
                                            value="{{ old('isbn') }}">
                                        @error('isbn')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col md-6">
                                    <div class="position-relative form-group">
                                        <label for="price">Harga<span class="text-danger">*</span></label>
                                        <input name="price" id="price" type="number"
                                            class="form-control form-control-xs @error('price') is-invalid @enderror"
                                            value="{{ old('price') }}">
                                        @error('price')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="example">Penulis</label>
                                        <select name="example[]" id="example"
                                            class="form-control form-control-xs select2 @error('example')is-invalid                                      
                                            @enderror"
                                            multiple>
                                            @foreach ($examples as $example)
                                                <option value="{{ $example->id }}">{{ $example->name }}</option> )
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="category">Kategori <span class="text-danger">*</span></label>
                                        <select name="category[]" id="category"
                                            class="form-control form-control-xs select2 @error('category') is-invalid @enderror"
                                            multiple>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <label for="meta_keyword">Ukuran <span class="text-danger">*</span></label>
                                        <input name="dimension" id="dimension" placeholder="Masukkan keyword (tidak wajib)"
                                            type="text"
                                            class="form-control form-control-xs @error('dimension') is-invalid @enderror"
                                            value="{{ old('dimension') }}">
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
                                        <input name="year" id="year" placeholder="Masukkan judul" type="number"
                                            class="form-control form-control-xs @error('year') is-invalid @enderror"
                                            value="{{ old('year') }}">
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
                                        <input name="page" id="page" placeholder="Masukkan judul" type="number"
                                            class="form-control form-control-xs @error('page') is-invalid @enderror"
                                            value="{{ old('page') }}">
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
                                <label for="body">Sinopsis Buku<span class="text-danger">*</span></label>
                                <textarea name="synopsis" id="synopsis" type="text"
                                    class="form-control form-control-xs @error('synopsis') is-invalid @enderror"></textarea>
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
                'placeholder': 'Pilih Kategori'
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
