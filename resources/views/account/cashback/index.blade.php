@extends('layouts.default')

@section('title', trans('message.account-earning-tab'))

@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible">{{ Session::get('error') }}</div>
        @endif
        @include('includes.account-setting-nav')

        <div class="row">
            <div class="col-md-3 col-sm-6 wow fadeInDown">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Tổng tài khoản:</h4>

                        <h2 class="text-center">
                            <span class="currency">{{ Auth::user()->total_amount }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4>Tài khoản khả dụng:</h4>

                        <h2 class="text-center">
                            <span class="currency">{{ Auth::user()->available_amount }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4>Chờ xác nhận:</h4>

                        <h2 class="text-center">
                            <span class="currency">{{ Auth::user()->pending_amount }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4>Giao dịch hủy:</h4>

                        <h2 class="text-center">
                            <span class="currency">{{ Auth::user()->rejected_amount }}</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 wow fadeInUp">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Chi tiết hoàn tiền</h3>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Ngày</th>
                            <th>Website</th>
                            <th>Giá trị đơn hàng</th>
                            <th>Hoàn tiền</th>
                            <th>Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $transation)
                            <tr>
                                <td>{{$transation->created_at}}</td>
                                <td>{{$transation->retailer_name}}</td>
                                <td>
                                    <span class="currency">{{ $transation->order_price }}</span>
                                </td>
                                <td>
                                    <span class="currency">{{ $transation->cashback_amount }}</span>
                                </td>
                                <td>
                                    <span class="label
                                        @if($transation->status == 'completed')
                                         label-success
                                         @elseif($transation->status == 'pending')
                                         label-warning
                                         @elseif($transation->status == 'rejected')
                                         label-danger
                                         @endif">
                                        {{trans('message.status-'.$transation->status)}}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Chưa có giao dịch nào được ghi nhận</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {!! $transactions->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop