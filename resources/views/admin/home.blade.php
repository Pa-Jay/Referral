@extends('layouts.admin')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h2 class="mb-0 mr-3 text-black font-w600">
                                        {{ $users->count() }} Users</h2>
                                </div>
                                <p class="mb-0">Total Users</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-header border-0 pb-0">
                        <div>
                            <h3 class="mb-0 text-black font-w600">
                                ${{ number_format($wallet_balance) }}</h3>
                            <p class="mb-1">Users' Wallet Balance</p>
                        </div>
                    </div>
                    <div class="card-body p-0  mt-widget">
                        <canvas id="revenueChart" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                       <timer-component end="{{ $countdown }}"></timer-component>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card bg-transparent shadow-none">
                    <div class="card-header pl-0 border-0">
                        <h4 class="card-title">Latest Users</h4>
                    </div>
                    <div class="card-body p-0 bg-white rounded shadow">
                        <div class="table-responsive">
                            <table class="table fs-14">
                                <thead>
                                    <tr>
                                        <th class="w-space-no">Username</th>
                                        <th class="w-space-no">Email</th>
                                        <th class="w-space-no">Wallet Balance</th>
                                        <th class="w-space-no">Address</th>
                                        <th class="w-space-no">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users->take(10) as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>${{ number_format($user->balance) }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
