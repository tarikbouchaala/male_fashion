@extends('layouts.dashboard')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('partials.adminMenu')
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

                            <span class="text-muted fw-light">Products /</span>
                            Import
                        </h4>
                        <div class="card">
                            
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
