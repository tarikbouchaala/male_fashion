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

                            <span class="text-muted fw-light">Clients /</span>
                            Info
                        </h4>
                        @if ($blocked_clients->isEmpty() && $unblocked_clients->isEmpty())
                            <h1 class="card-body">No Clients found</h1>
                        @else
                            @if (!$unblocked_clients->isEmpty())
                                <div class="card">
                                    <h5 class="card-header d-flex align-items-center justify-content-between"><span>Active
                                            Users
                                            Table</span>
                                    </h5>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($unblocked_clients as $u_client)
                                                    <tr>
                                                        <td>{{ $u_client->id }}</td>
                                                        <td>{{ $u_client->first_name . ' ' . $u_client->last_name }}</td>
                                                        <td>
                                                            {{ $u_client->email }}
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('dashboard-admin-client-changeStatus', $u_client->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Block
                                                                    User</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                            @if (!$blocked_clients->isEmpty())
                                <div class="card my-3">
                                    <h5 class="card-header d-flex align-items-center justify-content-between"><span>Active
                                            Users
                                            Table</span>
                                    </h5>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($blocked_clients as $b_client)
                                                    <tr>
                                                        <td>{{ $b_client->id }}</td>
                                                        <td>{{ $b_client->first_name . ' ' . $b_client->last_name }}</td>
                                                        <td>
                                                            {{ $b_client->email }}
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('dashboard-admin-client-changeStatus', $b_client->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success">Unblock
                                                                    User</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        @endif
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
