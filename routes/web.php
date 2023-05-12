<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\ClientDashboard;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;


Route::get('/', [PagesController::class, 'index']);

Route::get('/shop', [PagesController::class, 'shop']);
Route::get('/product/{id}', [PagesController::class, 'productDetails']);
Route::get('/searchProduct', [PagesController::class, 'searchProduct']);

Route::get('/cart', [PagesController::class, 'shopingCart']);
Route::post('/add-to-cart', [PagesController::class, 'addProductToCart']);
Route::post('/empty-cart', [PagesController::class, 'emptyCart'])->name('empty-cart');
Route::put('/edit-cart/{id}', [PagesController::class, 'updateProductQuantityInCart'])->name('edit-cart');
Route::delete('/delete-from-cart/{id}', [PagesController::class, 'deleteProductFromCart'])->name('delete-product-cart');

Route::get('/about', [PagesController::class, 'about']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::post('/sendMail', [PagesController::class, 'mail']);

/* Guest */
Route::group(['middleware' => ['guest']], function () {

    Route::get('/register', [PagesController::class, 'register']);
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [PagesController::class, 'login']);
    Route::post('/login', [LoginController::class, 'login']);
});

/* Auth */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
    Route::get('/checkout', [PagesController::class, 'checkout']);

    /* Admin Menu */

    Route::group(['middleware' => ['admin']], function () {

        // Account Settings
        Route::get('/dashboard/admin/account', [AdminDashboard::class, 'account'])->name('dashboard-admin-account');
        Route::get('/dashboard/admin/security', [AdminDashboard::class, 'security'])->name('dashboard-admin-security');

        // Categories
        Route::get('/dashboard/admin/categories', [AdminDashboard::class, 'category'])->name('dashboard-admin-categories-show');

        Route::get('/dashboard/admin/category/create', [AdminDashboard::class, 'createCategory'])->name('dashboard-admin-category-create');
        Route::post('/dashboard/admin/category/add', [AdminDashboard::class, 'addCategory'])->name('dashboard-admin-addCategory');

        Route::get('/dashboard/admin/category/update/{id}', [AdminDashboard::class, 'updateCategory'])->name('dashboard-admin-category-update');
        Route::post('/dashboard/admin/category/edit/{id}', [AdminDashboard::class, 'editCategory'])->name('dashboard-admin-editCategory');

        Route::delete('/dashboard/admin/category/{id}', [AdminDashboard::class, 'deleteCategory'])->name('dashboard-admin-categoryDelete');

        // Products
        Route::get('/dashboard/admin/products', [AdminDashboard::class, 'product'])->name('dashboard-admin-products-show');

        Route::get('/dashboard/admin/product/create', [AdminDashboard::class, 'createProduct'])->name('dashboard-admin-product-create');
        Route::post('/dashboard/admin/product/add', [AdminDashboard::class, 'addProduct'])->name('dashboard-admin-addProduct');

        Route::get('/dashboard/admin/product/update/{id}', [AdminDashboard::class, 'updateProduct'])->name('dashboard-admin-product-update');
        Route::post('/dashboard/admin/product/edit/{id}', [AdminDashboard::class, 'editProduct'])->name('dashboard-admin-editProduct');

        Route::delete('/dashboard/admin/product/{id}', [AdminDashboard::class, 'deleteProduct'])->name('dashboard-admin-productDelete');

        // Clients
        Route::get('dashboard/admin/clients', [AdminDashboard::class, 'clients'])->name('dashboard-admin-clients');
        Route::post('dashboard/admin/client/block_unblock/{id}', [AdminDashboard::class, 'clientChangeStatus'])->name('dashboard-admin-client-changeStatus');

        // Orders
        Route::get('/dashboard/admin/orders', [AdminDashboard::class, 'order'])->name('dashboard-admin-orders-show');
        Route::get('/dashboard/admin/order/update/{id}', [AdminDashboard::class, 'updateOrder'])->name('dashboard-admin-order-update');
        Route::put('/dashboard/admin/order/edit/{id}', [AdminDashboard::class, 'editOrderStatus'])->name('dashboard-admin-order-edit');

        // Import & Export & Pdf
        Route::post('dashboard/admin/import', [AdminDashboard::class, 'import'])->name('dashboard-admin-import');
        Route::get('dashboard/admin/export', [AdminDashboard::class, 'export'])->name('dashboard-admin-export');
        Route::get('dashboard/admin/pdf', [AdminDashboard::class, 'generateInvoice'])->name('dashboard-admin-pdf');
    });
    /* Admin Menu */

    /* Client Menu */
    Route::group(['middleware' => ['client']], function () {

        // Account Settings
        Route::get('/dashboard/client/account', [ClientDashboard::class, 'account'])->name('dashboard-client-account');
        Route::get('/dashboard/client/security', [ClientDashboard::class, 'security'])->name('dashboard-client-security');

        // Orders
        Route::get('/dashboard/client/orders', [ClientDashboard::class, 'order'])->name('dashboard-client-orders-show');
        Route::post('/order', [ClientDashboard::class, 'sendorder'])->name('makeOrder');

        Route::get('/dashboard/client/order/update/{id}', [ClientDashboard::class, 'updateOrder'])->name('dashboard-client-order-update');
        Route::delete('/dashboard/client/order/{id}', [ClientDashboard::class, 'cancelOrder'])->name('dashboard-client-order-cancel');
        Route::delete('/dashboard/client/orderItem/{id}', [ClientDashboard::class, 'cancelOrderItem'])->name('dashboard-client-orderItem-cancel');
    });
    /* Client Menu */
});
