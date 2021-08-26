@extends('layouts.admin')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Settings</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.settings') }}" method="post">@csrf
                            <div class="form-group">
                                <label for="">Referral Payment</label>
                                <input type="number" step="any" name="ref_payment" value="{{ $ref_payment }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Initial Balance</label>
                                <input type="number" step="any" name="initial_balance" value="{{ $initial_balance }}" class="form-control">
                            </div>

                            <button class="btn btn-primary">Update</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.update-countdown') }}" method="post">@csrf
                            <h4>{{ \Carbon\Carbon::parse($countdown)->format('D M d, Y. h:ia') }}</h4>
                            <div class="form-group">
                                <label for="">Countdown</label> 
                                <input type="datetime-local" name="countdown" value="" class="form-control">
                            </div>

                            <button class="btn btn-primary">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
