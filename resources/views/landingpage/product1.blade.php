@extends('landingpage.layout.index')
@section('content')
<div class="bg-cover flex justify-center items-center" style="background-image: url('img/product.jpg')">
    <label class="absolute block mb-2 text-2xl font-medium text-white dark:text-white font_inter">SẢN PHẨM</label>
</div>
<div class="container  top-55 rounded">
    <div class="min-[320px]:block sm:block md:block lg:flex lg:justify-between  flex   border rounded">
        <label for="" class="block m-4 font-bold text-black dark:text-white rounded">HỘP CARTON</label>

        <div class="flex my-3">
            <a  for="small"  class=" link_search mx-2 hover:no-underline border rounded-lg flex items-center text-sm text_base text-black dark:text-white border min-[320px]:flex sm:flex md:flex lg:flex xl:hidden">Lọc kết quả <p >(32)</p>	<i class="fa fa-angle-down ml-2" aria-hidden="true"></i></a>
            <a href="" for="small" class="mx-2 hover:no-underline rounded-lg  padding_more items-center text-sm text_base text-black dark:text-white border">Sản phẩm mới nhất 	<i class="fa fa-angle-down ml-2" aria-hidden="true"></i></a>
           
        </div> 
        
    </div>
</div>
<div class="min-[320px]:block sm:block sm:top-0 container  mb-5 lg:top-55 rounded relative xl:flex">
    <div   class="bg-white  border rounded  list_search min-[320px]:absolute min-[320px]:right-0 min-[320px]:hidden  min-[320px]:z-50 min-[320px]:w-full min-[320px]:drop-shadow-lg sm:absolute sm:right-0  sm:z-50 sm:w-full sm:drop-shadow-lg md:absolute md:right-0  md:z-1 md:w-full md:drop-shadow-lg md:hidden lg:hidden  lg:w-4/5 xl:w-3/12 xl:relative xl:block xl:mt-2 xl:mr-3">
        <div class="sm:flex top_item js_sp_betteen  flex w-full">
            <label for="" class="block m-4 font-bold text-black dark:text-white rounded">Lọc kết quả <span>(32)</span></label>
            <label for="" class="block m-4  text-black dark:text-white rounded">Reset</label>
        </div>
        <div class="line border mr-4 ml-4"></div>
        <div class="min-[320px]:p-3 sm:flex tab_size xl:block xl:w-full top_item js_sp_betteen  w-full items-center">
            <div class="min-[320px]:block sm:w-1/2 sm:block sm:border-r xl:w-full 2xl:w-full top_tabsize js_sp_betteen  flex w-full xl:border-r-0">
                <label for="" class="sm:text-base sm:ml-5 sm:my-2   text-black dark:text-white rounded font-semibold">Chọn kích thước</label>
                <i class="sm:hidden  m-4 text-black  fa fa-angle-down" aria-hidden="true"></i>
                <div class="ml-4">
                    <p>chiều dài (cm)</p>
                    <div class="my-2 sm:w-4/5">
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1 my-1">10</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">20</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">30</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">40</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">50</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">60</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">70</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">80</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">90</button>
                    </div>
                </div>
                <div class="ml-4">
                    <p>chiều rộng (cm)</p>
                    <div class="my-2 sm:w-4/5">
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1 my-1">10</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">20</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">30</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">40</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">50</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">60</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">70</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">80</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">90</button>
                    </div>
                </div>
                <div class="ml-4">
                    <p>chiều cao (cm)</p>
                    <div class="my-2 sm:w-4/5">
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1 my-1">10</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">20</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">30</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">40</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">50</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">60</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">70</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">80</button>
                        <button class="hover:bg-sky-500 hover:text-white py-0.5 px-1 border rounded-lg mx-1  my-1">90</button>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/2 sm:block">
                <div>
                    <label for="" class="sm:text-base sm:ml-5 sm:my-2   text-black dark:text-white rounded font-semibold">Chọn số lớp</label>
                    <i class="sm:hidden  m-4 text-black  fa fa-angle-down" aria-hidden="true"></i>
                    <div class="sm:ml-5 flex items-center mb-2">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">3 <span class="text-gray-400">(04)</span></label>
                    </div>
                    <div class=" sm:ml-5 flex items-center mb-4">
                    <input checked id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">5 <span class="text-gray-400">(04)</span></label>
                    </div>
                </div>
                <div>
                    <label for="" class="sm:text-base sm:ml-5 sm:my-2   text-black dark:text-white rounded font-semibold">Chọn sóng giấy</label>
                    <i class="sm:hidden  m-4 text-black  fa fa-angle-down" aria-hidden="true"></i>
                    <div class="sm:ml-5 flex items-center mb-2">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">A <span class="text-gray-400">(04)</span></label>
                    </div>
                    <div class=" sm:ml-5 flex items-center mb-4">
                    <input checked id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">B <span class="text-gray-400">(04)</span></label>
                    </div>
                    <div class="sm:ml-5 flex items-center mb-2">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">C <span class="text-gray-400">(04)</span></label>
                    </div>
                    <div class="sm:ml-5 flex items-center mb-2">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">D <span class="text-gray-400">(04)</span></label>
                    </div>
                    <div class="sm:ml-5 flex items-center mb-2">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">E <span class="text-gray-400">(04)</span></label>
                    </div>
                </div>
                <div>
                    <label for="" class="sm:text-base sm:ml-5 sm:my-2   text-black dark:text-white rounded font-semibold">Chọn mặt giấy</label>
                    <i class="sm:hidden  m-4 text-black  fa fa-angle-down" aria-hidden="true"></i>
                    <div class="sm:ml-5 flex items-center mb-2">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mặt nâu đáy mộc <span class="text-gray-400">(04)</span></label>
                    </div>
                    <div class=" sm:ml-5 flex items-center mb-4">
                    <input checked id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">2 mặt nâu <span class="text-gray-400">(04)</span></label>
                    </div>
                    
                </div>
                
            </div>

            <!-- <div class="sm:w-1/2 list_size  ml-4 mr-4">
           
                    <label for="" class="block m-1 mb-3  text-black dark:text-white rounded">Chiều dài (cm)</label>

                        <div class="list_attribute   flex flex-wrap">
                            
                                <label for="" class="block m-1 border attribute_value text-black dark:text-white rounded"></label> 
                                <button class="block m-1 border attribute_value text-black dark:text-white rounded" aria-label="Đen" aria-disabled="false">
                                    <div class="product-variation__tick"></div>
                                </button>
                           
                        </div>
              
                        <div class="line border_line mt-4 mb-4 w-full "></div>
                        <div class="top_tabsize js_sp_betteen  flex w-full">
                            <label for="" class="block  font-bold text-black dark:text-white rounded">Chọn </label>
                            <i class=" text-black  fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                        <div class="list_attribute   ">
                           
                                <div class="flex  items-start m-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                </div>
                           
                        </div>
                    
            </div> -->
        </div>
    </div>
    <div class=" min-[320px]:block sm:grid sm:grid-cols-2 md:grid md:grid-cols-2 lg:grid lg:grid-cols-3   lg:w-full xl:w-9/12 xl:ml-3">  
        <div class="min-[320px]:my-2 sm:m-2 md:m-2  rounded border  ">
            <a href="" class="hover:no-underline">
                <img class="absolute padding_icon_sale" src="img/sale_label.png" alt="">
                <img class="rounded image_item" src="/img/hop.jpg"  alt="...">
                <div class="info_item">
                    <label for="small" class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                    <label for="small" class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                    <label for="small" class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>
                    <label for="small" class="block mb-2 text-sm  text_base  dark:text-white">7000 đ <span class="text_sale_medium_bg text-white">-40%</span></label>
                </div>
            </a>
        </div>
        <div class="min-[320px]:my-2 sm:m-2  rounded border  ">
            <a href="" class="hover:no-underline">
                <img class="absolute padding_icon_sale" src="img/sale_label.png" alt="">
                <img class="rounded image_item" src="/img/hop.jpg"  alt="...">
                <div class="info_item">
                    <label for="small" class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                    <label for="small" class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                    <label for="small" class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>
                    <label for="small" class="block mb-2 text-sm  text_base  dark:text-white">7000 đ <span class="text_sale_medium_bg text-white">-40%</span></label>
                </div>
            </a>
        </div>
        <div class="min-[320px]:my-2 sm:m-2  rounded border  ">
            <a href="" class="hover:no-underline">
                <img class="absolute padding_icon_sale" src="img/sale_label.png" alt="">
                <img class="rounded image_item" src="/img/hop.jpg"  alt="...">
                <div class="info_item">
                    <label for="small" class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                    <label for="small" class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                    <label for="small" class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>
                    <label for="small" class="block mb-2 text-sm  text_base  dark:text-white">7000 đ <span class="text_sale_medium_bg text-white">-40%</span></label>
                </div>
            </a>
        </div>
        <div class="min-[320px]:my-2 sm:m-2  rounded border  ">
            <a href="" class="hover:no-underline">
                <img class="absolute padding_icon_sale" src="img/sale_label.png" alt="">
                <img class="rounded image_item" src="/img/hop.jpg"  alt="...">
                <div class="info_item">
                    <label for="small" class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                    <label for="small" class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                    <label for="small" class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>
                    <label for="small" class="block mb-2 text-sm  text_base  dark:text-white">7000 đ <span class="text_sale_medium_bg text-white">-40%</span></label>
                </div>
            </a>
        </div>
        <div class="min-[320px]:my-2 sm:m-2  rounded border  ">
            <a href="" class="hover:no-underline">
                <img class="absolute padding_icon_sale" src="img/sale_label.png" alt="">
                <img class="rounded image_item" src="/img/hop.jpg"  alt="...">
                <div class="info_item">
                    <label for="small" class="block mb-2 font-bold text-sm  dark:text-white rounded">Hộp carton 20x30x15cm</label>
                    <label for="small" class="block mb-2 text-sm text_base dark:text-white">1023 đã bán</label>
                    <label for="small" class="block mb-2 text-sm font-bold text_sale_medium dark:text-white rounded">5000 đ</label>
                    <label for="small" class="block mb-2 text-sm  text_base  dark:text-white">7000 đ <span class="text_sale_medium_bg text-white">-40%</span></label>
                </div>
            </a>
        </div>

    </div>
</div>
<script>
      $(".attribute_value").click(function(){
        $check = $(this).hasClass('active')
        $check == true ? $(this).removeClass('active') : $(this).addClass('active');
        
    });

    // $(window).resize(function(){
    // var width = $(window).width();
    // if (width >= 1280px){
    //    $(".list_search").hide()
    // $(".link_search").click(function(){
    //     $(".list_search").slideToggle()
    //     console.log("hhhhh")
    // })
    // }
    // else{
    //     $(".list_search").show()
    //     console.log("hhhhh222")
    // }
    // });
    // $(".list_search").hide()
    $(".link_search").click(function(){
        $(".list_search").slideToggle()
    })
</script>
@endsection
