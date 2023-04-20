<template>
  <section class="content">
    <Head title="Dữ liệu khách hàng"></Head>
    <!-- Modal -->
    <div>
      <div class="min-[320px]:p-0 min-[320px]:m-0 lg:container mx-auto">
        <div class="min-[320px]:m-0 sm:m-2 md:m-4 lg:m-8 bg-white">
          <div class="min-[320px]:p-2 sm:m-0 md:m-2 lg:p-4">
            <h2
              class="min-[320px]:text-xl min-[320px]:mt-3 sm:text-xl md:text-2xl font-semibold lg:text-3xl flex mr-2"
            >Dữ liệu khách hàng</h2>
            <div class="my-3">
              <div
                class="min-[320px]:block sm:flex sm:justify-between md:flex md:justify-between lg:flex lg:justify-between"
              >
                <div class="flex">
                  <div class="form_search">
                    <form v-on:submit.prevent>
                      <div class="relative">
                        <div
                          class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        >
                          <svg
                            aria-hidden="true"
                            class="w-5 h-5 text-sm text-gray-500 dark:text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                          </svg>
                        </div>
                        <input
                          v-model="term"
                          @keyup="search"
                          class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Tìm kiếm số điện thoại, địa chỉ"
                          required
                        />
                      </div>
                    </form>
                  </div>
                </div>
                <div class>
                  <a
                    :href="route('customers.export')"
                    target="_blank"
                    class="min-[320px]:mt-3 sm:mt-0 md:mt-0 lg:mt-0 bg-gray-200 border px-3 py-2 rounded-lg text-black"
                  >
                    <font-awesome-icon :icon="['fas', 'download']" class="mr-3" />Xuất file CSV
                  </a>
                </div>
              </div>
              <div class="my-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                      class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                      <tr>
                        <th scope="col" class="px-6 py-3">
                          <div class="flex items-center">
                            ID
                            <a href="#">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-3 h-3 ml-1"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 320 512"
                              >
                                <path
                                  d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"
                                />
                              </svg>
                            </a>
                          </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                          <div class="flex items-center">
                            Tên khách hàng
                            <a href="#">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-3 h-3 ml-1"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 320 512"
                              >
                                <path
                                  d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"
                                />
                              </svg>
                            </a>
                          </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                          <div class="flex items-center">
                            Số điện thoại
                            <a href="#">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-3 h-3 ml-1"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 320 512"
                              >
                                <path
                                  d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"
                                />
                              </svg>
                            </a>
                          </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                          <div class="flex items-center">
                            Phường/xã
                            <a href="#">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-3 h-3 ml-1"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 320 512"
                              >
                                <path
                                  d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"
                                />
                              </svg>
                            </a>
                          </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                          <div class="flex items-center">
                            Quận/huyện
                            <a href="#">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-3 h-3 ml-1"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 320 512"
                              >
                                <path
                                  d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"
                                />
                              </svg>
                            </a>
                          </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                          <div class="flex items-center">
                            Tỉnh/thành
                            <a href="#">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-3 h-3 ml-1"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 320 512"
                              >
                                <path
                                  d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"
                                />
                              </svg>
                            </a>
                          </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                          <div class="flex items-center">
                            Địa chỉ cụ thể
                            <a href="#">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-3 h-3 ml-1"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 320 512"
                              >
                                <path
                                  d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"
                                />
                              </svg>
                            </a>
                          </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(customer, index) in customers.data" :key="index">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ index ++ }}</td>
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ customer.name }}</td>
                        <td
                          class="whitespace-nowrap px-6 py-4 font-medium"
                        >{{ customer.phone_number }}</td>
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ customer.wards }}</td>
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ customer.district }}</td>
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ customer.city }}</td>
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ customer.address }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <Pagination :links="customers.links" />
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
import Pagination from "@/Components/Pagination.vue";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    Pagination,

    Head
  },
  props: {
    customers: Object,
    errors: Object
  },
  data() {
    return {
      term: null
    };
  },
  mounted: function() {
    $(document).ready(function() {
      var multipleCancelButton = new Choices(
        "#choices-multiple-remove-button",
        {
          removeItemButton: true,
          maxItemCount: 5,
          searchResultLimit: 5,
          renderChoiceLimit: 5
        }
      );
    });
  },
  methods: {
    search() {
      this.$inertia.get(
        this.route(`customers.index`),
        { term: this.term },
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    }
  }
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