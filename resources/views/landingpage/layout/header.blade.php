<div class="header border ">
    <div class="container">
        <div class="topheader">
            <a href="" class="top_logo">
                <img src="img/Logo.png" alt="">
            </a>
            <div class="min-[320px]:hidden sm:flex md:flex lg:flex xl:flex 2xl:flex  xl:grow xl:shrink xl:basis-auto 2xl:grow 2xl:shrink 2xl:basis-auto xl:px-2  2xl:px-2 search" style="padding-left: 8px; padding-right: 8px; flex: 1 1 auto;">
                <div class="css-cssveg w-full">
                    <div class="css-17xgviv">
                        <div data-content-region-name="headerBar" data-track-content="true" data-content-name="searchButton" class="css-7kp13n">
                            <button class="search-icon css-e5zlmr" aria-label="Search"><span size="26" color="#FFFFFF" class="css-squldw"></span></button>
                        </div>
                        <div data-content-region-name="headerBar" class="search_box">
                            <input class="search-input css-7jjcju" placeholder="Carton 3 lớp, hộp đựng bánh,..." role="searchbox" aria-label="Search" value="">
                        </div>

                    </div>
                    <div class="css-1nb0ewh"></div>
                </div>
            </div>
            <div class="top_contact mr-6">
                <div class="icon_phone p-3">
                    <i class="fa-solid fa-phone fa-shake" style="color: #0659ea;"></i>

                </div>

                <div>
                    <p class="text-sm">GỌI MUA HÀNG</p>
                    <h3 class="font-bold text-xl">0983 407 085</h3>
                </div>
            </div>
            <div class="cart ml-6 btn_cart">
                @if(count($carts) >0 )
                 <label class="item_number_cart block bg-red-500 ml-2  rounded-full items-center text-center text-white dark:text-white">{{ $carts->count() }}</label>
                @endif
                <img src="img/cart.png" alt="">

            </div>


        </div>
    </div>
</div>
<div class="container menu_top h-20 items-center">
        <div class="menu flex js_sp_betteen">
            <div class="menu_icon flex items-center dropdown">
                <div class="dropbtn">
                    <i class="fa fa-bars " aria-hidden="true"></i>
                </div>
                <p class="ml-3">DANH MỤC SẢN PHẨM</p>
                <div class="dropdown-content mt-4">
                    @foreach ($category as $cate)
                        <a href="product/{{ $cate->slug }}">{{ $cate->name }}</a>
                    @endforeach

                </div>
            </div>
            <div class="menu_item flex items-center">
                <ul class="flex items-center menu_item_list">
                    <li><a href="/" class="hover:no-underline">Trang chủ</a></li>
                    <li><a href="/" class="hover:no-underline">Về chúng tôi</a></li>
                    <li><a href="blogs" class="hover:no-underline">Blog</a></li>
                    <li><a href="tracking" class="hover:no-underline">Tra cứu đơn hàng</a></li>
                </ul>
            </div>
        </div>
</div>


