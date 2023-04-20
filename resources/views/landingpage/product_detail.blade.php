@extends('landingpage.layout.index')
@section('content')
<div class="min-[320px]:p-0 container w-full   ">
    <div class="min-[320px]:flex min-[320px]:flex-col-reverse sm:flex sm:flex-col-reverse lg:flex lg:flex-row lg:p-4 m-3 p-3 flex js_sp_betteen border rounded add_product_detail">
        <div class="min-[320px]:w-full sm:w-full lg:w-1/2 item w-1/2 slick_img">
            <div class="clearfix w-full">
                <div class="slider slider-for">
                    @foreach ($product->images as $img)
                    <img src="{{ $img->image }}" alt="">
                    @endforeach
                </div>
                <div class="min-[320px]:w-full slider slider-nav">
                    @foreach ($product->images as $img)
                    <img src="{{ $img->image }}"  class="min-[320px]:w-full slide_item"  alt="">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="min-[320px]:w-full min-[320px]:ml-0 sm:w-full sm:mx-auto md:w-full md:mx-auto item w-1/2 item_info_detail lg:w-1/2 lg:pl-4 ml-6">
            <div class="min-[320px]:mr-0 mr-10">
                <label class="block mb-2  text-title-product text-gray-900 dark:text-white font_inter">{{ $product->name }}</label>
                <div class="info_product flex">
                    <label  class="block mb-2 text-sm text_base dark:text-white">SKU: {{ $product->SKU }}</label>
                    <label  class="block mb-2 text-sm text_base dark:text-white">{{ $product->quantity_sold_auto }} đã bán</label>
                    @if($product->status == 1)
                    <div class="min-[320px]:hidden sm:flex md:flex lg:flex">
                        <img class="p-2" src="img/icon_tick_circel.png" alt="">
                        <label  class="block mb-2 text-sm text_base dark:text-white"> còn hàng </label>
                    </div>

                    @else
                        <label  class="block mb-2 text-sm text_base dark:text-white"> Hết hàng </label>
                    @endif
                </div>
                <div class=" min:[320px]:block  sm:block md:block lg:hidden rounded-xl py-3 sale_mobile mb-3">
                    <div class="">
                        <div class="flex justify-center">
                            <img src="/img/icon_sale.png" alt="">
                            <h1 class="font-black text-xl italic text-white mx-2">Săn sale gia sốc</h1>
                        </div>
                        <div id="simple-timer" class="font_inter flex justify-center mt-2"></div>
                    </div>
                </div>
                <div class="div_price flex items-center ">
                    <label class="block mb-2 text-price font-medium font_inter">{{ number_format(($sale_event == null || $sale_item == null) ?  $product->cost :  $sale_item->price_sale)}} ₫</label>
                    @if($sale_event != null && $sale_item != null)
                        <label  class="min-[320px]:hidden sm:block md:block lg:block xl:block 2xl:block mb-2 ml-4 line-through text-xl text_base dark:text-white">{{ number_format($sale_item->price) }} ₫</label>
                    @endif
                </div>
                <div class="min-[320px]:w-full div_price flex items-center js_sp_betteen">
                    <label class="block mb-2 font-medium font_inter">Số lượng: </label>
                    <div class="min-[320px]:w-full custom-number-input h-10 w-32">
                        <div class="min-[320px]:justify-end flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                            <button data-action="decrement" class="border rounded-l btn_quality px-3 py-1">
                                    <span class="m-auto text-2xl font-thin">−</span>
                            </button>
                            <input type="number" id="number_quality" class="border value_quality text-center " name="custom-input-number" value="50" min="50" style="width:60px" />
                            <button data-action="increment" class="border rounded-r btn_quality px-3 py-1">
                                <span class="m-auto text-2xl font-thin">+</span>
                            </button>
                    </div>
                    </div>
                </div>

                <div class="mt-8">
                    <form action="{{ route('addtocart') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" id="product_id" name="product_id">
                        <input type="hidden" value="{{ $product->name }}" id="product_name" name="name">
                        <input type="hidden" class="quantity_cart" id="quantity_cart" name="quantity_cart">
                        <button class="min-[320px]:mr-4 w-1/6 flex items-center justify-center hover:bg-blue-300 hover:text-white text-gray-600 font-bold  border  mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded btn_search">
                            <img class="pr-3" src="img/cart.png" alt=""> THÊM GIỎ HÀNG
                        </button>
                    </form>
                    <button class="btn_buynow w-1/6 bg-blue-500 hover:bg-blue-700 text-white font-bold  border  mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded btn_search">
                        MUA NGAY
                    </button>
                </div>
                <div class="paymen_method ">
                    <label  class="mr-4 block mb-2 text-sm text_base dark:text-white">Phương thức thanh toán:</label>
                    <ul class="flex">
                        @foreach ($payment_method as $method)
                            <li class="mr-4">
                                <img src="{{ $method->thumb }}" alt="">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container  top-55 rounded min-[320px]:block sm:block md:block  lg:flex ">
    <div class="min-[320px]:w-full min-[320px]:my-2 sm:flex md:flex lg:block  sm:w-full sm:m-0  lg:my-2 md:w-full md:m-0 xl:flex mr-2 p-2 item_ship_info flex w-1/3 border rounded">
        <div class="  items-center">
            <img  src="img/icon_freeship.png" class="lg:mx-auto" alt="">
        </div>

        <div class="ml-3 mt-2">
            <label  class="block mb-2 text-sm font-semibold   dark:text-white">Freeship nội thành Hà Nội</label>
            <label  class="block mb-2 text-sm text_base dark:text-white  rounded">Freeship Hà Nội: Đơn trên 1,000,000đ. (Nhận hàng sau 6-24h)</label>
        </div>

    </div>
    <div class="min-[320px]:w-full min-[320px]:my-2 sm:flex md:flex lg:block sm:w-full sm:my-2 lg:my-2 lg:mx-2  xl:flex p-2  item_ship_info flex w-1/3 border rounded">
        <div class="flex items-center">
            <img   src="img/icon_lock.png" class="lg:mx-auto" alt="">
        </div>

        <div class="ml-3 mt-3">
            <label  class="block mb-2 text-sm  font-semibold dark:text-white">Giao hàng hỏa tốc</label>
            <label  class="block mb-2 text-sm text_base dark:text-white  rounded">Giao hàng hỏa tốc nội thành Hà Nội trong vòng 6-24h</label>
        </div>

    </div>
    <div class="min-[320px]:w-full min-[320px]:my-2 sm:flex md:flex lg:block sm:w-full sm:ml-0 lg:my-2 md:w-full md:ml-0  xl:flex p-2  item_ship_info flex w-1/3 border rounded">
        <div class="flex items-center">
            <img   src="img/icon_ship.png" class="lg:mx-auto" alt="">
        </div>

        <div class="ml-3 mt-3">
            <label  class="block mb-2 text-sm   font-semibold dark:text-white">Giao hàng COD toàn quốc</label>
            <label  class="block mb-2 text-sm text_base dark:text-white  rounded">Nhận hàng sau 2-4 ngày</label>
        </div>

    </div>
