@extends('landingpage.layout.index')
@section('content')
<div class="bg-cover flex justify-center items-center" style="background-image: url('img/product.jpg')">
    <label class="absolute block mb-2 text-2xl font-medium text-white dark:text-white font_inter">SẢN PHẨM</label>
</div>
<div class="container  top-55 rounded">
    <div class="flex js_sp_betteen items-center border rounded">
        <label for="" class="block m-4 font-bold text-black dark:text-white rounded">HỘP CARTON</label>

        <div>
            <a href="" for="small" class=" padding_more items-center text-sm text_base text-black dark:text-white border">Sản phẩm mới nhất 	<i class="fa fa-angle-down" aria-hidden="true"></i></a>
        </div>
    </div>
</div>
<div class="container  top-55 mb-32 rounded flex">
    <div class="  border rounded lg:w-1/4 mr-4">
        <div class="sm:block top_item js_sp_betteen flex w-full">
            <label for="" class="block m-4 font-bold text-black dark:text-white rounded">Lọc kết quả <span>(32)</span></label>
            <label for="" class="block m-4  text-black dark:text-white rounded">Reset</label>
        </div>
        <div class="line border mr-4 ml-4"></div>
        <div class="tab_size top_item js_sp_betteen  w-full items-center">
            <div class="top_tabsize js_sp_betteen  flex w-full">
                <label for="" class="block m-4 font-bold text-black dark:text-white rounded">Chọn kích thước</label>
                <i class="m-4 text-black  fa fa-angle-down" aria-hidden="true"></i>
            </div>

            <div class="list_size  ml-4 mr-4">
                @foreach ($attributes as $att)
                    @if($att->idNo < 4 )
                    <label for="" class="block m-1 mb-3  text-black dark:text-white rounded">{{ $att->name }}</label>

                        <div class="list_attribute   flex flex-wrap">
                            @foreach ($att->values as $att_value)
                                {{-- <label for="" class="block m-1 border attribute_value text-black dark:text-white rounded">{{ $att_value->value }}</label> --}}
                                <button class="block m-1 border attribute_value text-black dark:text-white rounded" aria-label="Đen" aria-disabled="false">{{ $att_value->value }}
                                    <div class="product-variation__tick"></div>
                                </button>
                            @endforeach
                        </div>
                    @else
                        <div class="line border_line mt-4 mb-4 w-full "></div>
                        <div class="top_tabsize js_sp_betteen  flex w-full">
                            <label for="" class="block  font-bold text-black dark:text-white rounded">Chọn {{ $att->name }}</label>
                            <i class=" text-black  fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                        <div class="list_attribute   ">
                            @foreach ($att->values as $att_value)
                                <div class="flex  items-start m-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $att_value->value }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endif

                @endforeach
            </div>
        </div>
    </div>
    <div class="flex flex-wrap js_sp_betteen items-center   lg:w-3/4">
        @foreach ($products as $product)
        <div class="item_sale rounded border">
            <a href="product_detail/{{ $product->slug }}" class="hover:no-underline">
                <img class="rounded image_item" src="{{ $product->first_image?$product->first_image->image: '' }}"  alt="...">
                <div class="info_item">
                    <a href="product_detail/{{ $product->slug }}"   class="block mb-2 font-bold text-sm  dark:text-white rounded">{{ $product->name }}</a>
                    <label  class="block mb-2 text-sm text_base dark:text-white">{{ $product->quantity_sold_auto }} đã bán</label>
                    <label  class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">{{ number_format($product->cost) }} đ</label>

                </div>
            </a>
        </div>
        @endforeach
        {{ $products->links() }}
    </div>

</div>
<script>
      $(".attribute_value").click(function(){
        $check = $(this).hasClass('active')
        $check == true ? $(this).removeClass('active') : $(this).addClass('active');

    });
</script>
<style>
    nav{
        width: 100%;
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        align-content: center;
        align-items: center;
    }
</style>
@endsection
