@extends('landingpage.layout.index')
@section('content')
 <div class="my-16">
    <div class="max-w-screen-md mx-auto">
        <div>
            <img src="/img/tracking.png" class="mx-auto" alt="">
            <h3 class="text-2xl uppercase font-bold text-center">Tra cứu đơn hàng</h3>
            <div class="max-w-md mx-auto my-3">
                <p class="text-center text-lg text-gray-600">Kiểm tra tình trạng đơn hàng của bạn</p>
               <input type="text" class="border rounded-lg w-11/12 my-3 text-center input_ma" placeholder="Mã đơn hàng">
               <button class="w-11/12 bg-primary py-3 my-3 text-base text-white text-center rounded-lg btn_search">Tra cứu</button>
               <div class="flex text-center w-11/12 justify-center">
                <p class="mr-3">Bạn cần hỗ trợ?</p>
                <a href=""><img src="/img/zalo_tracking.png" class="mt-1 " alt=""></a>
                <a href=""><img src="/img/fb.png" class="mx-2" alt=""></a>
               </div>
            </div>
            
        </div>
    </div>
 </div>
@endsection