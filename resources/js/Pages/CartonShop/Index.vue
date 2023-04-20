<template>
  <section class="content">
    <Head title="Dữ liệu khách hàng"></Head>
    <!-- Modal -->
    <div>
      <div class="min-[320px]:p-0 min-[320px]:m-0 sm:p-0 sm:m-0 md:container lg:container mx-auto">
        <div class="min-[320px]:m-0 sm:m-2 md:m-4 lg:m-8 ">
          <div class="min-[320px]:p-0 sm:m-0 md:m-2 lg:p-4 max-w-screen-md mx-auto">
            <div class="flex">
              <h2
                class="min-[320px]:text-xl min-[320px]:mt-3 sm:text-xl md:text-2xl font-semibold lg:text-3xl flex mr-2"
              >
                Xin chào
              </h2>
              <p
                class="text_logo min-[320px]:text-xl min-[320px]:mt-3 sm:text-xl md:text-2xl font-semibold lg:text-3xl flex mr-2"
              >
                Carton Le Bui
              </p>
            </div>
            <div class="my-3 flex">
              <p class="text-gray-500 text-base">
                Hiện đang có
                <span class="mx-2 text-xl text-red-600">05</span> đơn hàng đang
                đợi bạn.
                <a href class="link_view ml-2 text-sm">Xem ngay</a>
                <font-awesome-icon
                  :icon="['fas', 'chevron-right']"
                  class="text-xs ml-2"
                  style="color: #3b82f6"
                />
              </p>
            </div>
            <div class="mt-16">
          <h2 class="uppercase text-base  font-bold">tổng quan đơn hàng</h2>
          <div class="min-[320px]:flex min-[320px]:flex-wrap lg:flex lg:flex-nowrap my-4 list_cart">
            <div class="item_cart min-[320px]:w-5/12 min-[320px]:my-2  mr-2 lg:w-4/12 py-4 px-2 rounded-xl bg-primary text-white">
              <h3 class="text-sm font-semibold ">Đơn mới</h3>
              <div class="flex">
                <p class="text-4xl font-semibold">05</p>
                <p class="mx-3  text-base">đơn hàng</p>
              </div>
            </div>
            <div class="item_cart min-[320px]:w-5/12 min-[320px]:my-2  item_cart_white mx-2 lg:w-4/12 py-4 px-2 rounded-xl">
              <h3 class="text-sm font-semibold text-gray-500">Đã bán</h3>
              <div class="flex">
                <p class="text-4xl font-semibold text-black">05</p>
                <p class="mx-3 text-gray-500 text-base">đơn hàng</p>
              </div>
            </div>
            <div class="item_cart min-[320px]:w-5/12 min-[320px]:my-2 item_cart_white ml-2 lg:w-4/12 py-4 px-2 rounded-xl bg-white">
              <h3 class="text-sm font-semibold text-gray-500">Đơn hàng hủy</h3>
              <div class="flex">
                <p class="text-4xl font-semibold text-black">35</p>
                <p class="mx-3 text-gray-500 text-base">đơn hàng</p>
              </div>
            </div>
          </div>
          <div class="my-4 revenue">
            <h3 class="text-gray-600 text-sm">Doanh thu (tháng này)</h3>
            <h1 class="min-[320px]:text-3xl text-4xl font-semibold my-3">153,640,000 đ</h1>
          </div>
          <div class="my-4">
            <h2 class="uppercase text-base font-bold">tác vụ nhanh</h2>

            <div class="quick_action my-3">
              <div class="p-3">
                <div class="item_quickAction flex justify-between">
                  <a href class="text-base">
                    <font-awesome-icon :icon="['far', 'file']" style="lg" class="mr-3" />xem đơn hàng
                  </a>
                  <div>
                    <font-awesome-icon :icon="['fas', 'chevron-right']" />
                  </div>
                </div>
                <div class="item_quickAction flex justify-between">
                  <a href class="text-base">
                    <font-awesome-icon :icon="['far', 'file']" style="lg" class="mr-3" />Đăng sản phẩm
                  </a>
                  <div>
                    <font-awesome-icon :icon="['fas', 'chevron-right']" />
                  </div>
                </div>
                <div class="item_quickAction flex justify-between">
                  <a href class="text-base">
                    <font-awesome-icon :icon="['fasl', 'file-pen']" class="mr-3" />Đăng bài viết
                  </a>
                  <div>
                    <font-awesome-icon :icon="['fas', 'chevron-right']" />
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
  </section>
</template>
    
  <script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
import Multiselect from "@vueform/multiselect/dist/multiselect.vue2.js";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    SearchCategory,
    Multiselect,
    Head,
  },
  props: {
    categories: Array,
    errors: Object,
  },
  data() {
    return {};
  },
  mounted: function () {
    $(document).ready(function () {
      var multipleCancelButton = new Choices(
        "#choices-multiple-remove-button",
        {
          removeItemButton: true,
          maxItemCount: 5,
          searchResultLimit: 5,
          renderChoiceLimit: 5,
        }
      );
    });
  },
  methods: {},
};
</script>
  <style src="@vueform/multiselect/themes/default.css"></style>
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
.mt-100 {
  margin-top: 100px;
}
body {
  background: #00b4db;
  background: -webkit-linear-gradient(to right, #0083b0, #00b4db);
  background: linear-gradient(to right, #0083b0, #00b4db);
  color: #514b64;
  min-height: 100vh;
}
.choices__input.choices__input--cloned {
  width: 100% !important;
}

.text_logo {
  color: #3b82f6;
}
.link_view {
  color: #3b82f6;
}
.item_cart {
  /* display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding: 16px 16px 24px 24px;
  gap: 16px;
  width: 33%;
  height: 116px;
  background: #3b82f6; */
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1),
    0px 1px 2px -1px rgba(0, 0, 0, 0.1);
  /* border-radius: 16px;
  color: #fff; */
}
.item_cart_white {
  background-color: #fff;
}
.revenue {
  background: #ffffff;
  /* shadow */
  padding: 16px 16px 24px 24px;
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1),
    0px 1px 2px -1px rgba(0, 0, 0, 0.1);
  border-radius: 16px;
  width: 100%;
  height: 116px;
}
.revenue h1 {
  color: #3b82f6;
}
.quick_action {
  width: 100%;
  height: 232px;
  background: #ffffff;
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1),
    0px 1px 2px -1px rgba(0, 0, 0, 0.1);
  border-radius: 16px;
}
.item_quickAction {
  padding: 20px 0px;
  gap: 16px;

  width: 656px;
  height: 64px;
}
/* @media only screen and (min-width: 1024px) {
  .item_cart {
  display: flex;
  padding: 16px 16px 24px 24px;
  gap: 16px;
  width: 33%;
  height: 116px;
  background: #3b82f6;
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1),
    0px 1px 2px -1px rgba(0, 0, 0, 0.1);
  border-radius: 16px;
  color: #fff;
}
.list_cart{
  width: 100%;
    display: flex;
  

  align-items: flex-start;
}
}
@media only screen and (min-width: 320px) {
  .item_cart {
  display: flex;
 margin:0.4rem 0rem;
  padding: 16px 16px 24px 24px;
  gap: 16px;
  width: 45%;
  height: 116px;
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1),
    0px 1px 2px -1px rgba(0, 0, 0, 0.1);
  border-radius: 16px;
  color: #fff;
}
.list_cart{
  width: 100%;
    display: flex;
    flex-wrap: wrap;
}

} */

</style>