<template>
    <section class="content">

        <Head title="Quản lý đơn hàng"></Head>
        <!-- Modal -->
        <div>
            <div class="min-[320px]:m-0 sm:m-2 md:m-4 lg:m-8 ">
                <div class="min-[320px]:p-2 sm:p-2 md:p-2 lg:p-4 min-[320px]:mt-3 sm:mt-3 md:mt-0 lg:mt-0">
                    <div class="min-[320px]:flex sm:flex md:flex lg:flex ">
                        <div class="mt-2">
                            <button class="py-2 px-3 border rounded">
                                <font-awesome-icon :icon="['fas', 'chevron-left']" />
                            </button>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm">Trở về đơn hàng</p>
                            <h2 class="min-[320px]:text-xl sm:text-2xl  font-semibold lg:text-2xl flex mr-2">Tạo đơn hàng mới </h2>
                        </div>  
                    </div>
                    <div class="bg-white rounded-lg p-3 my-3">
                        <div class="min-[320px]:block">
                            <label for="">Tìm kiếm sản phẩm</label>
                            <input type="text" class="min-[320px]:w-full min-[320px]:ml-0 border text-sm border-gray-300 sm:ml-3 md:ml-3 lg:ml-3 sm:w-3/12 md:w-3/12 lg:w-3/12 rounded-lg" placeholder="Tìm kiếm sản phẩm bằng SKU hoặc tên sản phẩm">
                        </div>
                        <div>  
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border my-5">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">
                                                    Hình ảnh
                                                
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">
                                                Mã SKU
                                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">
                                                    Tên sản phẩm
                                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">
                                                    Giá trước chiết khấu
                                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">
                                                    Chiết khấu
                                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">
                                                    Giá sau chiết khấu
                                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">
                                                Tình trạng
                                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">
                                                Số lượng
                                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                                </div>
                                            </th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </th>
                                            <td class="px-6 py-4">
                                                <img src="img/xop.png" alt="">
                                            </td>
                                            <td class="px-6 py-4">
                                                CT3LSA203015MN
                                            </td>
                                            <td class="px-6 py-4">
                                                Hộp carton 3 lớp song E | 20x30x15cm | mặt nâu
                                            </td>
                                            <td class="px-6 py-4">
                                                5,000 đ
                                            </td>
                                            <td class="px-6 py-4">
                                                0%
                                            </td>
                                            <td class="px-6 py-4">
                                                5,000 đ
                                            </td>
                                            <td class="px-6 py-4">
                                                Còn hàng
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="buttons_added ">
                                                    <input class="minus is-form" type="button" value="-">
                                                    <input aria-label="quantity" class="input-qty" max="100" min="0" name="" type="number" value="">
                                                    <input class="plus is-form" type="button" value="+">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </th>
                                            <td class="px-6 py-4">
                                                <img src="img/xop.png" alt="">
                                            </td>
                                            <td class="px-6 py-4">
                                                CT3LSA203015MN
                                            </td>
                                            <td class="px-6 py-4">
                                                Hộp carton 3 lớp song E | 20x30x15cm | mặt nâu
                                            </td>
                                            <td class="px-6 py-4">
                                                5,000 đ
                                            </td>
                                            <td class="px-6 py-4">
                                                0%
                                            </td>
                                            <td class="px-6 py-4">
                                                5,000 đ
                                            </td>
                                            <td class="px-6 py-4">
                                                Còn hàng
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="buttons_added ">
                                                    <input class="minus is-form" type="button" value="-">
                                                    <input aria-label="quantity" class="input-qty" max="100" min="0" name="" type="number" value="">
                                                    <input class="plus is-form" type="button" value="+">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </th>
                                            <td class="px-6 py-4">
                                                <img src="img/xop.png" alt="">
                                            </td>
                                            <td class="px-6 py-4">
                                                CT3LSA203015MN
                                            </td>
                                            <td class="px-6 py-4">
                                                Hộp carton 3 lớp song E | 20x30x15cm | mặt nâu
                                            </td>
                                            <td class="px-6 py-4">
                                                5,000 đ
                                            </td>
                                            <td class="px-6 py-4">
                                                0%
                                            </td>
                                            <td class="px-6 py-4">
                                                5,000 đ
                                            </td>
                                            <td class="px-6 py-4">
                                                Còn hàng
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="buttons_added ">
                                                    <input class="minus is-form" type="button" value="-">
                                                    <input aria-label="quantity" class="input-qty" max="100" min="0" name="" type="number" value="">
                                                    <input class="plus is-form" type="button" value="+">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-end">
                                <button class="text-white text-base px-3 py-2 bg-primary rounded-lg">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                    <div class="my-4  ">
                        <div class="min-[320px]:block sm:block md:block lg:grid lg:grid-cols-3 lg:gap-4 ">
                            <div  class="col-span-2 bg-white rounded-lg p-3 ">
                                <h2 class="text-2xl font-semibold">Thông tin giao hàng</h2>
                                <div class="flex">
                                    <div class="w-1/2">
                                        <input type="text"  class="mr-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Họ và tên" required>
                                    </div>
                                    <div class="w-1/2">
                                        <input type="text"  class="ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Số điện thoại" required>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <select name="calc_shipping_provinces" required="">
                                        <option value="">Tỉnh / Thành phố</option>
                                      </select>
                                      <input class="billing_address_1" name="" type="hidden" value="">
                                </div>
                                <div class="my-2">
                                    <input type="text"  class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Số nhà, địa chỉ cụ thể" required>
                                </div>
                                <div class="my-2">
                                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ghi chú về đơn hàng, thời gian hoặc thời điểm giao hàng..."></textarea>
                                </div>

                                <div class="border rounded-lg ">
                                    <div class="p-2 bg-gray-200">
                                        <h2 class="text-2xl font-semibold">Phương thức thanh toán</h2>
                                    </div>
                                    <div class="min-[320px]:pl-1 lg:pl-5">
                                        <div class="flex my-4">
                                            <input checked id="default-radio-2" type="radio" value="" name="default-radio" class=" mt-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <img src="/img/cod.png" class="ml-3 min-[320px]:w-1/5 min-[320px]:h-1/5 sm:w-1/12 sm:h-1/12 lg:w-12 lg:h-12 xl:w-12 xl:h-12 2xl:w-12 2xl:h-12" alt="">
                                            <p class="mt-2 text-base ml-2">Thanh toán khi giao hàng (COD)</p>
                                        </div>
                                        <div class="flex my-4">
                                            <input  id="default-radio-2" type="radio" value="" name="default-radio" class=" mt-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <img src="/img/momo.png" class="ml-3 min-[320px]:w-1/6 min-[320px]:h-1/6 sm:w-1/12 sm:h-1/12 lg:w-12 lg:h-12 xl:w-12 xl:h-12 2xl:w-12 2xl:h-12" alt="">
                                            <p class="mt-2 text-base ml-2">Thanh toán qua Momo</p>
                                        </div>
                                        <div class="flex my-4">
                                            <input  id="default-radio-2" type="radio" value="" name="default-radio" class=" mt-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <img src="/img/zalo.png" class="ml-3 min-[320px]:w-1/5 min-[320px]:h-1/5 sm:w-1/12 sm:h-1/12 lg:w-12 lg:h-12 xl:w-12 xl:h-12 2xl:w-12 2xl:h-12" alt="">
                                            <p class="mt-2 text-base ml-2">Thanh toán qua Zalo Pay</p>
                                        </div>
                                        <div class="flex my-4">
                                            <input  id="default-radio-2" type="radio" value="" name="default-radio" class=" mt-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <img src="/img/sp_pay.png" class="ml-3 min-[320px]:w-1/6 min-[320px]:h-1/6 sm:w-1/12 sm:h-1/12 lg:w-12 lg:h-12 xl:w-12 xl:h-12 2xl:w-12 2xl:h-12"  alt="">
                                            <p class="mt-2 text-base ml-2">Thanh toán qua Shoppe Pay</p>
                                        </div>
                                        <div class="flex my-4">
                                            <input  id="default-radio-2" type="radio" value="" name="default-radio" class=" mt-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <img src="/img/vn_pay.png" class="ml-3 min-[320px]:w-1/6 min-[320px]:h-1/6 sm:w-1/12 sm:h-1/12 lg:w-12 lg:h-12 xl:w-12 xl:h-12 2xl:w-12 2xl:h-12" alt="">
                                            <p class="mt-2 text-base ml-2">Thanh toán qua VN Pay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" bg-white rounded-lg p-3 ">
                                <div class="flex">
                                    <font-awesome-icon :icon="['fas', 'cart-shopping']" class="mt-1" />
                                    <h2 class="text-xl font-semibold ml-2">Giỏ hàng</h2>
                                </div>
                                <hr>
                                <div class=" flex my-3">
                                    <input id="default-checkbox" type="checkbox" value="" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <p class="text-sm ml-3 text-red-700">Xóa tất cả sản phẩm</p>
                                </div>
                                
                                <hr>
                                <div class="flex my-3">
                                    <div class="flex">
                                        <input id="default-checkbox" type="checkbox" value="" class="icon_checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <img src="/img/hopxop.png" alt="">
                                    </div>
                                   
                                    <div class="block ml-1">
                                        <h3>Hộp carton 5 lớp | 20x30x15cm</h3>
                                        <p class="text-red-700 text-base">5,000 đ</p>
                                        <div class="flex my-2">
                                            <div class="buttons_added ">
                                                    <input class="minus is-form" type="button" value="-">
                                                    <input aria-label="quantity" class="input-qty" max="100" min="0" name="" type="number" value="" readonly>
                                                    <input class="plus is-form" type="button" value="+">
                                                    <font-awesome-icon :icon="['fas', 'trash']" style="color: #cc0f0f;" class="mt-2 ml-4"/>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="flex my-3">
                                    <div class="flex">
                                        <input id="default-checkbox" type="checkbox" value="" class="icon_checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <img src="/img/hopxop.png" alt="">
                                    </div>
                                    <div class="block ml-1">
                                        <h3>Hộp carton 5 lớp | 20x30x15cm</h3>
                                        <p class="text-red-700 text-base">5,000 đ</p>
                                        <div class="flex my-2">
                                            <div class="buttons_added ">
                                                    <input  class="minus is-form" type="button" value="-" @click="decrement()">
                                                   
                                                    <input aria-label="quantity" class="input-qty" max="100" min="0" name="" type="number" value="10" readonly>
                                                    <input  class="plus is-form" type="button" value="+">
                                                    <font-awesome-icon :icon="['fas', 'trash']" style="color: #cc0f0f;" class="mt-2 ml-4"/>
                                                </div>
                                        </div>
                                    </div>
                                </div> 
                                <hr>
                                <div class="flex my-3 delete-item" id="delete_3">
                                    <div class="flex">
                                        <input id="default-checkbox" type="checkbox" value="" class="icon_checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <img src="/img/hopxop.png" alt="">
                                    </div>
                                    <!-- <img src="/img/hopxop.png" alt=""> -->
                                    <div class="block ml-1">
                                        <h3>Hộp carton 5 lớp | 20x30x15cm</h3>
                                        <p class="text-red-700 text-base">5,000 đ</p>
                                        <div class="flex my-2">
                                            <div class="buttons_added ">
                                                    <input id= "btn-minus" class="minus is-form btn_quality" type="button" value="-" @click="decrement()">
                                                    <input aria-label="quantity" id="number_quality" class="value_quality input-qty" max="100" min="1" name="" type="number" value="5" readonly>
                                                    <input id="btn-plus" class="btn_quality btn-plus is-form" type="button" value="+" @click="HandPlus()">
                                                    <font-awesome-icon :icon="['fas', 'trash']" style="color: #cc0f0f;" class="mt-2 ml-4"/>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 pt-5">
                                    <hr>
                                    <div class="flex justify-between my-2">
                                        <p>Tạm tính:</p>
                                        <h3 class="text-xl text-red-700 font-semibold">1,000,000</h3>
                                    </div>
                                    <div class="my-2">
                                        <button class="uppercase min-[320px]:text-lg sm:text-xl md:text-xl lg:text-xl bg-primary text-white rounded-lg w-full py-2 ">Tạo đơn mới</button>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-gray-500 text-sm">Lưu ý: Số tiền trên chưa bao gồm phí ship </h3>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
    </section>
