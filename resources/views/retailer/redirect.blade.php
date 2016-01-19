@extends('layouts.default')

@section('title', $retailer->name . ' - mua hàng trực tuyến và nhận hoàn tiền tại HoànTiền.VN')

@section('content')
    <div class="container">
        <div class="jumbotron col-xs-12">
            <div class="jumbotron-contents text-center">
                <div class="col-xs-12">
                    <h2 class="lead">Mua hàng với {{ $retailer->name }} và nhận hoàn tiền từ HoanTien.VN</h2>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <img src="{{ url('images/'. $retailer->logo) }}" class="img-thumbnail" style="margin-bottom: 10px">

                        <br>Chuyển tới trang mua hàng sau <span id="countdown"></span> giây.
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ $retailer->redirect_link }}">Click vào đây nếu trình duyệt không tự chuyển</a>

                <p class="img-comment"><strong>Lưu ý:</strong> Để ghi nhận đơn hàng và hoàn tiền thành công, vui lòng chỉ tiến hành mua hàng trên tab hiện tại!</p>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var delay = 5 ;
            var url = htmlDecode('{{ $retailer->redirect_link }}');
            $('#countdown').html(delay);
            var countdown = setInterval(function(){
                $('#countdown').html(delay);
                if (delay == 0) {
                    clearInterval(countdown);
                    window.open(url, '_self');
                }
                delay--;
            }, 1000);
        });
        function htmlDecode(input){
            var e = document.createElement('div');
            e.innerHTML = input;
            return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
        }
    </script>
@stop