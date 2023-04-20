@extends('layouts.frontend', compact('title'))

@section('meta')
    <meta name="title" content="{{ $post->title ?? 'IRP Blog' }}">
    <meta name="description" content="{{ $post->synopsis ?? 'Sebuah sarana blog publik untuk saling berbagi - Remaja generasi millenial bisa' }}">
    <meta name="keyword" content="{{ $post->year ?? 'Forum, Remaja, IRP' }}">
    <meta name="image" content="{{ $post->image ?? '' }}">
@endsection

@section('content')
    <!-- Page Header -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <header class="masthead" style="height: 5rem">
        <div class="container">
            <div class="row">
                    <div class="post-heading">
                         
                    </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="my-5">
                        <h1>{{ $post->title }}</h1>
                        <hr style="height: 1rem">
                        <div class="row">
                            <div class="col-md-6">
                                @if ($post->image)
                                    <img src="{{$post->getImagePathAttribute()}}" alt="" class="card my-2" style="width: 18rem">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div style="word-wrap: break-word">
                                    Jumlah Halaman : {{ $post->page }} Halaman<br>
                                    Tahun Terbit : {{ $post->year }} <br>
                                    ISBN : {{ $post->isbn }} <br>
                                    Ukuran: {{ $post->dimension }} <br>
                                    Harga : {{ $post->price }} <br>
                                </div>
                            </div>
                        </div>
                        <div style="word-wrap: break-word;">
                            Kategori :
                            @foreach ($post->categories as $category)
                            <a href="{{ route('category', $category->name) }}">{{ $category->name }}</a>
                            @endforeach <br>
                           
                            {!! $post->synopsis !!} <br>
                        </div>
                    </div>
                        <div class="d-flex flex-row my-3">
                            <a href="{{$post->tokped}}" class="btn btn-sm btn-success ml-2"><i class="fa fa-shopping-bag"></i></a>
                            <a class="btn btn-sm btn-info ml-2"><i class="fab fa-telegram"></i></a>
                            <a class="btn btn-sm btn-info ml-2"><i class="fab fa-twitter"></i></a>
                        </div>
                    <hr>
                </div>
                <div class="col-lg-4">
                    <div class="card my-3">
                        <h3 class="post-title">Postingan Terkait</h3>
                        <ul class="list-group list-group-flush">
                            @foreach ($post_related as $post)
                                <li class="list-group-item">
                                    <div>
                                        <a href="{{ route('blog.show', $post->year) }}">{{ $post->title }}</a>
                                    </div>
                                    <div>
                                        <a href="" class="text-comment">{{ $post->page }}</a><small class="text-comment"> - {{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </article>

@endsection

@section('custom-scripts')
    <script src="{{ asset('frontend/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('frontend/vendor/ckeditor5/ckeditor.js.map') }}"></script>
    <script src="{{ asset('frontend/vendor/ckeditor5/translations/id.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
            });
        });
    </script>
@endsection
