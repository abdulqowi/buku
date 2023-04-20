@extends('layouts/app', compact('title'))

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>{{ $title ?? 'Header' }}
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Buku</div>

                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ $blogs }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Jumlah Kategori</div>

                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ $categories }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Pengguna</div>

                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ $users }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
