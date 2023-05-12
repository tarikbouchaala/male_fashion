{{-- Categories --}}
@if (session()->has('category-create-success'))
    <script>
        Toastify({
            text: "{{ session('category-create-success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            style: {
                background: "#198754"
            },
            stopOnFocus: true,
        }).showToast();
    </script>
@endif
@if (session()->has('category-update-success'))
    <script>
        Toastify({
            text: "{{ session('category-update-success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            style: {
                background: "#198754"
            },
            stopOnFocus: true,
        }).showToast();
    </script>
@endif
@if (session()->has('category-delete-success'))
    <script>
        Toastify({
            text: "{{ session('category-delete-success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            style: {
                background: "#198754"
            },
            stopOnFocus: true,
        }).showToast();
    </script>
@endif

{{-- Products --}}
@if (session()->has('product-create-success'))
    <script>
        Toastify({
            text: "{{ session('product-create-success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            style: {
                background: "#198754"
            },
            stopOnFocus: true,
        }).showToast();
    </script>
@endif
@if (session()->has('product-update-success'))
    <script>
        Toastify({
            text: "{{ session('product-update-success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            style: {
                background: "#198754"
            },
            stopOnFocus: true,
        }).showToast();
    </script>
@endif
@if (session()->has('order-status-update-success'))
    <script>
        Toastify({
            text: "Order Status Updated Successfully",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            style: {
                background: "#198754"
            },
            stopOnFocus: true,
        }).showToast();
    </script>
@endif
@if (session()->has('product-delete-success'))
    <script>
        Toastify({
            text: "{{ session('product-delete-success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            style: {
                background: "#198754"
            },
            stopOnFocus: true,
        }).showToast();
    </script>
@endif
{{-- Orders --}}
@if (session()->has('order-cancell-sucess'))
    <script>
        Toastify({
            text: "Order cancelled",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            style: {
                background: "#198754"
            },
            stopOnFocus: true,
        }).showToast();
    </script>
@endif
@if (session()->has('order-cancell-item-sucess'))
    <script>
        Toastify({
            text: "Item cancelled from order",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            style: {
                background: "#198754"
            },
            stopOnFocus: true,
        }).showToast();
    </script>
@endif
