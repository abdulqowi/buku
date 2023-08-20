@extends('layouts.frontend', compact('title'))

@section('meta')
    <meta name="title" content="{{ $post->title ?? 'IRP Blog' }}">
    <meta name="description"
        content="{{ $post->synopsis ?? 'Sebuah sarana blog publik untuk saling berbagi - Remaja generasi millenial bisa' }}">
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
                    <div class=" my-5">
                        <h2 class="nav-link mb-3" >{{ $post->title }}</h2>
                        <div class="row">
                            <div class="col-md-5">
                                @if ($post->image)
                                    <img src="{{ $post->getImagePathAttribute() }}" alt="null" "
                                        style="width: 18rem">
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div style="word-wrap: break-word">
                                    <span style="display: inline-block; width: 120px;"><strong>Penulis</strong></span> : 
                                    <span>
                                        @foreach ($post->examples as $example)
                                        {{ $example->name }}@unless ($loop->last), @endunless
                                    @endforeach                                                           
                                    </span> <br>
                                    <span style="display: inline-block; width: 120px;"><strong>Jumlah Halaman</strong></span> : {{ $post->page }} Halaman<br>
                                    <span style="display: inline-block; width: 120px;"><strong>Tahun Terbit</strong></span> : {{ $post->year }}<br>
                                    <span style="display: inline-block; width: 120px;"><strong>ISBN</strong></span> : {{ $post->isbn }}<br>
                                    <span style="display: inline-block; width: 120px;"><strong>Ukuran</strong></span> : {{ $post->dimension }}<br>
                                    <span style="display: inline-block; width: 120px;"><strong>Harga</strong></span> : Rp {{ number_format($post->price, 0, ',', '.') }}<br>
                                    <span style="display: inline-block; width: 120px;"><strong>Kategori</strong></span> : 
                                    <span>
                                        @foreach ($post->categories as $category)
                                        @if ($category->name !== 'Terpopuler')
                                            <a href="{{ route('category', $category->name) }}">{{ $category->name }}</a>
                                            @unless ($loop->last), @endunless
                                        @endif
                                        @endforeach                                    
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3" style="word-wrap: break-word;">
                            {!! $post->synopsis !!} <br>
                        </div>
                    </div>
                    <div class="d-flex flex-row my-3">
                        <a href="{{ $post->tokped }}" class="btn btn-lg btn-success ml-2"><i class="fa fa-shopping-cart">
                                Beli</i></a>
                    </div>
                    <hr>
                </div>
                <div class="col-lg-4">
                    <div class="card border-1 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="post-title">Postingan Terkait</h3>
                            <ul class="list-group list-group-flush">
                                @foreach ($post_related as $post)
                                    <li class="list-group-item border-0 bg-transparent">
                                        <div>
                                            @if ($post->image)
                                    <img src="{{ $post->getImagePathAttribute() }}" alt="null" "
                                        style="width: 15rem">
                                @endif
                                            <a href="{{ route('blog.show', $post->title) }}">{{ $post->title }}</a>
                                        </div>
                                        <div>
                                            <i class="text-comment">
                                                @foreach($post->categories as $category)
                                                    @if ($category->name !== 'Terpopuler')
                                                        {{ $category->name }}
                                                    @endif
                                                @endforeach
                                            </i>                                            
                                            <small class="text-comment"> - {{ $post->created_at->diffForHumans() }}</small>
                                        </div>
                                        
                                    </li>
                                @endforeach
                            </ul>
                        </div>
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
