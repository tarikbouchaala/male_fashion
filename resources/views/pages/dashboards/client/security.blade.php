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
                            Security
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">Reset Password</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="oldpass" class="form-label">Old Password</label>
                                                    <input class="form-control" type="password" id="oldpass"
                                                        name="oldpass" placeholder="Enter old password" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="newpass" class="form-label">New Password</label>
                                                    <input class="form-control" type="password" id="newpass"
                                                        name="newpass" placeholder="Enter new password" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label for="newpassconf" class="form-label">New
                                                        Password Confirmation</label>
                                                    <input class="form-control" type="password" id="newpassconf"
                                                        name="newpassconf" placeholder="Enter new password" autofocus />
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
