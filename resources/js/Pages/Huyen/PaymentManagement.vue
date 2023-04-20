<template>
    <section class=" min-[320px]:m-0 min-[320px]:p-0 content">

        <Head title="Quản lý thanh toán"></Head>
        <!-- Modal -->
        <div>
            <div class="min-[320px]:m-0 min-[320px]:p-0 container mx-auto">
                <div class="min-[320px]:m-0 m-8">
                    <div class=" min-[320px]:p-0 p-4">
                        <div class="min-[320px]:p-0 bg-white rounded-md border p-3 ">
                            <h3 class="text-xl font-semibold">Quản lý thanh toán</h3>
                            <div class="border rounded-md p-2 my-3">
                                <div class=" min-[320px]:block sm:block md:block xl:grid 2xl:grid grid grid-cols-3 gap-4 ">
                                    <div>
                                        <ul>
                                            <li class="py-3">
                                                <a href="" class="flex">
                                                    <img src="/img/cod1.png" alt="">
                                                    <div class="ml-2">
                                                        <p class="text-base text-gray-600">Thanh toán khi giao hàng (COD)</p>
                                                        <p class="text-sm text-gray-400"><font-awesome-icon :icon="['fas', 'circle-check']" style="color: #10da5e;" class="mr-2" />Đang kích hoạt</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-1 bg-gray-300">
                                                <a href="" class="flex">
                                                    <img src="/img/atm.png" alt="">
                                                    <div class="ml-2">
                                                        <p class="text-base text-gray-600">Thanh toán qua tài khoản ngân hàng</p>
                                                        <p class="text-sm text-gray-400"><font-awesome-icon :icon="['fas', 'circle-check']" style="color: #10da5e;" class="mr-2" />Đang kích hoạt</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-3">
                                                <a href="" class="flex">
                                                    <img src="/img/momo.png" alt="">
                                                    <div class="ml-2">
                                                        <p class="text-base text-gray-600">Thanh toán qua Momo</p>
                                                        <p class="text-sm text-gray-400"><font-awesome-icon :icon="['fas', 'circle-xmark']" style="color: #909192;"  class="mr-2"/>Không hoạt động</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-3">
                                                <a href="" class="flex">
                                                    <img src="/img/zalo1.png" alt="">
                                                    <div class="ml-2">
                                                        <p class="text-base text-gray-600">Thanh toán qua Zalo Pay</p>
                                                        <p class="text-sm text-gray-400"><font-awesome-icon :icon="['fas', 'circle-xmark']" style="color: #909192;"  class="mr-2"/>Không hoạt động</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-3">
                                                <a href="" class="flex">
                                                    <img src="/img/sp_pay.png" alt="">
                                                    <div class="ml-2">
                                                        <p class="text-base text-gray-600">Thanh toán qua Shoppe Pay</p>
                                                        <p class="text-sm text-gray-400"><font-awesome-icon :icon="['fas', 'circle-xmark']" style="color: #909192;"  class="mr-2"/>Không hoạt động</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-3">
                                                <a href="" class="flex">
                                                    <img src="/img/vn_pay.png" alt="">
                                                    <div class="ml-2">
                                                        <p class="text-base text-gray-600">Thanh toán qua VN Pay</p>
                                                        <p class="text-sm text-gray-400"><font-awesome-icon :icon="['fas', 'circle-xmark']" style="color: #909192;"  class="mr-2"/>Không hoạt động</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="min-[320px]:p-0 md:p-3 xl:p-3 2xl:p-3 col-span-2 bg-gray-200 p-3">
                                        <h4 class="text-lg font-semibold">Thông tin tài khoản / địa chỉ ví nhận tiền</h4>
                                        <div class="bg-white rounded-md p-3 my-4">

                                            <form>
                                                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                                    <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
                                                        <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
                                                            <div class="flex items-center space-x-1 sm:pr-4">
                                                                <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path></svg>
                                                                    <span class="sr-only">Attach file</span>
                                                                </button>
                                                                <button type="button" class=" p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                                                                    <span class="sr-only">Embed map</span>
                                                                </button>
                                                                <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                                                                    <span class="sr-only">Upload image</span>
                                                                </button>
                                                                <button type="button" class="min-[320px]:hidden p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                        <span class="sr-only">Format code</span>
                                                                </button>
                                                                <button type="button" class="min-[320px]:hidden p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd"></path></svg>
                                                                    <span class="sr-only">Add emoji</span>
                                                                </button>
                                                            </div>
                                                            <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
                                                                <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                                                    <span class="sr-only">Add list</span>
                                                                </button>
                                                                <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>       
                                                                    <span class="sr-only">Settings</span>
                                                                </button>
                                                                <button type="button" class=" min-[320px]:hidden p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                                                    <span class="sr-only">Timeline</span>
                                                                </button>
                                                                <button type="button" class=" min-[320px]:hidden p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                    <span class="sr-only">Download</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <button type="button" data-tooltip-target="tooltip-fullscreen" class=" min-[320px]:hidden p-2 text-gray-500 rounded cursor-pointer sm:ml-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 11-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                                            <span class="sr-only">Full screen</span>
                                                        </button>
                                                        <div id="tooltip-fullscreen" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                            Show full screen
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </div>
                                                    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                                                        <label for="editor" class="sr-only">Publish post</label>
                                                        <textarea id="editor" rows="13" class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write an article..." required></textarea>
                                                    </div>
                                                </div>
  
                                            </form>
                                            <hr class="pb-4">
                                            <div class="flex justify-between">                                                
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" value="" class="sr-only peer">
                                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                    <span class="ml-3 text-xs lg:text-sm font-medium text-gray-900 dark:text-gray-300">Nhận tiền qua địa chỉ/ví này</span>
                                                </label>
                                                <button class="px-1 py-0 text-white bg-primary rounded-md lg:px-3 lg:py-2">Lưu</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
     
</section></template>
  
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
       
    },
    methods: {


    }
};
</script>
  
<style scoped>

</style>