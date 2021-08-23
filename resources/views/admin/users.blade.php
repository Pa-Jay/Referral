@extends('layouts.admin')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">All Users</a></li>
            </ol>
        </div>
        <div class="row">

            <div class="col-xl-12">
                <div class="card bg-transparent shadow-none">
                    <div class="card-header pl-0 border-0">
                        <h4 class="card-title">Users</h4>
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
                                    @foreach ($users as $user)
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
