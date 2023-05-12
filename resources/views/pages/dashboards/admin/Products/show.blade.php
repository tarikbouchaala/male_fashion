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
                            My Products
                        </h4>
                        <div class="card">
                            <h5 class="card-header d-flex align-items-center justify-content-between"><span>Products
                                    Table</span>
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="import_export d-flex justify-content-center flex-wrap gap-3">
                                        <a href="{{ route('dashboard-admin-export') }}">
                                            <img src="{{ asset('img/icon/export.png') }}" title="Export Products"
                                                alt="Export Icon">
                                        </a>
                                    </div>
                                    <a href="{{ route('dashboard-admin-product-create') }}" class="btn btn-primary">Create
                                        Product</a>
                                </div>
                            </h5>
                            @if ($products->isEmpty())
                                <h1 class="card-body">No Products found</h1>
                            @else
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>
                                                        <img src="{{ $product->image == 'noImage' ? asset('img/image-placeholder.jpg') : asset('storage/images/' . $product->image) }}"
                                                            alt="Product Image" class="avatar avatar-lg rounded-circle" />
                                                    </td>
                                                    <td>
                                                        <ul
                                                            class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="right" class="avatar avatar-lg "
                                                                title="{{ $product->category->name }}">
                                                                <img src="{{ asset('storage/images/' . $product->category->image) }} "
                                                                    alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>
                                                        <a href="{{ route('dashboard-admin-product-update', $product->id) }}"
                                                            class="text-success">
                                                            <i class="bx bx-edit-alt me-3"></i>
                                                        </a>
                                                        <form id="delete-form-product-{{ $product->id }}" class="d-inline"
                                                            method="POST"
                                                            action="{{ route('dashboard-admin-productDelete', $product->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="document.getElementById('delete-form-product-{{ $product->id }}').submit(); return false;"
                                                                class="text-danger cursor-pointer">
                                                                <i class="bx bx-trash me-3"></i>
                                                            </a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            <form action="{{ route('dashboard-admin-import') }}" class="my-3 px-3"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="file"
                                        accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                        class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                        name="file" aria-label="Upload" />
                                    <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Import
                                        Products</button>
                                </div>
                                @error('file')
                                    <div class="alert alert-danger my-3">
                                        Please select a excel file
                                    </div>
                                @enderror
                            </form>
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