</template>
  
<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
export default {
    layout: Layout,
    components: {
        Link,
        Alert,
        SearchCategory,
        Head,
       
    },
    props: {
        categories: Array,
        errors: Object
    },
    data() {
        return {

        };
    },
    mounted: function () {
        // console.log("huyn")
        // $('input.input-qty').each(function() {
        // var $this = $(this),
        //     qty = $this.parent().find('.is-form'),
        //     min = Number($this.attr('min')),
        //     max = Number($this.attr('max'))
        // if (min == 0) {
        //     var d = 0
        // } else d = min
        // $(qty).on('click', function() {
        //     if ($(this).hasClass('minus')) {
        //     if (d > min) d += -1
        //     } else if ($(this).hasClass('plus')) {
        //     var x = Number($this.val()) + 1
        //     if (x <= max) d += 1
        //     }
        //     $this.attr('value', d).val(d)
        // })
        // });

        let amountElement = document.getElementById('number_quality');
            let amount = amountElement.value;
            console.log("value:",amount)
       
        
            $('#btn-plus').click(function(){
                amount++
                amountElement.value = amount
                console.log(amount)
            })
            $('#btn-minus').click(function(){
                if(amount >1){
                    amount--
                amountElement.value = amount 
                }
               else 
               $('.delete-item').css("display","none")
            })
    },
    methods: {
        render(amount){
            amountElement.value = amount
        },
       

    }
};
</script>
  
