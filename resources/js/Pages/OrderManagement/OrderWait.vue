<template>
  <div>
    
    
    <div class="min-[320px]:block sm:block md:block lg:grid lg:gap-4 lg:grid-cols-2 my-4">
      <div>
        <div class="min-[320px]:block sm:flex">
          <div class="min-[320px]:w-full sm:w-1/5 mr-3 text-gray-500">
            <label for>Mã đơn hàng</label>
          </div>
          <div class="min-[320px]:w-full form_search sm:w-4/5">
            <form v-on:submit.prevent>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-sm text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </div>
                <input type="search" id="default-search" name="search" data-toggle="hideseek" laceholder="Search Menus"
                  data-list=".menu-category"
                  class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Tìm đơn hàng bằng mã đơn hàng" required />
              </div>
            </form>
          </div>
        </div>
        <div class="min-[320px]:block sm:flex lg:flex my-3">
          <div class="min-[320px]:w-full w-1/5 mr-3 text-gray-500">
            <label for>Ngày tạo đơn</label>
          </div>
          <div class="min-[320px]:w-full w-4/5">
            <div date-rangepicker class="flex items-center">
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
                <input name="start" type="date"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Ngày bắt đầu" />
              </div>
              <span class="mx-4 text-gray-500">đến</span>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
                <input name="end" type="date"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Ngày kết thúc" />
              </div>
            </div>
          </div>
        </div>
        <div class="min-[320px]:block sm:flex sm:my-2">
          <div class="min-[320px]:w-full sm:w-3/12 mr-3 text-gray-500">
            <label for>SKU</label>
          </div>
          <div class="min-[320px]:w-full form_search sm:w-9/12">
            <form v-on:submit.prevent>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-sm text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </div>
                <input type="search" id="default-search" name="search" data-toggle="hideseek" laceholder="Search Menus"
                  data-list=".menu-category"
                  class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Tìm sản phẩm bằng SKU" required />
              </div>
            </form>
          </div>
        </div>
      </div>
      <div>
        <div class="min-[320px]:block sm:flex sm:my-2">
          <div class="min-[320px]:w-full sm:w-3/12 mr-3 text-gray-500">
            <label for>Khách hàng</label>
          </div>
          <div class="min-[320px]:w-full form_search sm:w-9/12">
            <form v-on:submit.prevent>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-sm text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </div>
                <input type="search" id="default-search" name="search" data-toggle="hideseek" laceholder="Search Menus"
                  data-list=".menu-category"
                  class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Tìmkhách hàng bằng tên hoặc sđt" required />
              </div>
            </form>
          </div>
        </div>
        <div class="min-[320px]:block sm:flex my-3">
          <div class="min-[320px]:w-full sm:w-3/12 mr-3 text-gray-500">
            <label for>Phương thức TT</label>
          </div>
          <div class="min-[320px]:w-full sm:w-9/12">
            <select id="countries"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option selected>Tất cả</option>
              <option value="US">Còn hàng</option>
              <option value="CA">Hết hàng</option>
            </select>
          </div>
        </div>
        <div class="min-[320px]:block sm:flex my-3">
          <div class="min-[320px]:w-full sm:w-3/12 mr-3 text-gray-500">
            <label for>Trạng thái TT</label>
          </div>
          <div class="min-[320px]:w-full sm:w-9/12">
            <select id="countries"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option selected>Tất cả</option>
              <option value="US">Còn hàng</option>
              <option value="CA">Hết hàng</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="p-2 rounded-lg col-md-12">
      <div class="panel panel-default">
        <div class="panel-body relative overflow-x-auto shadow-md sm:rounded-lg">
          <div>
            <div
              class="grid grid-cols-5 gap-4 text-xs text-white uppercase bg-gray-600 dark:bg-gray-700 px-3 py-4 dark:text-gray-400">
              <div>
                <p>Mã đơn hàng</p>
              </div>
              <div>
                <p>Khách hàng</p>
              </div>
              <div>
                <p>SDT</p>
              </div>
              <div>
                <p>Thời gian tạo</p>
              </div>
              <div>
                <p>Trạng thái</p>
              </div>
            </div>
            <div class=" cursor-pointer">
              <div data-toggle="collapse" data-target="#demo1"
                class="accordion-toggle grid grid-cols-5 gap-4 text-sm px-3 py-3 dark:text-gray-400">
                <div>
                  <a><font-awesome-icon :icon="['fas', 'chevron-down']" class="mr-2" />DH - 1345</a>
                </div>
                <div>
                  <p>Hoàng Thị Huyền</p>
                </div>
                <div>
                  <p>098-844-2947</p>
                </div>
                <div>
                  <p>15:05 25/03/2023</p>
                </div>
                <div>
                  <p>Chờ</p>
                </div>
              </div>
              <div class="grid grid-cols-1 gap-4 bg-gray-300 p-3 border rounded-lg accordian-body collapse" id="demo1">
                <div class="my-3 rounded-lg border">
                  <div class="title_information p-2">
                    <h3>Thông tin khách hàng</h3>
                  </div>
                  <div class="grid grid-cols-4 gap-4  bg-white py-3 px-3">
                    <div class="block">
                      <p class="text-gray-500">Địa chỉ</p>
                      <div class="item_information p-2 bg-gray-100 rounded-lg">
                        <p class="text-gray-600">
                          Phố nhổn, quận Bắc Từ Liêm, Thành phố Hà Nội
                        </p>
                      </div>
                    </div>
                    <div class="grid grid-cols-4 gap-4 m-3">
                      <div class="block">
                        <p class="text-gray-500">Địa chỉ</p>
                        <div class="item_information p-2 bg-gray-100 rounded-lg">
                          <p class="text-gray-600">Phố nhổn, quận Bắc Từ Liêm, Thành phố Hà Nội</p>
                        </div>
                      </div>
                      <div class="block">
                        <p class="text-gray-500">Số nhà/ Địa chỉ cụ thể</p>
                        <div class="item_information p-2 bg-gray-100 rounded-lg">
                          <p class="text-gray-600">Số 120</p>
                        </div>
                      </div>
                      <div class="block">
                        <p class="text-gray-500">Ghi chú</p>
                        <div class="item_information p-2 bg-gray-100 rounded-lg">
                          <p class="text-gray-600">Giao trong tuần</p>
                        </div>
                      </div>
                      <div class="block">
                        <p class="text-gray-500">Hình thức thanh toán</p>
                        <div class="item_information p-2 bg-gray-100 rounded-lg">
                          <p class="text-gray-600">COD</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table table-striped w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="info">
                      <th>Sản phẩm</th>
                      <th>SL</th>
                      <th>Giá trước chiết khấu</th>
                      <th>Chiết khấu</th>
                      <th>Giá sau chiết khấu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class=" bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="/img/xop.png" alt="" />
                        <div class="ml-3">
                          <h4>
                            Hộp carton 3 lớp sóng E | 20x30x15cm | mặt nâu
                          </h4>
                          <p class="text-gray-500">SKU: CT3LSA203015MN</p>
                        </div>
                      </td>
                      <td class="px-6 py-4">50</td>
                      <td class="px-6 py-4">250,000 đ</td>
                      <td class="px-6 py-4">-10%</td>
                      <td class="px-6 py-4">225.000 đ7</td>
                    </tr>
                    <tr d
                      class=" bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="/img/xop.png" alt="" />
                        <div class="ml-3">
                          <h4>
                            Hộp carton 3 lớp sóng E | 20x30x15cm | mặt nâu
                          </h4>
                          <p class="text-gray-500">SKU: CT3LSA203015MN</p>
                        </div>
                      </td>
                      <td class="px-6 py-4">50</td>
                      <td class="px-6 py-4">250,000 đ</td>
                      <td class="px-6 py-4">-10%</td>
                      <td class="px-6 py-4">225.000 đ7</td>
                    </tr>
                    <tr class=" bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="/img/xop.png" alt="" />
                        <div class="ml-3">
                          <h4>
                            Hộp carton 3 lớp sóng E | 20x30x15cm | mặt nâu
                          </h4>
                          <p class="text-gray-500">SKU: CT3LSA203015MN</p>
                        </div>
                      </td>
                      <td class="px-6 py-4">50</td>
                      <td class="px-6 py-4">250,000 đ</td>
                      <td class="px-6 py-4">-10%</td>
                      <td class="px-6 py-4">225.000 đ7</td>
                    </tr>
                    <tr class=" bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="/img/xop.png" alt="" />
                        <div class="ml-3">
                          <h4>
                            Hộp carton 3 lớp sóng E | 20x30x15cm | mặt nâu
                          </h4>
                          <p class="text-gray-500">SKU: CT3LSA203015MN</p>
                        </div>
                      </td>
                      <td class="px-6 py-4">50</td>
                      <td class="px-6 py-4">250,000 đ</td>
                      <td class="px-6 py-4">-10%</td>
                      <td class="px-6 py-4">225.000 đ7</td>
                    </tr>
                    <tr class=" bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Công tiền hàng
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">450.000 đ</td>
                    </tr>
                    <tr class="a bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Chiết khấu
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">
                        <input type="text" class="w-3/4 rounded-lg border border-gray-300" placeholder="0%" />
                      </td>
                    </tr>
                    <tr class=" bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Phí ship
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">
                        <input type="text" class="w-3/4 rounded-lg border border-gray-300" placeholder="30,000 đ" />
                      </td>
                    </tr>
                    <tr class=" bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Khách phải trả
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">450,000 đ</td>
                    </tr>
                  </tbody>
                </table>
                <div class="flex justify-between ">
                  <button class="border rounded-lg bg-gray-100 px-3 py-2">
                    Hủy đơn
                  </button>
                  <div class="flex">

                    <select id="countries"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-4.5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option selected>Chưa thanh toán</option>

                      <option value="CA">Đã thanh toán</option>
                    </select>
                    <button class="px-3 py-2 ml-3 text-white border rounded-lg bg-primary">
                      Đóng gói hàng
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class=" cursor-pointer">
              <div data-toggle="collapse" data-target="#demo3"
                class="accordion-toggle grid grid-cols-5 gap-4 text-sm px-3 py-3 dark:text-gray-400">
                <div>
                  <a><font-awesome-icon :icon="['fas', 'chevron-down']" class="mr-2" />DH - 1345</a>
                </div>
                <div>
                  <p>Hoàng Thị Huyền</p>
                </div>
                <div>
                  <p>098-844-2947</p>
                </div>
                <div>
                  <p>15:05 25/03/2023</p>
                </div>
                <div>
                  <p>Chờ</p>
                </div>
              </div>
              <div class="grid grid-cols-1 gap-4 bg-gray-300 p-3 border rounded-lg accordian-body collapse" id="demo3">
                <div class="my-3 rounded-lg border">
                  <div class="title_information p-2">
                    <h3>Thông tin khách hàng</h3>
                  </div>
                  <div class="grid grid-cols-4 gap-4  bg-white py-3 px-3">
                    <div class="block">
                      <p class="text-gray-500">Địa chỉ</p>
                      <div class="item_information p-2 bg-gray-100 rounded-lg">
                        <p class="text-gray-600">
                          Phố nhổn, quận Bắc Từ Liêm, Thành phố Hà Nội
                        </p>
                      </div>
                    </div>
                    <div class="block">
                      <p class="text-gray-500">Số nhà/ Địa chỉ cụ thể</p>
                      <div class="item_information p-2 bg-gray-100 rounded-lg">
                        <p class="text-gray-600">Số 120</p>
                      </div>
                    </div>
                    <div class="block">
                      <p class="text-gray-500">Ghi chú</p>
                      <div class="item_information p-2 bg-gray-100 rounded-lg">
                        <p class="text-gray-600">Giao trong tuần</p>
                      </div>
                    </div>
                    <div class="block">
                      <p class="text-gray-500">Hình thức thanh toán</p>
                      <div class="item_information p-2 bg-gray-100 rounded-lg">
                        <p class="text-gray-600">COD</p>
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table table-striped w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="info">
                      <th>Sản phẩm</th>
                      <th>SL</th>
                      <th>Giá trước chiết khấu</th>
                      <th>Chiết khấu</th>
                      <th>Giá sau chiết khấu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class=" bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="/img/xop.png" alt="" />
                        <div class="ml-3">
                          <h4>
                            Hộp carton 3 lớp sóng E | 20x30x15cm | mặt nâu
                          </h4>
                          <p class="text-gray-500">SKU: CT3LSA203015MN</p>
                        </div>
                      </td>
                      <td class="px-6 py-4">50</td>
                      <td class="px-6 py-4">250,000 đ</td>
                      <td class="px-6 py-4">-10%</td>
                      <td class="px-6 py-4">225.000 đ7</td>
                    </tr>
                    <tr d
                      class=" bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="/img/xop.png" alt="" />
                        <div class="ml-3">
                          <h4>
                            Hộp carton 3 lớp sóng E | 20x30x15cm | mặt nâu
                          </h4>
                          <p class="text-gray-500">SKU: CT3LSA203015MN</p>
                        </div>
                      </td>
                      <td class="px-6 py-4">50</td>
                      <td class="px-6 py-4">250,000 đ</td>
                      <td class="px-6 py-4">-10%</td>
                      <td class="px-6 py-4">225.000 đ7</td>
                    </tr>
                    <tr class=" bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="/img/xop.png" alt="" />
                        <div class="ml-3">
                          <h4>
                            Hộp carton 3 lớp sóng E | 20x30x15cm | mặt nâu
                          </h4>
                          <p class="text-gray-500">SKU: CT3LSA203015MN</p>
                        </div>
                      </td>
                      <td class="px-6 py-4">50</td>
                      <td class="px-6 py-4">250,000 đ</td>
                      <td class="px-6 py-4">-10%</td>
                      <td class="px-6 py-4">225.000 đ7</td>
                    </tr>
                    <tr class=" bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="/img/xop.png" alt="" />
                        <div class="ml-3">
                          <h4>
                            Hộp carton 3 lớp sóng E | 20x30x15cm | mặt nâu
                          </h4>
                          <p class="text-gray-500">SKU: CT3LSA203015MN</p>
                        </div>
                      </td>
                      <td class="px-6 py-4">50</td>
                      <td class="px-6 py-4">250,000 đ</td>
                      <td class="px-6 py-4">-10%</td>
                      <td class="px-6 py-4">225.000 đ7</td>
                    </tr>
                    <tr class=" bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Công tiền hàng
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">450.000 đ</td>
                    </tr>
                    <tr class="a bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Chiết khấu
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">
                        <input type="text" class="w-3/4 rounded-lg border border-gray-300" placeholder="0%" />
                      </td>
                    </tr>
                    <tr class=" bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Phí ship
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">
                        <input type="text" class="w-3/4 rounded-lg border border-gray-300" placeholder="30,000 đ" />
                      </td>
                    </tr>
                    <tr class=" bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Khách phải trả
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">450,000 đ</td>
                    </tr>
                  </tbody>
                </table>
                <div class="flex justify-between ">
                  <button class="border rounded-lg bg-gray-100 px-3 py-2">
                    Hủy đơn
                  </button>
                  <div class="flex">

                    <select id="countries"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-4.5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option selected>Chưa thanh toán</option>

                      <option value="CA">Đã thanh toán</option>
                    </select>
                    <button class="px-3 py-2 ml-3 text-white border rounded-lg bg-primary">
                      Đóng gói hàng
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>
  
<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import OrderLayout from "@/Pages/OrderManagement/Index";
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
export default {
  layout: [Layout, OrderLayout],
  components: {
    Link,
    Alert,
    SearchCategory,
    Head
  },
  props: {
    categories: Array,
    errors: Object
  },
  data() {
    return {};
  },
  mounted: function () {
    $(".list_icon_crud").hide();
    $(".item_crud").click(function (e) {
      $(".list_icon_crud").hide();
      e.preventDefault();
      //   $(this).next(".list_icon_crud").css("display","inline-grid");
      $(this)
        .next(".list_icon_crud")
        .slideToggle();
    });
  },
  methods: {}
};
</script>
  
<style scoped>
.list_icon_crud {
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

  right: -40px;
  top: 20px;
  z-index: 111;
  display: inline-grid;
}

.btn_crud {
  font-size: 20px;
}

.title_information {
  background-color: #f3f4f6;
}

.item_information {
  height: 100px;
}

.collapse {
  visibility: inherit;
}
</style>