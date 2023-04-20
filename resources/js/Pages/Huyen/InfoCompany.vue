<template>
    <section class="min-[320px]:p-0 min-[320px]:m-0 content">

        <Head title="Cài đặt thông itn chung"></Head>
        <!-- Modal -->
        <div>
            <div class="p-0 m-0 lg:container mx-auto">
                <div class="min-[320px]:m-2 sm:m-4 md:m-8 lg:m-8">
                    <div class="min-[320px]:p-0 sm:p-2 md:p-2 lg:p-4">
                        <div class="my-3 flex">
                            <div class="block">
                                <h2 class="min-[320px]:text-xl min-[320px]:mt-4 sm:text-xl md:text-2xl font-semibold lg:text-3xl flex mr-2">Thêm sản phẩm mới </h2>
                                <p class="text-gray-500 text-xs">Chỉnh sửa thông tin về công ty, liên kết, số điện thoại</p>                 
                            </div>
                        </div>
                        <div class="bg-white border rounded-md p-3">
                            <h3 class="text-lg font-semibold">Thông tin công ty</h3>
                            <div class="my-2">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên bài viết</label>
                                <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Công ty TNHH Lê Bùi">
                            </div>
                            <div class="my-2">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="mail"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="congtytnhhlebui@gmail.com">
                            </div>
                            <div class="my-2">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Địa chỉ</label>
                                <input type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Xưởng Carton Lê Bùi - Phù Dực, Phù Đổng, Gia Lam, Hà Nội">
                            </div>
                            <div class="my-2">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mã số thuế</label>
                                <input type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            </div>
                        </div>
                        <div class="bg-white border rounded-md my-5 p-3">
                            <h3 class="text-lg font-semibold">Liên hệ</h3>
                            <div class="my-2">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số hotline</label>
                                <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            </div>
                            <div class="my-2">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zalo</label>
                                <input type="mail"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            </div>
                            <div class="my-2">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                                <input type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            </div>
                            <div class="my-2">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nhúng bản đồ</label>              
                                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhúng iframe bản đồ"></textarea>

                            </div>
                        </div>
                        <div class="text-end">
                            <button class="px-3 py-2 bg-primary text-white rounded-md">Lưu thông tin</button>
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

.btn_crud {
    font-size: 20px;
}</style>