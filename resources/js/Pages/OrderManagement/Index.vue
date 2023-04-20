<template>
  <section class="content">
    <Head title="Quản lý đơn hàng"></Head>
    <!-- Modal -->
    <div>
      <div class="min-[320px]:m-0 sm:m-2 md:m-4 lg:m-8 bg-white">
        <div class="min-[320px]:p-2 sm:p-2 md:p-2 lg:p-4 min-[320px]:mt-3 sm:mt-3 md:mt-0 lg:mt-0">
          <div class="min-[320px]:block sm:block md:block lg:flex lg:justify-between">
            <div>
              <h2 class="min-[320px]:text-xl sm:text-2xl font-semibold lg:text-3xl flex mr-2">
                Quản lý kho hàng
                <p class="text-gray-400">( 125 )</p>
              </h2>
            </div>

            <div>
              <button class="min-[320px]:mt-3 px-2 py-2 text-sm rounded-lg border mx-1">
                <font-awesome-icon :icon="['fas', 'download']" style="color: #0d0d0d;" class="mr-2" />Xuất file CSV
              </button>
              <button class="px-2 py-2 text-sm text-white bg-primary rounded-lg border mx-1">
                <font-awesome-icon :icon="['fas', 'plus']" />Tạo đơn hàng
              </button>
            </div>
          </div>

          <div class="my-3">
            <div
              class="min-[320px]:grid min-[320px]:justify-between sm:justify-start md:justify-start lg:justify-start sm:flex md:flex lg:flex"
            >
              <a
                href
                class="min-[320px]:my-2 text-sm px-3 py-2 border rounded-lg bg-gray-100 text-gray-500 mr-1"
              >
                Đơn chờ
                <span class="text-gray-400 ml-1">(50)</span>
              </a>
              <a
                href
                class="min-[320px]:my-2 text-sm px-3 py-2 border rounded-lg mx-1 bg-gray-100 hover:bg-white text-gray-500"
              >
                Đóng gói
                <span class="text-gray-400 ml-1">(50)</span>
              </a>
              <a
                href
                class="min-[320px]:my-2 text-sm px-3 py-2 border rounded-lg mx-1 bg-gray-100 hover:bg-white text-gray-500"
              >
                Đang vân chuyển
                <span class="text-gray-400 ml-1">(50)</span>
              </a>

              <a
                href
                class="min-[320px]:my-2 text-sm px-3 py-2 border rounded-lg mx-1 bg-gray-100 hover:bg-white text-gray-500"
              >
                Giao thành công
                <span class="text-gray-400 ml-1">(50)</span>
              </a>
              <a
                href
                class="min-[320px]:my-2 text-sm px-3 py-2 border rounded-lg mx-1 bg-gray-100 hover:bg-white text-gray-500"
              >
                Hoàn đơn
                <span class="text-gray-400 ml-1">(50)</span>
              </a>
              <a
                href
                class="min-[320px]:my-2 text-sm px-3 py-2 border rounded-lg mx-1 bg-gray-100 hover:bg-white text-gray-500"
              >
                Đơn hủy
                <span class="text-gray-400 ml-1">(50)</span>
              </a>
            </div>
            <div>
              <slot />
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
import OrderWait from "@/Pages/OrderManagement/OrderWait";
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
    return {};
  },
  mounted: function() {
    $(".list_icon_crud").hide();
    $(".item_crud").click(function(e) {
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
</style>