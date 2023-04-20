@extends('landingpage.layout.index')
@section('content')
<div id="controls-carousel" class="tab_sidebar relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-70 overflow-hidden rounded-lg ">
         @foreach ($home_setting as $home)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <a href="{{ $home->link }}">
                    <img src="{{ $home->image }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </a>
            </div>
         @endforeach

    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
<div class="sm:mx-4 tab_search">
    <div class=" container h-30 items-center content_search py-4 rounded border shader">
        <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white font_inter">TÌM KIẾM HỘP CARTON THEO KÍCH THƯỚC</label>
        <div class="form_search w-full lg:flex">
            @foreach ($carton_attr as $attribute)
            <div class="search_item w-full lg:w-1/4 ">
                <select id="small" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Chọn {{ $attribute->name }}</option>
                    @foreach ($attribute->values as $value)
                        <option value="US">{{ $value->value }}</option>
                    @endforeach
                </select>
            </div>
            @endforeach
            <div class="search_item w-32 lg:w-1/6">
                <button class="w-1/6 bg-blue-500 hover:bg-blue-700 text-white font-bold  border  mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded btn_search">
                    Tìm kiếm
                </button>
            </div>


        </div>
    <div class="bottom_search lg:flex">
        <label  class="block mb-2 text-sm text_base dark:text-white">Kích thước phổ biến:</label>
        <div class="flex flex-wrap">
            <label  class="block mb-2 text-sm font-medium dark:text-white text_tag rounded">30x30x15</label>
            <label  class="block mb-2 text-sm font-medium dark:text-white text_tag rounded">30x30x15</label>
            <label  class="block mb-2 text-sm font-medium dark:text-white text_tag rounded">30x30x15</label>
            <label  class="block mb-2 text-sm font-medium dark:text-white text_tag rounded">30x30x15</label>
            <label  class="block mb-2 text-sm font-medium dark:text-white text_tag rounded">30x30x15</label>
            <label  class="block mb-2 text-sm font-medium dark:text-white text_tag rounded">30x30x15</label>
        </div>

    </div>
    </div>
</div>
@if($sale_event != null)
<div class="container  bg_liear top-55 rounded">
    <div class="lg:flex top_sale js_sp_betteen tab_date_sale">
        <div class="flex">
            <i class="fa fa-bolt text-yellow icon_sale" class="min-[320px]:text-sm" aria-hidden="true"></i>
            <label for="" class="min-[320px]:text-base block mb-2 text_sale text-white italic dark:text-white rounded lg:text-5xl ml-3">{{ $sale_event->name }}</label>
        </div>
        <div id="simple-timer" class="font_inter"></div>
    </div>
    <section class="regular slider">
        @foreach ($sale_event->sale_items->take(12) as $item)
                <div class=" item_sale rounded ">
                    <a href="product_detail/{{ $item->product->slug }}" class="hover:no-underline">
                    <img class="absolute padding_icon_sale" src="img/sale_label.png" alt="">
                    <img class="rounded image_item" src="@if($item->product->first_image !=   null ) {{ $item->product->first_image->image }} @endif"  alt="{{  $item->product->name  }}">
                    <div class="info_item">
                        <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">{{  $item->product->name  }}</label>
                        <label  class="block mb-2 text-sm text_base dark:text-white">{{ $item->product->quantity_sold_auto }} đã bán</label>
                        <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">{{ number_format($item->price_sale) }} đ</label>
                        <label  class="block mb-2 text-sm  text_base  dark:text-white">{{ number_format($item->price) }} đ <span class="text_sale_medium_bg text-white">{{ $item->discount }}{{ $item->unit }}</span></label>
                    </div>
                    </a>
                </div>
        @endforeach

    </section>
</div>
@endif
<div class="container  top-55 rounded">
    <div class="min-[320px]:block sm:flex md:flex lg:flex top_sale js_sp_betteen items-center">
        <div class="flex">
            <label for="" class="block mb-2 text_sale text-black dark:text-white rounded">SẢN PHẨM BÁN CHẠY</label>
        </div>

        <div>
            <a href="" class="hover:no-underline border  rounded-full padding_more items-center text-sm text_base dark:text-white">Xem tất cả   ></a>
        </div>
    </div>
    <section class="regular slider">
        @foreach ($best_seller as $seller)
        <div class="item_sale rounded border">
            <a href="product_detail/{{ $seller->slug }}" class="hover:no-underline">
            <img class="rounded image_item" src="{{ $seller->first_image?$seller->first_image->image: '' }}"  alt="{{ $seller->name }}">
            <div class="info_item">
                <label  class="block mb-2 font-bold text-sm  dark:text-white rounded">{{ $seller->name }}</label>
                <label  class="block mb-2 text-sm text_base dark:text-white">{{ $seller->auto_sold ==  0 ? $seller->quantity_sold : $seller->quantity_sold_auto }} đã bán</label>
                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">{{ number_format($seller->cost) }} đ</label>
            </div>
            </a>
        </div>
        @endforeach
    </section>
</div>

