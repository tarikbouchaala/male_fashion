@extends('layouts.auth')
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="/" class="app-brand-link gap-2">
                                <img src="/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to Male Fashion! 👋</h4>
                        <p class="mb-4">Please sign in to your account to access our Male Fashion Store and discover
                            the
                            latest fashion trends for men </p>

                        <form id="formAuthentication" class="mb-3" action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email </label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Enter your email" autofocus />

                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        value="{{ old('password') }}"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>

                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>

                            @include('partials.messages')
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="/register">
                                <span class="myColor">Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
