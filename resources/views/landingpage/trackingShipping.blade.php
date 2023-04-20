@extends('landingpage.layout.index')
@section('content')
 <div class="my-16 px-2">
    <div class="max-w-screen-md mx-auto">
        <div >
            <img src="/img/trackingShipping.png" class="mx-auto" alt="">
            <h3 class="text-2xl uppercase font-bold text-center">Tra cứu đơn hàng</h3>
            <div class="max-w-md mx-auto my-3">
                <p class="text-center text-lg text-gray-600">Kiểm tra tình trạng đơn hàng của bạn</p>
               <div class="min-[320px]:w-full  flex justify-between w-11/12 border rounded-lg px-3 py-2 my-3 bg-gray-100">
                <p class="text-base text-gray-500">Mã đơn hàng</p>
                <p class="uppercase text-base text-gray-500">CT0461236</p>
               </div>
               
              
            </div>
            
        </div>
    </div>
    <div class="flexmax-w-screen-lg justify-center">
        <!-- <div>
           <div class="text-center">
           <i class="fa-solid fa-circle-check icon_tracking" style="color: #15d144;"></i>
           </div>
            <div class="text-center my-2 item_tracking">
                <h4 class="text-green-700 text-sm font-semibold">Xác nhận đơn hàng</h4>
                <p class="text-green-700 text-sm ">25/03/2023, 15:00</p>
            </div>
        </div> -->
      
        <!-- <div class="row justify-content-between">
								<div class="order-tracking completed">
									<span class="is-complete"></span>
									<p>Đã đặt hàng<br><span>Mon, June 24</span></p>
								</div>
								<div class="order-tracking completed">
									<span class="is-complete"></span>
									<p>Shipped<br><span>Tue, June 25</span></p>
								</div>
								<div class="order-tracking">
									<span class="is-complete"></span>
									<p>Delivered<br><span>Fri, June 28</span></p>
								</div>
							</div> -->
                            
                            <div class="card mb-3 max-w-screen-md mx-auto">
         
          <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-cart"></i></div>
                </div>
                <h4 class="step-title tracking_title">Đã đặt hàng <p>25/03/2023, 15:00</p></h4>
                
              </div>
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-config"></i></div>
                </div>
                <h4 class="step-title tracking_title">Xác nhận đơn hàng <p>Dự kiến: 26/03/2023</p></h4>
              </div>
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-medal"></i></div>
                </div>
                <h4 class="step-title">Đóng gói <p>Dự kiến: 26/03/2023</p></h4>
              </div>
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-car"></i></div>
                </div>
                <h4 class="step-title">Vận chuyển <p>Dự kiến: 26/03/2023</p></h4>
              </div>
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-home"></i></div>
                </div>
                <h4 class="step-title">Giao hàng thành công <p>Dự kiến: 26/03/2023</p></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="max-w-md mx-auto">
            <button class="w-11/12 bg-primary py-3 my-3 text-lg text-white text-center rounded-lg btn_search">Tiếp tục mua sắm</button>
            <div class="flex text-center w-11/12 justify-center">
                <p class="mr-3">Bạn cần hỗ trợ?</p>
                <a href=""><img src="/img/zalo_tracking.png" class="mt-1 " alt=""></a>
                <a href=""><img src="/img/fb.png" class="mx-2" alt=""></a>
            </div>
        </div>
   </div>
 </div>
@endsection