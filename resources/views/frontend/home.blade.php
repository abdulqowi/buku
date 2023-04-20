    @extends('layouts.frontend')

    @section('content')
    {{-- {{ dd($post->categories)}} --}}
        <!-- Page Header -->
        <header class="masthead" >
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
            <div class="row ">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <h3 class="post-title">Terpopuler</h3>
                    @include('frontend.components.alert')
                    @foreach ($posts as $post)
                        <div class="item">
                            <div class="card my-3" style="width: 120px height:300px">
                                @if ($post->image)
                                    <img src="{{$post->getImagePathAttribute()}}" class="card-img-top" style="height: 150px; width:120px;  object-fit: cover; object-position: center;">
                                @endif
                                <div class="post-preview">
                                    <a href="{{ route('blog.show', $post->title) }}">
                                        <p style="max-width: 120px ">
                                            {{ $post->title }}
                                        </p>
                                    </a>
                                    <p class="post-title">Rp {{ number_format($post->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <div class="card" style=" width:200px margin-left:0%">
                        <h3 class="post-title" style="text-align: center">Kategori</h3>
                        <ul class="list-group list-group-flush">
                            @foreach ($categories as $category)
                                <li class="list-group-item"><a href="{{ route('category', $category->name) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                {{ $posts->links() }}
            </div>
            <!-- Pager -->
        </div>
    @endsection
