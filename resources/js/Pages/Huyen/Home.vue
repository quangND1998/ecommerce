<template>
  <section class="content">
    <Head title="Trang Chủ"></Head>
    <!-- Modal -->
    <div>
      <div class="min-[320px]:p-0 min-[320px]:m-0 lg:container mx-auto">
        <div class="min-[320px]:m-0 sm:m-2 md:m-4 lg:m-8">
          <div class="min-[320px]:p-0 sm:m-0 md:m-2 lg:p-4">
            <div class="bg-white rounded-md border p-3">
              <h3 class="text-xl font-semibold">Trang chủ</h3>
              <p class="text-gray-500 text-xs">Cài đặt slider trên trang chủ</p>
              <div>
                <h5 class="text-base font-semibold">Hình ảnh 1</h5>
                <div class="border rounded-md p-3">
                  <div class="flex items-center justify-center w-full">
                    <label
                      for="dropzone-file"
                      class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                    >
                      <div
                        class="flex flex-col items-center justify-center pt-5 pb-6"
                      >
                        <svg
                          aria-hidden="true"
                          class="w-10 h-10 mb-3 text-gray-400"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                          ></path>
                        </svg>
                        <p
                          class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                        >
                          <span class="font-semibold">Click to upload</span> or
                          drag and drop
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                          SVG, PNG, JPG or GIF (MAX. 800x400px)
                        </p>
                      </div>
                      <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                  </div>
                </div>
              </div>
              <div class="my-6">
                <label
                  for="default-input"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Link bài viết 1</label
                >
                <input
                  type="text"
                  id="default-input"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="http://"
                />
              </div>
              <div class="flex justify-between">
                <a href="" class="text-red-600 text-base">
                  <!-- <font-awesome-icon :icon="['fas', 'trash']" class="mr-3" /> -->
                  Xóa hình ảnh
                </a>
                <button
                  class="px-3 py-2 bg-primary text-white text-base rounded-md"
                >
                  Lưu hình ảnh
                </button>
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
</style>