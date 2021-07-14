@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{trans("text.orders")}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/pizzalar" class="btn btn-primary" style="margin-top: 10px;"> {{trans("text.lookOrders")}}</a><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection