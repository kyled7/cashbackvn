@extends('layouts.default')


@section('title', trans('message.account-payment-tab'))

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
            @if(Auth::user()->available_amount < 100000)
                {{--Not enough money to make payment--}}
                <div class="col-xs-12">
                    <p class="lead">Tài khoản của bạn chưa đủ để yêu cầu thanh toán.</p>
                </div>
            @else
                @if(Auth::user()->pending_redeem_request)
                    Show pending request
                @else
                    {{--Show requets form--}}
                    <div class="col-md-6">
                        <h3 class="lead">Yêu cầu thanh toán</h3>
                        {!! Form::open(['url' => 'account/redeem']) !!}

                        <div class="form-group ">
                            {!! Form::label('requested_amount', 'Số tiền muốn thanh toán', ['class' => 'control-label']) !!}
                            <div class="stepper-input">
                                {!! Form::input('number', 'requested_amount', 100000, [
                                    'class' => 'form-control',
                                    'step'=> '100000',
                                    'min' => '100000',
                                    'max' => Auth::user()->available_amount,
                                    'onkeydown' => 'return false'
                                ]) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                @endif
            @endif

            <div class="col-xs-12 wow fadeInUp">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse"
                               href="#history-table" aria-expanded="true"
                               aria-controls="history-table">
                                Xem chi tiết tài khoản chính
                            </a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="collapseListGroupHeading1"
                         aria-expanded="false" style="height: 0px;" id="history-table">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>Nội dung</th>
                                <th>Ghi nợ</th>
                                <th>Ghi có</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($histories as $history)
                                <tr>
                                    <td>{{$history->created_at}}</td>
                                    <td>{{$history->description}}</td>
                                    <td>
                                        @if($history->amount_change < 0)
                                            {{number_format($history->amount_change*-1, 0, ',', '.')}}<span
                                                    class="small">đ</span>
                                        @endif
                                    </td>
                                    <td>@if($history->amount_change > 0)
                                            {{number_format($history->amount_change, 0, ',', '.')}}<span
                                                    class="small">đ</span>
                                        @endif</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Oops, tài khoản của bạn không có giao dịch nào
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {!! $histories->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop