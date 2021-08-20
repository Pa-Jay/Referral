@extends('layouts.app')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" value="{{ Auth::user()->username }}" readonly  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" value="{{ Auth::user()->email }}" readonly  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Wallet Address</label>
                                <input type="text" value="{{ Auth::user()->address }}" readonly  class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
