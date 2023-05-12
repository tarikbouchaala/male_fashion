<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class ClientDashboard extends Controller
{
    public function account()
    {
        return view('pages.dashboards.client.account');
    }

    public function security()
    {
        return view('pages.dashboards.client.security');
    }

    public function order()
    {
        $myPendingOrders = Order::where("user_id", Auth::id())->where('status', 'pending')->get();
        $myFinishedOrders = Order::where("user_id", Auth::id())->where('status', '!=', 'pending')->get();
        return view('pages.dashboards.client.orders.show', compact('myPendingOrders', 'myFinishedOrders'));
    }

    public function sendOrder(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email'],
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = Auth::user();
                    if (!Auth::validate(['email' => $user->email, 'password' => $value])) {
                        $fail('The provided password does not match your account password.');
                    }
                },
            ],
        ]);

        $cart = json_decode(request()->cookie('cart'), true);

        $totalPrice = 0;
        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $price = $product->price;
                $quantity = $item['quantity'];
                $subtotal = $price * $quantity;
                $totalPrice += $subtotal;
            }
        }

        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_price = $totalPrice;
        $order->status = 'pending';
        $order->save();

        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $item['quantity'];
                $orderItem->save();
            }
        }

        $cookie = Cookie::forget('cart');
        return Redirect::to('/dashboard/client/orders')->withCookie($cookie)->with('order-success', true);
    }



    public function updateOrder($orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->user_id !== Auth::user()->id) {
            return redirect()->route('dashboard-client-orders-show');
        }

        $orderedItems = OrderItem::where('order_id', $order->id)->get();

        return view('pages.dashboards.client.orders.update', compact('orderedItems'));
    }
    public function cancelOrderItem($orderItemId)
    {
        $orderItem = OrderItem::findOrFail($orderItemId);
        $order = Order::findOrFail($orderItem->id);

        if ($order->user_id !== Auth::user()->id) {
            return redirect()->route('dashboard-client-orders-show');
        }

        $orderItem->delete();

        return redirect()->route('dashboard-client-orders-show')->with('order-cancell-item-sucess');
    }

    public function cancelOrder($orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->user_id !== Auth::user()->id) {
            return redirect()->route('dashboard-client-orders-show');
        }

        $order->status = "cancelled";
        $order->save();

        return redirect()->route('dashboard-client-orders-show')->with('order-cancell-sucess');
    }


    public function adress()
    {
        return view('pages.dashboards.client.adresses.show');
    }

    public function createAdress()
    {
        return view('pages.dashboards.client.adresses.create');
    }

    public function updateAdress()
    {
        return view('pages.dashboards.client.adresses.update');
    }
}
