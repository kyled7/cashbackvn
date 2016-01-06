@extends('layouts.default')

@section('title', $retailer->name)

@section('content')
    <div class="container">
        Mua hàng tại {{ $retailer->name }}, chúc bạn mua hàng vui vẻ và tích lũy hoàn tiền.<br>
        Chuyển tới trang mua hàng sau <span id="countdown"></span> giây.<br>
        <a href="{{ $retailer->redirect_link }}">Click vào đây nếu trình duyệt không tự chuyển</a>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var delay = 5 ;
            var url = "{{ $retailer->redirect_link }}";
            $('#countdown').html(delay);
            var countdown = setInterval(function(){
                $('#countdown').html(delay);
                if (delay == 0) {
                    clearInterval(countdown);
//                    window.open(url, '_self');
                }
                delay--;
            }, 1000);
        });
    </script>
@stop