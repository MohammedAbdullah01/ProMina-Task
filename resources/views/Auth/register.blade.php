@extends('layouts.app')

@section('title', 'Page - SigUp | Promina')

@section('content')
    <main>
        <div class="container">

            <x-alert />

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            @include('inc.__logo')

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Sig Up a New Account</h5>
                                        <p class="text-center small">Enter Your Username & Email & Password to login</p>
                                    </div>

                                    <form action="{{ route('store.register') }}" method="POST"
                                        class="row g-3 needs-validation" novalidate>
                                        @method('POST')
                                        @csrf

                                        @include('inc.__register')

                                    </form>

                                </div>
                            </div>

                            @include('inc.__footer')

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
@endsection
