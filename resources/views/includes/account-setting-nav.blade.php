<ul class="nav nav-pills nav-justified">
    <li role="presentation" @if(Request::url() == action('Account\SettingController@getIndex') || Request::path() == 'account')
        class="active" @endif>
        <a href="{{ action('Account\SettingController@getIndex') }}">{{ trans('message.account-setting-tab') }}</a>
    </li>
    <li role="presentation" @if(Request::is('account/cashback*')) class="active" @endif>
        <a href="{{ action('Account\CashbackController@getIndex') }}">{{ trans('message.account-earning-tab') }}</a>
    </li>
    <li role="presentation" @if(Request::is('account/redeem*')) class="active" @endif>
        <a href="{{ action('Account\RedeemController@getIndex') }}">{{ trans('message.account-payment-tab') }}</a>
    </li>
</ul>
<hr>