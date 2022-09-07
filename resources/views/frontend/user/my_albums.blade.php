@extends('layouts.app')
@section('title', 'Page-My Profile | ProMina')

@section('content')
    @include('inc.__header_sidebar')


    <main id="main" class="main">
        <x-pagetitle titlepage="My Albums" breadcrumb="My Albums" />

        <section class="section profile">
            <div class="row">

                <!-- My Albums -->
                <div class="col-lg-12">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        @include('frontend.user.albums.modals.create')
                    </div>

                    <x-alert />

                    <div class="card border border-3 border border-bottom-0">

                        <div class="card-body pt-3">

                            <div class="row row-cols-1 row-cols-lg-4 g-4 mb-1">
                                @forelse ($albums as $album)
                                    <div class="col-lg-4">
                                        <div class="card mt-3 h-60">
                                            <img src="{{ $album->PictureAlbum }}" height="300px" class="card-img-top"
                                                alt="">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $album->title }}</h5>
                                                <div class="card">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">Sub Photos
                                                            <span class="float-end">
                                                                {{ $album->CheckCountPicturesAlbum }}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <small class="text-muted">{{ $album->created_at->diffForHumans() }}</small>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    @include('frontend.user.albums.modals.create_sub_photos')
                                                </div>

                                            </div>
                                            <div class="card-footer">
                                                @include('frontend.user.albums.modals.show')
                                                @include('frontend.user.albums.modals.edite')
                                                @include('frontend.user.albums.modals.destroy')
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                <div class="alert alert-danger text-center fw-bold text-capitalize m-auto mt-3">
                                    {{"There are no albums ?"}}
                                </div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                    {{$albums->links()}}
                </div>

            </div>
        </section>
    </main>
@endsection
