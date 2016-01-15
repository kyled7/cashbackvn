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
                        <h4>{{ trans('message.total_amount') }}</h4>

                        <h2 class="text-center">
                            <span class="currency">{{ Auth::user()->total_amount }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4>{{ trans('message.available_amount') }}</h4>

                        <h2 class="text-center">
                            <span class="currency">{{ Auth::user()->available_amount }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4>{{ trans('message.pending_amount') }}</h4>

                        <h2 class="text-center">
                            <span class="currency">{{ Auth::user()->pending_amount }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4>{{ trans('message.rejected_amount') }}</h4>

                        <h2 class="text-center">
                            <span class="currency">{{ Auth::user()->rejected_amount }}</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 wow fadeInUp">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ trans('message.detail_cashback') }}</h3>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{ trans('message.detail_cashback_date') }}</th>
                            <th>{{ trans('message.detail_cashback_retailer_name') }}</th>
                            <th>{{ trans('message.detail_cashback_order_price') }}</th>
                            <th>{{ trans('message.detail_cashback_amount') }}</th>
                            <th>{{ trans('message.detail_cashback_status') }}</th>
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
                                <td colspan="5" class="text-center">{{ trans('message.detail_cashback_norecord') }}</td>
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