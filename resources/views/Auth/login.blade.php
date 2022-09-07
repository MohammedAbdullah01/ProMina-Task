@extends('layouts.app')

@section('title', 'Page - LogIn | Promina')

@section('content')
    <main>
        <div class="container">

            <x-alert />

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            @include('inc.__logo')

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login To Your Account</h5>
                                        <p class="text-center small">Enter Your Email & Password To Login</p>
                                    </div>

                                    <form action="{{ route('check.login') }}" method="POST"
                                        class="row g-3 needs-validation" novalidate autocomplete="off">
                                        @method('POST')
                                        @csrf
                                        @include('inc.__login')

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
