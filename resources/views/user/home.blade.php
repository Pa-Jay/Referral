@extends('layouts.app')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            @if ($notification)
            <div class="col-md-12">
                <div class="card card-body">
                    <h5>{{ $notification->title }}</h5>
                    <p>{{$notification->message}}</p>
                </div>
            </div>
            @endif
            <div class="col-xl-3 col-xxl-5 col-lg-5">
                <div class="row">
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <h2 class="mb-0 mr-3 text-black font-w600">
                                                {{ Auth::user()->referrals->count() }} Users</h2>
                                        </div>
                                        <p class="mb-0">Referrals</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="card-header border-0 pb-0">
                                <div>
                                    <h3 class="mb-0 text-black font-w600">
                                        ${{ number_format(Auth::user()->balance) }}</h3>
                                    <p class="mb-1">Wallet Balance</p>
                                </div>
                            </div>
                            <div class="card-body p-0  mt-widget">
                                <canvas id="revenueChart" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-7 col-lg-7">
                <div class="card">
                    <div class="card-body countdown-box ">
                        <h4 class="text-white text-center mb-3">Countdown</h4>
                        <div class="d-flex justify-content-center">
                            <div class="time-box">00</div>
                            <span class="seperator">:</span>
                            <div class="time-box">00</div>
                            <span class="seperator">:</span>
                            <div class="time-box">00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card bg-transparent shadow-none">
                    <div class="card-header pl-0 border-0  d-flex justify-content-between">
                        <h4 class="card-title">Referrals</h4>
                        <div class="col-10 col-md-5">
                            <div class="input-group">
                                <input type="text" value="{{ env('APP_URL').'/register/'. Auth::user()->ref_code }}"
                                    class="form-control ">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary"
                                        onclick="copy(`{{ env('APP_URL').'/register/?ref_code='. Auth::user()->ref_code }}`)">Copy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 bg-white rounded shadow">
                        <div class="table-responsive">
                            <table class="table fs-14">
                                <thead>
                                    <tr>
                                        <th class="w-space-no">ID</th>
                                        <th class="w-space-no">Username</th>
                                        <th class="w-space-no">Email</th>
                                        <th class="w-space-no">Verified</th>
                                        <th class="w-space-no">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($referrals as $user)
                                    <tr>
                                        <td>000{{ $user->id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
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
