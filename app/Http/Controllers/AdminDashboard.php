<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PDF;


class AdminDashboard extends Controller
{
    public function account()
    {
        return view('pages.dashboards.admin.account');
    }

    public function security()
    {
        return view('pages.dashboards.admin.security');
    }

    /* Category Management Start*/

    public function category()
    {
        $categories = Category::all();
        return view('pages.dashboards.admin.categories.show', compact('categories'));
    }

    public function createCategory()
    {
        return view('pages.dashboards.admin.categories.create');
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $image = $request->file('image');
        $filename = time() . '_' . rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/images', $filename);

        $category = Category::create([
            'name' => $request->input('name'),
            'image' => $filename,
        ]);

        return redirect()->route('dashboard-admin-categories-show')->with("category-create-success", "The Category " . strtolower($category['name']) . " is created successfully");
    }

    public function updateCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.dashboards.admin.categories.update', compact('category'));
    }

    public function editCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $category->name = $request->input('name');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);

            Storage::delete('public/images/' . $category->image);
            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('dashboard-admin-categories-show')->with("category-update-success", "Category updated successfully");
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $categoryName = $category->name;

        if ($category->image) {
            Storage::delete('public/images/' . $category->image);
        }

        $category->delete();

        return redirect()->route('dashboard-admin-categories-show')->with('category-delete-success', "The Category " . strtolower($categoryName) . " is deleted successfully");
    }

    /* Category Management End */

    /* Product Management Start */

    public function product()
    {
        $products = Product::all();
        return view('pages.dashboards.admin.products.show', compact('products'));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('pages.dashboards.admin.products.create', compact('categories'));
    }

    public function updateProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('pages.dashboards.admin.products.update', compact('product', 'categories'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|unique:products,name',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $image = $request->file('image');
        $filename = time() . '_' . rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/images', $filename);

        $product = Product::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $filename,
        ]);

        return redirect()->route('dashboard-admin-products-show')->with("product-create-success", "The Product " . strtolower($product['name']) . " is created successfully");
    }


    public function editProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|unique:products,name,' . $product->id,
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);

        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);

            Storage::delete('public/images/' . $product->image);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('dashboard-admin-products-show')->with("product-update-success", "Product updated successfully");
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $productName = $product->name;
        Storage::delete('public/images/' . $product->image);
        $product->delete();

        return redirect()->route('dashboard-admin-products-show')->with("product-delete-success", "The Product " . strtolower($productName) . " is deleted successfully");
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        Excel::import(new ProductsImport, request()->file('file'));

        return back();
    }

    /* Product Management End */

    public function clients()
    {
        $blocked_clients = User::where('is_admin', '0')->where('is_blocked', '1')->get();
        $unblocked_clients = User::where('is_admin', '0')->where('is_blocked', '0')->get();
        return view('pages.dashboards.admin.clients', compact('blocked_clients', 'unblocked_clients'));
    }

    public function clientChangeStatus($id)
    {
        $user = User::findOrfail($id);
        if ($user->is_blocked == 0) {
            $user->is_blocked = 1;
        } else {
            $user->is_blocked = 0;
        }
        $user->save();
        return redirect()->route('dashboard-admin-clients');
    }
    /* Orders */
    public function order()
    {
        $pendingOrders = Order::where('status', "pending")->get();
        $finishedOrders = Order::where('status', '!=', "pending")->get();
        return view('pages.dashboards.admin.orders.show', compact("pendingOrders", "finishedOrders"));
    }
    public function updateOrder($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where("order_id", $order->id)->get();

        return view('pages.dashboards.admin.orders.update', compact('orderItems'));
    }
    public function editOrderStatus($id)
    {
        request()->validate([
            'status' => 'required',
        ]);

        $order = Order::findOrFail($id);

        $order->status = request('status');
        $order->save();

        return redirect()->route('dashboard-admin-orders-show')->with('order-status-update-success');
    }
    public function generateInvoice()
    {
        $orders = Order::all();
        $ordersTotal = 0;
        foreach ($orders as $order) {
            $ordersTotal += $order['total_price'];
        }
        $data = [
            'orders' => $orders,
            'ordersTotal' => $ordersTotal
        ];

        $pdf = PDF::loadView('pages.pdf.ordersInvoice',$data);

        return $pdf->download('menfashion_invoice.pdf');
    }
}
