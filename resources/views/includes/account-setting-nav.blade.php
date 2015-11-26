@section('account-navbar')
<ul class="nav nav-pills nav-justified">
    <li role="presentation" class="active">
        <a href="{{ action('Account\SettingController@getIndex') }}">{{ trans('message.account-setting-tab') }}</a>
    </li>
    <li role="presentation" >
        <a href="#">{{ trans('message.account-earning-tab') }}</a>
    </li>
    <li role="presentation" >
        <a href="#">{{ trans('message.account-payment-tab') }}</a>
    </li>
</ul>
@stop