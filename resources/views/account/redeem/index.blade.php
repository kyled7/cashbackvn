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
                @if($pending_redeem_request)
                    <div class="col-md-6">
                        <h3 class="lead">Yêu cầu thanh toán hiện tại</h3>
                        {!! Form::model($pending_redeem_request, [
                            'method' => 'PATCH',
                            'url' => ['account/redeem/update', $pending_redeem_request],
                            'onsubmit' => 'formSubmit()']) !!}

                        <div class="form-group">
                            {!! Form::label('requested_amount', 'Số tiền muốn thanh toán', ['class' => 'control-label']) !!}
                            {!! Form::text('requested_amount', null, [
                                'class' => 'form-control',
                                'step'=> '100000',
                                'min' => '100000',
                                'max' => Auth::user()->available_amount,
                                'onKeyDown' => 'return false'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            Ngày tạo yêu cầu: {{ $pending_redeem_request->created_at }}
                        </div>
                        <div class="form-group">
                            Trạng thái: {{ trans('message.redeem_requets_status_'.$pending_redeem_request->status) }}
                        </div>

                        <div class="form-group">
                            {!! Form::submit(trans('message.redeem_request_update'), ['class' => 'btn btn-warning btn-lg']) !!}
                            {!! Form::close() !!}

                            {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['account/redeem/destroy', $pending_redeem_request->id],
                                        'onsubmit' => "return confirm('{$confirm_message}');",
                                        'class' => 'inline'
                                    ]) !!}
                            {!! Form::submit(trans('message.redeem_cancel_button'), ['class' => 'btn btn-danger btn-lg']) !!}
                            {!! Form::close() !!}
                        </div>

                    </div>
                @else
                    {{--Show requets form--}}
                    <div class="col-md-6">
                        <h3 class="lead">Yêu cầu thanh toán</h3>
                        {!! Form::open(['url' => 'account/redeem/create', 'onsubmit' => 'formSubmit()']) !!}

                        <div class="form-group">
                            {!! Form::label('requested_amount', 'Số tiền muốn thanh toán', ['class' => 'control-label']) !!}
                            {!! Form::text('requested_amount', 100000, [
                                'class' => 'form-control',
                                'step'=> '100000',
                                'min' => '100000',
                                'max' => Auth::user()->available_amount,
                                'onKeyDown' => 'return false'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit(trans('message.redeem_request'), ['class' => 'btn btn-warning btn-lg']) !!}
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
    <script>
        $(function () {
            // Set up the number formatting.
            $('#requested_amount').spinner({
                numberFormat: "C0"
            });

        });
        function formSubmit() {
            $('#requested_amount').val($('#requested_amount').attr("aria-valuenow"));
        }
    </script>
@stop