<div class="cart tab_cart fixed z-50 top-0 right-0 left-0 w-full h-full" style="background: #00000061;">
    <div class="fixed overflow-y-auto  right-0 h-full bg-white p-3 min-[320px]:w-72 sm:w-96 md:w-96 lg:w-96 xl:w-96 2xl:w-96">
        <div class="top_cart flex js_sp_betteen items-center border-b rounded">
            <div class="cart_name flex items-center">
                <img src="img/cart.png" alt="">
                <label class="block m-2 items-center text-base font-medium text-gray-900 dark:text-white font_inter">Giỏ hàng</label>
            </div>
                <label id="btn_delete_all" class=" block m-2 items-center text-base font-medium text-gray-900 hover:text-red-700 dark:text-white">Xoá tất cả</label>
                <i class="text-gray color-gray fa fa-close btn_close"></i>
        </div>
        <hr>
        @if(count($carts) > 0)
        <div class="item_product">
            @foreach ($carts as $cart)
            <div class="product  product_{{ $cart->id }} flex col-12 pt-2">
                <div class="image_item col-3 m-0 pt-2" >
                    <img src="{{ count($cart->attributes) > 0 ? $cart->attributes[0]['image'] : null}}" class="w-24  border rounded" alt="">
                </div>

                <div class="info_item col-7 m-0 pt-2">
                    <label class="block  items-center text-sm   text-gray-600 dark:text-white ">{{ $cart->name }}</label>
                    <label class="block  items-center text-2sm  text-gray-400 dark:text-white ">{{ $cart->getPriceSum() }} đ</label>
                    <div class="div_price flex items-center js_sp_betteen">
                        <div class="custom-number-input h-10 w-32">
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                            <button data-action="decrement_cart" cartId={{ $cart->id }} class=" border rounded-l px-3 py-1">
                                <span class="m-auto text-2xl font-thin">−</span>
                            </button>
                            <input type="number"  class="value_quality border text-center w-full " name="custom-input-number" value="{{ $cart->quantity }}" min="1" style="width:60px;background-color: rgb(236, 234, 234);" />
                            <button data-action="increment_cart" cartId={{ $cart->id }} class=" border rounded-r px-3 py-1">
                                <span class="m-auto text-2xl font-thin">+</span>
                            </button>
                        </div>
                        </div>
                    </div>

                </div>
                <div class="icon_remove col-2 text-end m-0 pt-2">
                    <button class="btn-remove-item m-auto text-2xl font-thin" cartId={{ $cart->id }}>−</button>
                </div>

            </div>

            @endforeach
        </div>
        <div class="border rounded  p-4">
            <div  class="total flex js_sp_betteen">
                <label class="block  items-center text-2sm  text-black dark:text-white ">Tạm tính:</label>
                <label id="getSubTotal" class="block  items-center text-2sm   text-black dark:text-white ">{{ Cart::getSubTotal() }} đ</label>
            </div>
            <a href="/checkout" class="hover:no-underline w-1/6 bg-blue-500 hover:bg-blue-700 text-white font-bold  border text-center  mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded btn_search">
                THANH TOÁN
            </a>
            <label class="block  items-center text-base  text-black w-full text-center dark:text-white ">Lưu ý: Số tiền trên chưa bao gồm phí ship</label>


        </div>
        @else
        <div class="item_product">
            <div class="w-2/3 mx-auto pt-6">
                <img class="w-2/3 mx-auto py-4" src="img/cart_null.png" alt="">
                <label class="block m-2 items-center text-base text-gray-900 dark:text-white text-center">Bạn chưa có sản phẩm nào trong giỏ hàng!</label>
                <a href="/" class=" w-1/6 hover:no-underline bg-blue-500 hover:bg-blue-700 text-white font-bold  border text-center  mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded btn_search">
                    Tiếp tục mua sắm
                </a>
            </div>
        </div>
        @endif

    </div>
</div>
</div>
@if( request()->get('opencart') )
<?php

    if($_GET['opencart'] == 1){ ?>
        <script>
                 $(function(){
                    $('.tab_cart').fadeIn();
                 });
        </script>
<?php
    }
?>
@endif
<script>
   function decrementCart(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement_cart"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    if(value > 50){
        value -=  50;
        target.value = value;
    }
    var productid = $(this).attr('cartId');
    updateCart(productid,-50);
  }
  function incrementCart(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement_cart"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value += 50;
    target.value = value;
    var productid = $(this).attr('cartId');
    updateCart(productid,50);
  }

  const decrementButtonsCart = document.querySelectorAll(
    `button[data-action="decrement_cart"]`
  );

  const incrementButtonsCart = document.querySelectorAll(
    `button[data-action="increment_cart"]`
  );

  decrementButtonsCart.forEach(btn => {
    btn.addEventListener("click", decrementCart);
  });

  incrementButtonsCart.forEach(btn => {
    btn.addEventListener("click", incrementCart);
  });
    $("#number_quality").on('keyup', function () {
        updateCart(productid,this.value);
    });
    function updateCart(id,value) {
        console.log("updateCart");
        console.log("id" + id + "value:" + value);
        // e.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: "updateCart",
          type: 'post',
          data: {
            product_id :id,
            quantity_cart :value
          },
          success: function(result) {
            console.log(result);
            $('#getSubTotal').text(result + "đ");
          }
        });

    };
    $(".btn-remove-item").click(function(){
        var productid = $(this).attr('cartId');
        console.log(productid);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: "removeItem",
          type: 'post',
          data: {
            product_id :productid,
          },
          success: function(result) {
            console.log(result);
            $('#getSubTotal').text(result + "đ");
            $(this).parent('.product').remove();
            $(`.product_${productid}`).remove();
          }
        });
    })
</script>
