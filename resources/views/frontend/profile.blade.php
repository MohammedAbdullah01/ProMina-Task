@extends('layouts.app')
@section('title', 'My Profile | ProMina')

@section('content')
    @include('inc.__header_sidebar')

    <main id="main" class="main">

        <x-pagetitle titlepage="Profile" breadcrumb="Profile" />

        <x-alert />

        <section class="section profile">
            <div class="row">

                <div class="col-xl-4">
                    <!-- Id  Card -->
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ $user->AvatarUser }}" alt="Profile" class="rounded-circle">
                            <h2>{{ Str::title($user->name) }}</h2>
                            <h3>Backend Developer</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>

                            <div class="tab-content pt-2">

                                <!-- Profile Details -->
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic">{{ $user->about }}</p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                    </div>

                                </div>

                                <!-- Profile Edit Form -->
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <form action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        <div class="row mb-2">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">
                                                Profile Image
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="{{ $user->AvatarUser }}" alt="Profile">
                                                <div class="pt-2">
                                                    <x-form.input-lable-error lable="Main Photo" type="file"
                                                        name="avatar" placeholder="Enter Album Name" class="mb-3" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label mt-4">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <x-form.input-lable-error type="text" name="name"
                                                    value="{{ $user->name }}" placeholder="Enter FullName" />
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="Email"
                                                class="col-md-4 col-lg-3 col-form-label mt-4">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <x-form.input-lable-error type="email" name="email"
                                                    value="{{ $user->email }}" placeholder="Enter Email" />
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <label for="Phone"
                                                class="col-md-4 col-lg-3 col-form-label mt-4">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <x-form.input-lable-error type="text" name="phone"
                                                    value="{{ $user->phone }}" placeholder="Enter Phone" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about"
                                                class="col-md-4 col-lg-3 col-form-label mt-2">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <x-form.textarea-lable-error name="about" value="{{ $user->about }}"
                                                    placeholder="Enter About Me" />
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 col-3 mx-auto">
                                            <button type="submit" class="btn btn-outline-info btn-sm">
                                                Save Changes
                                            </button>
                                        </div>
                                    </form>

                                </div>

                                <!-- Change Password Form -->
                                <div class="tab-pane fade pt-3 " id="profile-change-password">
                                    <form action="{{ route('profile.change.password') }}" method="POST">
                                        @method('PUT')
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="currentPassword"
                                                class="col-md-4 col-lg-3 col-form-label mt-4">Current
                                                Password
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <x-form.input-lable-error type="password" name="old_password"
                                                    placeholder="Enter Old Password" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label mt-4">
                                                New Password
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <x-form.input-lable-error type="password" name="password"
                                                    placeholder="Enter New Password" />
                                            </div>
                                        </div>

                                        <div class="row mb-3 ">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label mt-4">
                                                Re-enter New Password
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <x-form.input-lable-error type="password" name="password_confirmation"
                                                    placeholder="Enter Repeat-Password" />
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 col-3 mx-auto">
                                            <button type="submit" class="btn btn-outline-info btn-sm">
                                                Change Password
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
