@extends('layouts.frontend', ['title' => $category])

@section('content')
    <!-- Page Header -->
    <header class="masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading" style="padding: 50px 0 20px">
                        <h1>PENERBIT CAMPUSTAKA</h1>
                        <span class="subheading"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-1 shadow-sm mt-3">
                    <h3 class="post-title mt-3">{{ $category }}</h3>
                    <div class="d-flex flex-row justify-content-center flex-wrap">
                        @if ($posts->isEmpty())
                            <span class="card-text mb-3">Tidak ada hasil </span>
                        @else
                            @foreach ($posts as $post)
                                <div class="card-img-top ml-2 mr-2 mb-3" style="width: 100px;">
                                    @if ($post->image)
                                        <img src="{{ $post->getImagePathAttribute() }}" class="card-img-top"
                                            style="height: 100px; width: 100px; object-fit: cover; object-position: center;">
                                    @endif
                                    <div class="post-preview text-center">
                                        <a href="{{ route('blog.show', $post->title) }}">
                                            <p style="max-width: 100%; height:40px;">
                                                {{ $post->title }}
                                            </p>
                                        </a>
                                        <span class="card-text mb-3">Rp
                                            {{ number_format($post->price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                
            </div>
            <div class="col-lg-3 mt-3">
                <div class="card border-1 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="post-title">Kategori</h3>
                        <ul class="list-group list-group-flush">
                            @foreach ($categories as $category)
                                <li class="list-group-item border-0 bg-transparent">
                                    <a href="{{ route('category', $category->name) }}"
                                        class="text-decoration-none">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pager -->
        <div class="clearfix">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
