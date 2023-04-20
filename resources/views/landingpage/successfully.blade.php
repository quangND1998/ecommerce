@extends('landingpage.layout.index')
@section('content')
 <div class="my-16">
    <div class="max-w-screen-md mx-auto">
        <div>
            <img src="/img/successfully.png" class="mx-auto" alt="">
            <h3 class="text-2xl uppercase font-bold text-center">Bạn đã đặt hàng thành công!</h3>
            <div class="max-w-md mx-auto my-3">
                <p class="text-center text-lg text-gray-600">Nhân viên chăm sóc khách hàng sẽ liên hệ với bạn qua số điện thoại: <span class="text-blue-500">0367 123 610</span>  trong vòng 24h để xác nhận đơn hàng.</p>
                <p class="text-center text-lg text-gray-600 my-3">Mã đơn hàng của bạn:</p>
                <div class="p-5 font-bold text-2xl uppercase bg-gray-100 rounded-lg text-center">
                    {{ $order->order_number }}
                </div>
                <p lass="text-center text-lg text-gray-600 py-3">Bạn có thể sử dụng mã này để tra cứu đơn hàng</p>
                <div class=" max-w-md bg-primary text-white py-3 text-center rounded-lg my-3"><a href="" class="text-white text-lg hover:no-underline">Tiếp tục mua sắm</a> </div>
            </div>
            
        </div>
    </div>
 </div>
@endsection