</div>
<div class="container  top-55 rounded">
    <div class="flex top_sale js_sp_betteen items-center">
        <div class="flex">
            <label for="" class="min-[320px]:text-sm block mb-2 text_sale text-black dark:text-white rounded">SẢN PHẨM BÁN CHẠY</label>
        </div>

        <div>
            <a href=""  class="hover: no-underline border rounded-full padding_more items-center text-sm text_base dark:text-white">Xem tất cả   ></a>
        </div>
    </div>
    <section class="regular slider">
        {{-- <div class="item_sale rounded border">

            <img class="rounded image_item" src="/img/hop2.jpg"  alt="...">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>

            </div>
        </div>
        <div class="item_sale rounded border">

            <img class="rounded image_item" src="/img/hop3.jpg"  alt="...">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>

            </div>
        </div>
        <div class="item_sale rounded border">

            <img class="rounded image_item" src="/img/hop4.jpg"  alt="...">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>

            </div>
        </div>
        <div class="item_sale rounded border">

            <img class="rounded image_item" src="/img/hop5.jpg"  alt="...">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>

            </div>
        </div>
        <div class="item_sale rounded border">

            <img class="rounded image_item" src="/img/hop2.jpg"  alt="...">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>

            </div>
        </div>
        <div class="item_sale rounded border">

            <img class="rounded image_item" src="/img/hop3.jpg"  alt="...">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>

            </div>
        </div>
        <div class="item_sale rounded border">

            <img class="rounded image_item" src="/img/hop4.jpg"  alt="...">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>

            </div>
        </div>
        <div class="item_sale rounded border">

            <img class="rounded image_item" src="/img/hop5.jpg"  alt="...">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>

            </div>
        </div> --}}
        @foreach ($best_seller as $seller)
        <div class="item_sale rounded border">
            <a href="product_detail/{{ $seller->slug }}" class="hover:no-underline">
            <img class="rounded image_item" src="{{ $seller->first_image?$seller->first_image->image: '' }}"  alt="{{ $seller->name }}">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">{{ $seller->name }}</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">{{ $seller->auto_sold ==  0 ? $seller->quantity_sold : $seller->quantity_sold_auto }} đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">{{ number_format($seller->price) }} đ</label>

            </div>
            </a>
        </div>
        @endforeach
    </section>
