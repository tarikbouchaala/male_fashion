@extends('layouts.dashboard')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('partials.adminMenu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->


                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">
                            <a class="layout-menu-toggle align-items-xl-center me-xl-0 d-xl-none myColor"
                                href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                            <span class="text-muted fw-light">Products /</span>
                            Update Product
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('dashboard-admin-editProduct', $product->id) }}" class="card mb-4">
                                    @csrf
                                    <h5 class="card-header">Update Product</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="{{ $product->image == 'noImage' ? asset('img/image-placeholder.jpg') : asset('storage/images/' . $product->image) }}"
                                                alt="user-avatar" class="d-block rounded" height="100" width="100"
                                                id="productUploadedImageUpdate" />
                                            <div class="button-wrapper">
                                                <label for="productImageUploadUpdate" class="btn btn-primary me-2 mb-4"
                                                    tabindex="0">
                                                    <span class="d-none d-sm-block">Upload product miniature</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input type="file" id="productImageUploadUpdate"
                                                        class="account-file-input" hidden name="image" />
                                                </label>
                                                <button type="reset"
                                                    class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>
                                                <p class="text-muted mb-0">Allowed JPG, JPEG or PNG</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div id="formAccountSettings">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="product_name" class="form-label">Product Name</label>
                                                    <input class="form-control" type="text" id="product_name"
                                                        name="name" placeholder="Ex: Nike Air Max"
                                                        value="{{ $product->name }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="product_price" class="form-label">Product Price</label>
                                                    <input class="form-control" type="text" placeholder="Ex: 200"
                                                        id="product_price" name="price" value="{{ $product->price }}">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="product_category" class="form-label">Product
                                                        Category</label>
                                                    <select class="form-select cursor-pointer" name="category_id"
                                                        id="product_category" aria-label="Default select example">
                                                        @if (count($categories) != 0)
                                                            <option value="">Choose a category</option>
                                                            @foreach ($categories as $category)
                                                                @if ($category->id == $product->category_id)
                                                                    <option selected value="{{ $category->id }}">
                                                                        {{ $category->name }}</option>
                                                                @else
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <option value="">Create a category</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="product_description" class="form-label">Product
                                                        Description</label>
                                                    <textarea name="description" placeholder="Enter product description" class="form-control" id="product_description">{{ $product->description }}</textarea>
                                                </div>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        @foreach ($errors->all() as $error)
                                                            <div class="my-1">
                                                                {{ $error }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
