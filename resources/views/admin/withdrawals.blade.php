@extends('layouts.admin')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pending Withdrawals</a></li>
            </ol>
        </div>
        <div class="row">

            <div class="col-xl-12">
                <div class="card bg-transparent shadow-none">
                    <div class="card-header pl-0 border-0">
                        <h4 class="card-title">Withdraws</h4>
                    </div>
                    <div class="card-body p-0 bg-white rounded shadow">
                        <div class="table-responsive">
                            <table class="table fs-14">
                                <thead>
                                    <tr>
                                        <th class="w-space-no">Username</th>
                                        <th class="w-space-no">Email</th>
                                        <th class="w-space-no">Refs</th>
                                        <th class="w-space-no">Amount</th>
                                        <th class="w-space-no">Address</th>
                                        <th class="w-space-no">Date</th>
                                        <th class="w-space-no">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdrawals as $txn)
                                    <tr>
                                        <td>{{ $txn->user->username }}</td>
                                        <td>{{ $txn->user->email }}</td>
                                        <td>{{ $txn->user->referrals->count() }}</td>
                                        <td>${{ number_format($txn->amount) }}</td>
                                        <td>{{ $txn->user->address }}</td>
                                        <td>{{ $txn->created_at->format('d M Y, h:ia') }}</td>
                                        <td>
                                            <a href="{{ route('withdraw.confirm', $txn) }}">
                                                <button class="btn btn-primary">Confirm</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                    {{ $withdrawals->links() }}
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
