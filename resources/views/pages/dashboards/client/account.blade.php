@extends('layouts.dashboard')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('partials.clientMenu')
            <!-- / Menu -->

            <!-- Layout -->
            <div class="layout-page">
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">
                            <a class="layout-menu-toggle align-items-xl-center me-xl-0 d-xl-none myColor"
                                href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                            <span class="text-muted fw-light">Account Settings /</span>
                            Account
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">First Name</label>
                                                    <input class="form-control" type="text" id="firstName"
                                                        name="firstName" value="{{ Auth::user()->first_name }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Last Name</label>
                                                    <input class="form-control" type="text" name="lastName"
                                                        id="lastName" value="{{ Auth::user()->last_name }}" />
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="text" id="email" name="email"
                                                        value="{{ Auth::user()->email }}"
                                                        placeholder="john.doe@example.com" />
                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary me-2"><strong>Save
                                                            changes</strong></button>
                                                </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
            <!-- Layout -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
