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
            <div class="col-lg-8 col-md-10 mx-auto">
                <h3 class="post-title">{{ $category }}</h3>
                @include('frontend.components.alert')
                @foreach ($posts as $post)
                    <div class="item">
                        <div class="card my-3">
                            @if ($post->image)
                                <img src="{{ $post->getImagePathAttribute() }}" class="card-img-top"
                                    style="height: 120px; width:120px; object-fit: cover; object-position: center;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <a href="{{ route('blog.show', $post->title) }}" class="card-title mb-auto"
                                    style="max-width: 80px">
                                    {{ $post->title }}
                                </a>
                                <div class="mt-auto">
                                    <p class="card-text" style="margin-bottom: 0;">Rp
                                        {{ number_format($post->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="card my-3" style=" width:200px margin-left:0%">
                    <h3 class="post-title" style="text-align: center">Kategori</h3>
                    <ul class="list-group list-group-flush">
                        @foreach ($categories as $cat)
                            <li class="list-group-item @if ($category === $cat->name) active @endif"><a
                                    href="{{ route('category', $cat->name) }}">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- Pager -->
        <div class="clearfix">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