<div class="container  top-55 rounded min-[320px]:block sm:block md:block lg:flex flex">
    <div class="item_ship_info flex w-1/3 border rounded min-[320px]:w-full min-[320px]:my-3  min-[320px]:p-2 sm:w-full sm:my-3 sm:p-2 md:w-full md:p-2 md:my-3 lg:flex lg:mr-2">
        <div class="flex items-center">
            <img class=""  src="img/icon_freeship.png" alt="">
        </div>

        <div class="min-[320px]:ml-2 sm:ml-3 md:ml-3">
            <label  class="block mb-2 text-sm font-medium   dark:text-white">Freeship nội thành Hà Nội</label>
            <label  class="block mb-2 text-sm text_base dark:text-white  rounded">Freeship Hà Nội: Đơn trên 1,000,000đ. (Nhận hàng sau 6-24h)</label>
        </div>

    </div>
    <div class="item_ship_info flex w-1/3 border rounded min-[320px]:w-full min-[320px]:my-3 min-[320px]:p-2 sm:w-full  sm:my-3 sm:p-2 md:w-full md:p-2 md:my-3 lg:flex lg:mx-2">
        <div class="flex items-center">
            <img class=""  src="img/icon_lock.png" alt="">
        </div>

        <div class="min-[320px]:ml-2 sm:ml-3 md:ml-3">
            <label  class="block mb-2 text-sm font-medium   dark:text-white">Giao hàng hỏa tốc</label>
            <label  class="block mb-2 text-sm text_base dark:text-white  rounded">Giao hàng hỏa tốc nội thành Hà Nội trong vòng 6-24h</label>
        </div>

    </div>
    <div class="item_ship_info flex w-1/3 border rounded min-[320px]:w-full min-[320px]:my-3 min-[320px]:p-2 sm:w-full  sm:my-3 sm:p-2 md:w-full md:p-2 md:my-3 lg:flex lg:ml-2">
        <div class="flex items-center">
            <img class=""  src="img/icon_ship.png" alt="">
        </div>

        <div class="min-[320px]:ml-2 sm:ml-3 md:ml-3">
            <label  class="block mb-2 text-sm font-medium   dark:text-white">Giao hàng COD toàn quốc</label>
            <label  class="block mb-2 text-sm text_base dark:text-white  rounded">Nhận hàng sau 2-4 ngày</label>
        </div>

    </div>
</div>
@foreach ($categories as $cate)
<div class="container  top-55 rounded">
    <div  class="tab_sale relative w-full " >
        <div class="min-[320px]:block sm:flex md:flex lg:flex top_sale js_sp_betteen items-center">
            <div class="flex">
                <label  class="block mb-2 text_sale text-black dark:text-white rounded uppercase">{{ $cate->name }}</label>
            </div>
            <div>
                <a href="product/{{ $cate->slug }}"  class="border hover:no-underline rounded-full padding_more items-center text-sm text_base dark:text-white">Xem tất cả   ></a>
            </div>
        </div>

        <!-- Carousel wrapper -->
        <div class="relative  rounded-lg ">
            <!-- Item 1 -->
            <div class=" duration-700 ease-in-out flex  flex-wrap justify-start"  data-carousel-item>
                @foreach ($cate->products->take(4) as $product)
                    <div class="item_sale rounded border">
                        <a href="product_detail/{{ $product->slug }}" class="hover:no-underline">
                            <img class="rounded image_item" src="{{ $product->first_image?$product->first_image->image: '' }}"  alt="...">
                            <div class="info_item">
                                <a href="product_detail/{{ $product->slug }}"   class="hover:no-underline block mb-2 font-bold text-sm  dark:text-white rounded">{{ $product->name }}</a>
                                <label  class="block mb-2 text-sm text_base dark:text-white">{{ $product->quantity_sold_auto }} đã bán</label>
                                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">@money($product->cost) đ</label>
                            </div>
                        </a>
                    </div>
                @endforeach
                @foreach ($cate->subproducts->take(4) as $product)
                    <div class="item_sale rounded border">
                        <a href="product_detail/{{ $product->slug }}" class="hover:no-underline">
                            <img class="rounded image_item" src="{{ $product->first_image?$product->first_image->image: '' }}"  alt="...">
                            <div class="info_item">
                                <a href="product_detail/{{ $product->slug }}"   class="hover:no-underline block mb-2 font-bold text-sm  dark:text-white rounded">{{ $product->name }}</a>
                                <label  class="block mb-2 text-sm text_base dark:text-white">{{ $product->quantity_sold_auto }} đã bán</label>
                                <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">{{ number_format($product->cost) }} đ</label>

                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endforeach
<div class="container  top-55 rounded mb-5">
    <div  class="tab_sale relative w-full " >
        <div class="text-center top_sale js_sp_betteen items-center">
            <a href=""  class=" rounded-full padding_more items-center text-sm text_base text-blue-500 dark:text-white">Blog</a>
            <label for="" class="block mb-2 text_sale text_blog bold text-black dark:text-white rounded">Bài viết mới</label>

        </div>

        <!-- Carousel wrapper -->
        <div class="relative  rounded-lg ">
            <!-- Item 1 -->
            <div class=" duration-700 ease-in-out min-[320px]:block sm:block md:block lg:flex xl:flex 2xl:flex justify-center"  data-carousel-item>
                @foreach ($posts as $post)
                <div class="min-[320px]:w-full min-[320px]:my-3 sm:w-full sm:ml-0 sm:flex sm:my-3 lg:block xl:block 2xl:block lg:w-1/3 xl:w-1/3 2xl:w-1/3 rounded lg:ml-5 border">
                    <a href="/blog/{{ $post->slug }}.html" class="min-[320px]:block  md:grid-cols-2  lg:block hover:no-underline">
                        <div class="imageblog_home ">
                            <img class="rounded image_item w-30" src="{{ $post->image }}"  alt="...">
                        </div>
                        <div class="info_item sm:w-9/12">
                            <label  class="block mb-2 text-sm text_base dark:text-white">{{ $post->updated_at }}</label>
                            <a href="/blog/{{ $post->slug }}.html"  class="hover:no-underline block mb-2 font-bold text-xl  dark:text-white rounded">{{ $post->name }}</a>
                            <label  class="block mb-2 text-sm text_base dark:text-white clamp three-lines">{!!  $post->sub_title  !!}</label>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
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