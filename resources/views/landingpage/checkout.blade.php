@extends('landingpage.layout.index')
@section('content')
<div class="container  top-55 rounded">

        <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white font_inter">Thanh toán</label>
        <label  class="block mb-2 text-sm text_base dark:text-white">Sắp hoàn thành rồi! Hãy điền thông tin của bạn để hoàn tất quá trình thanh toán nhé.</label>

    <div class="lg:block xl:flex xl:my-5 w-full">
        <form class="lg:block xl:flex  w-full" method="POST" action="{{ route('checkout') }}">
            {{ csrf_field() }}
            <div class="form_info sm:pr-0 lg:w-full xl:w-3/5 pr-6">
                <label  class="block mb-2 text-sm text_base dark:text-white font_inter">Thông tin giao hàng</label>
                <div class="sm:grid-cols-2 grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Họ và tên" required>
                    </div>
                    <div>
                        <input type="tel" name="phone_number" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Số điện thoại" pattern="[0-9]{10}" required>
                    </div>
                </div>
                <div class="sm:grid-cols-3 grid gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <select id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Chọn tỉnh/thành</option>
                        </select>
                    </div>
                    <div>
                        <select id="district" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Chọn quận/huyện</option>
                        </select>
                    </div>
                    <div>
                        <select id="ward" name="ward" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Chọn phường/xã</option>
                        </select>
                    </div>
                </div>
                <div class="mb-6">
                    <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Số nhà, địa chỉ cụ thể" required>
                </div>
                <div class="mb-6">
                    <textarea  type="text" name="note" id="note" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ghi chú về đơn hàng, thời gian hoặc thời điểm giao hàng chi tiết..." ></textarea>
                </div>
                <div class="paymen_method rounded border ">
                    <div class="payment_title p-2 bg-gray-50">
                        <label  class="mr-4 block mb-2  text-2xl text_base  dark:text-white font_inter">Phương thức thanh toán:</label>
                    </div>

                    <ul class="p-6">
                        @foreach ($payment_method as $index=>$payment_m)
                            <div class=" items-center  mb-4">
                                <div class="type_pay flex mr-20">
                                    <input id="default-radio-1" @if($index == 0) checked @endif type="radio" value="{{ $payment_m->id }}" name="payment_method" class="payment_type m-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <img src="{{ $payment_m->thumb }}" alt="">
                                    <label for="default-radio-1" class="m-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $payment_m->name }}</label>
                                </div>
                                @if($payment_m->payment_info != null)
                                <div class="payment_des rounded mt-10 ml-20 hidden " id="paymenttype_{{ $payment_m->id }}">
                                    {!! $payment_m->payment_info->description !!}
                                    <img class="w-40 p-2" src="{{ $payment_m->payment_info->qr_code }}" alt="">
                                </div>
                                @endif
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab_order  sm:pl-0 sm:my-5 lg:w-full lg:pl-0 xl:w-2/5 xl:pl-5 xl:my-0">
                <label  class="block mb-2 text-sm text_base dark:text-white font_inter">Đơn hàng</label>
                <div class="paymen_method rounded border  grid gap-6 mb-6 ">
                    <div class="payment_title p-2 bg-gray-50 flex js_sp_betteen">
                        <label  class="mr-4 block mb-2  text-sm text_base  dark:text-white font_inter">Sản phẩm:</label>
                        <label  class="mr-4 block mb-2  text-sm text_base  dark:text-white font_inter">Giá tiền</label>
                    </div>
                    <div class="item">
                        @foreach ($carts as $cart)
                            <div class="product flex">
                                <div class="image_item w-1/6">
                                    <img src="{{ $cart->attributes[0]['image']}}" class="w-24 m-2 border rounded" alt="">
                                </div>

                                <div class="info_item  ml-2 w-3/6">
                                    <label class="block mb-2  text-sm text_base  dark:text-white font_inter">{{ $cart->name }}</label>
                                    <label class="block  items-center text-2sm  text-gray-400 dark:text-white ">SL: {{ $cart->quantity }}</label>
                                </div>
                                <div class="info_item  ml-2 w-2/6">
                                <label class="block  text-end text-2sm  text-gray-600 dark:text-white ">{{ number_format($cart->getPriceSum()) }} đ</label>
                                </div>
                            </div>

                            @endforeach
                    </div>
                    <div class="px-3 py-2 border">
                        <div class=" flex js_sp_betteen">
                            <label  class="block  text-end text-2sm  text-gray-600 dark:text-white ">Tạm tính</label>
                            <label  class="block  text-end text-2sm  text-gray-600 dark:text-white ">{{ number_format(Cart::getSubTotalWithoutConditions()) }} đ</label>
                        </div>
                        <div class=" flex js_sp_betteen">
                            @foreach (Cart::getConditions() as $condition)
                            <label  class="block  text-end text-2sm  text-gray-600 dark:text-white ">{{  $condition->getName() }}</label>
                            <label  class="block  text-end text-2sm  text-gray-600 dark:text-white ">{{  $condition->getValue() }} đ</label>
                            @endforeach

                        </div>
                        <div class=" flex js_sp_betteen">
                            <label  class="block  text-end text-2sm  text-gray-600 dark:text-white ">Phí ship</label>
                            <label  class="block  text-end text-2sm  text-gray-600 dark:text-white ">{{ number_format(Cart::getSubTotalWithoutConditions()* ($shipping_fee != null ? $shipping_fee->fee : 1)/100) }} đ</label>
                            <input type="hidden" name="shipping_fee" value="{{  (Cart::getSubTotalWithoutConditions()* ($shipping_fee != null ? $shipping_fee->fee : 1)) /100 }}" >
                        </div>
                        <div class=" flex js_sp_betteen">
                            <label  class="block  text-end text-2sm  text-gray-600 dark:text-white ">Tổng</label>
                            <label  class="block  text-end text-2sm  text-gray-600 dark:text-white ">{{ number_format(Cart::getSubTotal() + Cart::getSubTotalWithoutConditions()* ($shipping_fee != null ? $shipping_fee->fee : 1) /100)}} đ</label>

                        </div>
                        <div class=" flex js_sp_betteen">
                            <button type="submit" class="m-2  p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">THANH TOÁN</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script type="text/javascript">
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
          url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
          method: "GET",
          responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
          renderCity(result.data);
        });

        function renderCity(data) {
          for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Name);
          }
          citis.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if(this.value != ""){
              const result = data.filter(n => n.Name === this.value);

              for (const k of result[0].Districts) {
                district.options[district.options.length] = new Option(k.Name, k.Name);
              }
            }
          };
          district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Name === citis.value);
            if (this.value != "") {
              const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

              for (const w of dataWards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Name);
              }
            }
          };
        }
</script>
<script>
    $(document).ready(function() {
        var allInputItem = $(".payment_type:checked");
        // console.log(allInputItem);
        allInputItem.each(function(){
            $(`#paymenttype_${this.value}`).fadeIn();
            console.log(this.value);
        });
        $(".payment_type").click(function(){
                $('.payment_des').fadeOut();
                $(`#paymenttype_${this.value}`).fadeIn();
        });
    });
</script>
@endsection

