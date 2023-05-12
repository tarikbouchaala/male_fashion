</html>
<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Orders</h2>
                <p><strong>Order date:</strong> {{ $orders[0]->created_at }}</p>
                <p><strong>Client Name:</strong> Men fashion</p>
                <p><strong>Client Email:</strong> menfashion@info.net</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID ORDER</th>
                            <th>CLIENT FULLNAME</th>
                            <th>CLIENT EMAIL</th>
                            <th>QUANTITY</th>
                            <th>SUB TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @php
                                $quantity = 0;
                                foreach ($order->orderItems as $orderItem) {
                                    $quantity += $orderItem->quantity;
                                }
                            @endphp
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    {{ $order->user->first_name . ' ' . $order->user->last_name }}
                                </td>
                                <td>{{ $order->user->email }}</td>
                                <td>
                                    {{ $quantity }}
                                </td>
                                <td>{{ $order->total_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right"><strong>TOTAL:</strong></td>
                            <td>{{ $ordersTotal }} $</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
