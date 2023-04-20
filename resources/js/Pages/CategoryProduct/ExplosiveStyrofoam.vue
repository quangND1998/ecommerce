<template>
    <section class="content">

        <Head title="Kho hàng"></Head>
        <!-- Modal -->
        <div>
            <div class="flex justify-between mt-5 ">
                            <div class="flex">
                                <div class="form_search ">
                                    <form v-on:submit.prevent>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true"
                                                    class="w-5 h-5 text-sm text-gray-500 dark:text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </div>
                                            <input type="search" id="default-search" name="search" data-toggle="hideseek"
                                                laceholder="Search Menus" data-list=".menu-category"
                                                class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tìm sản phẩm bằng SKU, Tên sản phẩm.." required />
                                        </div>
                                    </form>
                                </div>
                                <div class="">
                                    <select id="countries"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Tình trạng</option>
                                        <option value="US">Còn hàng</option>
                                        <option value="CA">Hết hàng</option>

                                    </select>


                                </div>
                                <div class="mt-2">
                                    <a href="" class="flex text-red-600 mx-3 text-sm">
                                        <font-awesome-icon :icon="['fas', 'trash']" style="color: #d22839;"
                                            class="mx-2 mt-1" />
                                        Xóa <span>(2)</span> sản phẩm đã chọn
                                    </a>
                                </div>
                            </div>
                            <div>
                                <button class="px-2 py-2 text-sm rounded-lg border mx-1">
                                    <font-awesome-icon :icon="['fas', 'download']" style="color: #0d0d0d;" class="mr-2" />
                                    Xuất file CSV
                                </button>
                                <button class="px-2 py-2 text-sm bg-gray-200 rounded-lg border mx-1">
                                    <font-awesome-icon :icon="['far', 'file']" class="mr-2" />
                                    Nhập file CSV
                                </button>
                                <button class="px-2 py-2 text-sm text-white bg-primary rounded-lg border mx-1">
                                    <font-awesome-icon :icon="['fas', 'plus']" class="mr-2" />
                                    Thêm 1 sản phẩm
                                </button>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="">
                                            <table class="min-w-full text-left text-sm font-light">
                                                <thead class="border-b font-medium dark:border-neutral-500">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-4">
                                                            <input id="default-checkbox" type="checkbox" value=""
                                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        </th>
                                                        <th scope="col" class="px-6 py-4 text-sm font-semibold">Hình ảnh
                                                        </th>
                                                        <th scope="col" class="px-6 py-4 text-sm font-semibold">SKU</th>
                                                        <th scope="col" class="px-6 py-4 text-sm font-semibold">Tên sản phẩm
                                                        </th>
                                                        <th scope="col" class="px-6 py-4 text-sm font-semibold">Giá bán</th>
                                                        <th scope="col" class="px-6 py-4 text-sm font-semibold">Giá gốc</th>
                                                        <th scope="col" class="px-6 py-4 text-sm font-semibold">Đã bán</th>
                                                        <th scope="col" class="px-6 py-4 text-sm font-semibold">Tình trạng
                                                        </th>
                                                        <th scope="col" class="px-6 py-4 text-sm font-semibold"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="border-b dark:border-neutral-500">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                            <input id="default-checkbox" type="checkbox" value=""
                                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            <img src="img/xop.png" alt="">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <button
                                                                class="px-2 py-2 text-xs  rounded-lg border">CT3LSA203015MN</button>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">Hộp carton 3 lớp sóng E |
                                                            20x30x15cm | mặt nâu</td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <input class="px-2 w-8/12 py-2 text-xs  rounded-lg border"
                                                                type="text" placeholder="5,000 đ" />
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <input class="px-2 w-8/12 py-2 text-xs  rounded-lg border"
                                                                type="text" placeholder="5,000 đ" />
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <select id="countries"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected>Auto</option>
                                                                <option value="US">Auto 2</option>
                                                            </select>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <select id="countries"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected>Tình trạng</option>
                                                                <option value="US">Còn hàng</option>
                                                                <option value="US">Hết hàng</option>

                                                            </select>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 relative">
                                                            <div class="dropdown">
                                                                <button type="button" id="dropdownMenuButton"
                                                                    data-toggle="dropdown" class="btn_crud"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <font-awesome-icon
                                                                        :icon="['fas', 'ellipsis-vertical']" />
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item text-sm py-2 cursor-pointer"
                                                                        data-toggle="modal" data-target="#exampleModal"
                                                                        @click="edit(cate)">Chỉnh sửa</a>

                                                                    <a
                                                                        class="dropdown-item text-sm py-2 cursor-pointer text-red-600">Xóa</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-b dark:border-neutral-500">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                            <input id="default-checkbox" type="checkbox" value=""
                                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            <img src="img/xop.png" alt="">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <button
                                                                class="px-2 py-2 text-xs  rounded-lg border">CT3LSA203015MN</button>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">Hộp carton 3 lớp sóng E |
                                                            20x30x15cm | mặt nâu</td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <input class="px-2 w-8/12 py-2 text-xs  rounded-lg border"
                                                                type="text" placeholder="5,000 đ" />
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <input class="px-2 w-8/12 py-2 text-xs  rounded-lg border"
                                                                type="text" placeholder="5,000 đ" />
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <select id="countries"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected>Auto</option>
                                                                <option value="US">Auto 2</option>
                                                            </select>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <select id="countries"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected>Tình trạng</option>
                                                                <option value="US">Còn hàng</option>
                                                                <option value="US">Hết hàng</option>

                                                            </select>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 relative">
                                                            <div class="dropdown">
                                                                <button type="button" id="dropdownMenuButton"
                                                                    data-toggle="dropdown" class="btn_crud"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <font-awesome-icon
                                                                        :icon="['fas', 'ellipsis-vertical']" />
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item text-sm py-2 cursor-pointer"
                                                                        data-toggle="modal" data-target="#exampleModal"
                                                                        @click="edit(cate)">Chỉnh sửa</a>

                                                                    <a
                                                                        class="dropdown-item text-sm py-2 cursor-pointer text-red-600">Xóa</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-b dark:border-neutral-500">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                            <input id="default-checkbox" type="checkbox" value=""
                                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            <img src="img/xop.png" alt="">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <button
                                                                class="px-2 py-2 text-xs  rounded-lg border">CT3LSA203015MN</button>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">Hộp carton 3 lớp sóng E |
                                                            20x30x15cm | mặt nâu</td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <input class="px-2 w-8/12 py-2 text-xs  rounded-lg border"
                                                                type="text" placeholder="5,000 đ" />
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <input class="px-2 w-8/12 py-2 text-xs  rounded-lg border"
                                                                type="text" placeholder="5,000 đ" />
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <select id="countries"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected>Auto</option>
                                                                <option value="US">Auto 2</option>
                                                            </select>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-2">
                                                            <select id="countries"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected>Tình trạng</option>
                                                                <option value="US">Còn hàng</option>
                                                                <option value="US">Hết hàng</option>

                                                            </select>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 relative">
                                                            <div class="dropdown">
                                                                <button type="button" id="dropdownMenuButton"
                                                                    data-toggle="dropdown" class="btn_crud"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <font-awesome-icon
                                                                        :icon="['fas', 'ellipsis-vertical']" />
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item text-sm py-2 cursor-pointer"
                                                                        data-toggle="modal" data-target="#exampleModal"
                                                                        @click="edit(cate)">Chỉnh sửa</a>

                                                                    <a
                                                                        class="dropdown-item text-sm py-2 cursor-pointer text-red-600">Xóa</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
 m        </div>
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
        Head
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
        $(".list_icon_crud").hide();
        $(".item_crud").click(function (e) {
            $(".list_icon_crud").hide();
            e.preventDefault();
            //   $(this).next(".list_icon_crud").css("display","inline-grid");
            $(this).next(".list_icon_crud").slideToggle();
        })
    },
    methods: {


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
</style>