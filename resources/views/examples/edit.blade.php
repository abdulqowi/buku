@extends('layouts/app', ['title' => 'Edit Example'])

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Edit Penulis
                        <div class="page-title-subheading">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">Penulis</a></li>
                                <li class="active breadcrumb-item" aria-current="page">Edit Penulis</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="{{ route('examples.index') }}" class="btn-shadow btn-sm mr-3 btn btn-primary">
                        Kembali
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title">Edit Penulis</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('examples.update', $example->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="name">Nama Penulis<span class="text-danger">*</span></label>
                                <input name="name" id="name" placeholder="Masukkan nama" type="name" class="form-control form-control-xs @error('name') is-invalid @enderror" value="{{ $example->name ?? old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="detail">Deskripsi <span class="text-danger">*</span></label>
                                <input name="detail" id="detail" placeholder="Masukkan detail" type="detail" class="form-control form-control-xs @error('detail') is-invalid @enderror" value="{{ $example->detail ?? old('detail') }}">
                                @error('detail')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="image">Gambar</label>
                                <input name="image" id="image" placeholder="Masukkan image" type="file"
                                    class="form-control form-control-xs @error('image') is-invalid @enderror"
                                    value="{{ $example->image ?? old('image') }}">
                                @error('image')
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