</div>
<div class="min-[320px]:flex min-[320px]:flex-col-reverse sm:flex sm:flex-col-reverse  container  top-55 lg:flex lg:flex-row my-5">
    <div class="sm:w-full tab_description mr-2  lg:w-2/3 ">
        <label class="block mb-2  text-2xl text-gray-900 dark:text-white font_inter">Mô tả sản phẩm</label>
        <div class="p-3 product_description justify-center border rounded">
            <div class="content_detail h-96 overflow-auto">
                {!! $product->description !!}
            </div>
            <div class="text-center mt-3">
                <button class="btn_more px-3 py-2 bg-blue-300 hover:bg-blue-700 rounded-lg text-white text-base font-semibold btn_search">Xem thêm</button>
            </div>

        </div>
    </div>
    <div class="min-[320px]:my-4 sm:w-full sm:my-4 md:w-full md:my-4 ml-2 lg:w-1/3">
        <label class="block mb-2  text-2xl text-gray-900 dark:text-white font_inter">Thông tin sản phẩm</label>
        <div class="p-3 product_info border rounded ">
            <label class="block mb-2  text-title-product text-gray-900 dark:text-white font_inter text-lg">{{ $product->name }}</label>
            <div class="product_description ">
                  @foreach ($product->values as $value)
                <div class=" flex border-t justify-between">
                    <label  class="block mb-2 text-sm text_base dark:text-white">{{ $value->attribute->name }}</label>
                    <label  class=" block mb-2 font-bold text-sm text_base dark:text-white ">{{ $value->value }}</label>
                </div>
                  @endforeach


            </div>

        </div>
    </div>

</div>
<style>
    ul{
        list-style: none outside none;
        padding-left: 0;
        margin: 0;
    }
    .demo .item{
        margin-bottom: 60px;
    }
    .content-slider li{
        background-color: #ed3020;
        text-align: center;
        color: #FFF;
    }
    .content-slider h3 {
        margin: 0;
        padding: 70px 0;
    }
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .custom-number-input input:focus {
        outline: none !important;
    }

    .custom-number-input button:focus {
        outline: none !important;
    }
</style>
<script>
    $(document).ready(function() {
       $('#image-gallery').lightSlider({
           gallery:true,
           item:1,
           thumbItem:6,
           slideMargin: 0,
           speed:500,
           auto:true,
           loop:true,
           onSliderLoad: function() {
               $('#image-gallery').removeClass('cS-hidden');
           }
       });
    //
   });
   function decrement(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    if(value > 1){
        value -= 50;
        target.value = value;
    }
  }
  console.log($('#number_quality').val());
   $('#quantity_cart').val($('#number_quality').val());
  function increment(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value += 50;
    target.value = value;
  }

  const decrementButtons = document.querySelectorAll(
    `button[data-action="decrement"]`
  );

  const incrementButtons = document.querySelectorAll(
    `button[data-action="increment"]`
  );

  decrementButtons.forEach(btn => {
    btn.addEventListener("click", decrement);
  });

  incrementButtons.forEach(btn => {
    btn.addEventListener("click", increment);
  });
  $("#number_quality").on('keyup', function () {
    //    console.log(this);
       $('#quantity_cart').val($('#number_quality').val());
    });
  $('.btn_quality').click(function(){
    console.log($('#number_quality').val());
    $('#quantity_cart').val($('#number_quality').val());
  });


//
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
<script>
    $(document).on('ready', function() {
        var sale_event = {!! json_encode($sale_event) !!}
        if(sale_event != null){
            console.log("end_date" + sale_event['end_date']);
            $("#simple-timer").syotimer({
                // date: new Date(2035, 4, 9, 20, 30),
                date: new Date(sale_event['end_date'])
            });
        }
    });
</script>
@endsection
