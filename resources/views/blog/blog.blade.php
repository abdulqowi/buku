@extends('layouts/app', ['title' => 'Blog'])

@section('content')
    @include('sweetalert::alert')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Database Buku Lengkap
                        <div class="page-title-subheading">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="active breadcrumb-item" aria-current="page">Buku</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="{{ route('blogs.create') }}" class="btn-shadow btn-sm mr-3 btn btn-primary">
                        Tambah
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title">Data Buku</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="mb-0 table table-striped table-hover table-bordered table-sm" id="data-table">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-center" width="3%">No</th>
                                <th>Judul</th>
                                <th>Tahun</th>
                                <th>Harga</th>
                                <th>Sinopsis</th>
                                {{-- <th>Penulis</th> --}}
                                <th>Kategori</th>
                                <th class="text-center" width="3%"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('custom-scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template') }}/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            let table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,

                ajax: "{{ route('blogs.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'dt-body-center'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },

                    {
                        data: 'year',
                        name: 'year'
                    },

                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'synopsis',
                        name: 'synopsis',
                        orderable: false,
                        searchable: false
                    },
                 
                    {
                        data: 'categories', // Kolom baru untuk kategori
                        name: 'categories', // Menggunakan relasi dan nama kolom kategori
                        orderable: false, // Ubah sesuai kebutuhan
                        searchable: false, // Ubah sesuai kebutuhan
                        render: function(data) {
                            var categoryNames = '';
                            $.each(data, function(index, category) {
                                categoryNames += category.name + ', ';
                            });
                            return categoryNames.slice(0, -2); // Menghapus koma dan spasi terakhir
                        }
                    },
                    // {
                    //     data: 'examples', 
                    //     name: 'examples',
                    //     orderable: true, 
                    //     searchable: true, 
                    // },
                    
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'dt-body-center'
                    },
                ],
            });

            $('body').on('click', '#showDetails', function() {
                var blog_id = $(this).data('id');
                $.get("{{ route('blogs.index') }}" + '/' + blog_id, function(data) {
                    $('#detailsModal').modal('show');
                    $('#title').html(data.title);
                    $('#isbn').html(data.isbn);
                    $('#year').html(data.year);

                    $('#page').html(data.page);
                    $('#synopsis').html(data.synopsis);
                    $('#tokped').html(data.tokped);
                    $('#price').html(data.price);
                    $('#dimension').html(data.dimension);
                    //penyimpanan gambar
                    $('#image').attr('src', '/images/blogs/' + data.image);
                    $('#createdAt').html(data.created_at);
                })
                $('button.blog').remove();
            })
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModal"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModal">Detail Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <button class="list-group-item-action list-group-item">Judul : <i id="title"></i></button>
                        <button class="list-group-item-action list-group-item">ISBN : <i id="isbn"></i></button>
                        <button class="list-group-item-action list-group-item">Gambar : <i><img class="img-fluid"
                                    id="image" src="" alt="null"></i></button>

                        <button class="list-group-item-action list-group-item">Tahun : <i id="year"></i></button>
                        <button class="list-group-item-action list-group-item">Tebal : <i id="page"></i></button>
                        <button class="list-group-item-action list-group-item">Ukuran : <i id="dimension"></i></button>
                        <button class="list-group-item-action list-group-item">Link : <i id="tokped"></i></button>
                        <button class="list-group-item-action list-group-item">Sinopsis : <i id="synopsis"></i></button>
                        <button class="list-group-item-action list-group-item">Dibuat : <i id="createdAt"></i></button>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