<style scoped>.list_icon_crud {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

    right: -40px;
    top: 20px;
    z-index: 111;
    display: inline-grid;
}

.btn_crud{
    font-size: 20px;
}
.icon_giam{
    width: 32px;
    height: 32px;
}

/*  */
.buttons_added {
    opacity:1;
    display:inline-block;
    display:-ms-inline-flexbox;
    display:inline-flex;
    white-space:nowrap;
    vertical-align:top;
}
.is-form {
    overflow:hidden;
    position:relative;
    background-color:#f9f9f9;
    height:2.2rem;
    width:1.9rem;
    padding:0;
    text-shadow:1px 1px 1px #fff;
    border:1px solid #ddd;
}
.is-form:focus,.input-text:focus {
    outline:none;
}
.is-form.minus {
    border-radius:4px 0 0 4px;
}
.is-form.plus {
    border-radius:0 4px 4px 0;
}
.input-qty {
    background-color:#fff;
    height:2.2rem;
    text-align:center;
    font-size:1rem;
    display:inline-block;
    vertical-align:top;
    margin:0;
    border-top:1px solid #ddd;
    border-bottom:1px solid #ddd;
    border-left:0;
    border-right:0;
    padding:0;
    width: 35px;
}
.input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
    -webkit-appearance:none;
    margin:0;
}
.icon_checkbox{
    margin-top:40%;
    margin-right:1rem;
}
</style>