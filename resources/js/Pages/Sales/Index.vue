<template>
  <section class="content">
    <Head title="Chương trình sale"></Head>
    <!-- Modal -->
    <div>
      <div class="m-8 bg-white">
        <div class="p-4">
          <h2 class="font-semibold text-3xl flex mr-2">
            Chương trình sale
            <p class="text-gray-400">( {{ total }} )</p>
          </h2>
          <div class="my-3">
            <div class="flex justify-between">
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
                        type="search"
                        v-model="term"
                        @keyup="search"
                        laceholder="Search Menus"
                        data-list=".menu-category"
                        class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tìm sản phẩm bằng SKU, Tên sản phẩm.."
                        required
                      />
                    </div>
                  </form>
                </div>
                <div class>
                  <select
                    id="countries"
                    v-model="filter"
                    @change="Filter"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option :value="null">Tình trạng</option>
                    <option value="pending">Chưa bắt đầu</option>
                    <option value="running">Đang sales</option>
                    <option value="finished">Đã kết thúc</option>
                  </select>
                </div>
                <div class="mt-2" v-if="selected.length > 0">
                  <a href class="flex text-red-600 mx-3 text-sm">
                    <font-awesome-icon
                      :icon="['fas', 'trash']"
                      style="color: #d22839;"
                      class="mx-2 mt-1"
                    />Xóa
                    <span>({{ selected.length }})</span> sản phẩm đã chọn
                  </a>
                </div>
              </div>

              <div class>
                <Link
                  :href="route('sales.create')"
                  class="bg-primary px-3 py-2 rounded-lg text-white"
                  data-toggle="modal"
                  data-target="#exampleModal"
                >
                  <font-awesome-icon :icon="['fas', 'plus']" class="mr-2" />Thêm chương trình
                </Link>
              </div>
            </div>
          </div>
          <div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      <input
                        id="default-checkbox"
                        type="checkbox"
                        v-model="selectAll"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      />
                    </th>
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
                        Tên chương trình
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
                        Chế độ chiết khấu
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
                        Số lượng sản phẩm
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
                        Thời gian sale
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
                        Trạng thái
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
                    <th scope="col" class="px-6 py-3"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(sale, index) in sales.data"
                    :key="index"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                  >
                    <th
                      scope="row"
                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      <input
                        id="default-checkbox"
                        type="checkbox"
                        v-model="selected"
                        :value="sale.id"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      />
                    </th>
                    <td class="px-6 py-4">{{ index + 1 }}</td>
                    <td class="px-6 py-4 uppercase">{{ sale.name }}</td>
                    <td
                      class="px-6 py-4"
                    >{{ sale.type == "all" ? 'Toàn chương trình' : "Theo sản phẩm" }}</td>
                    <td class="px-6 py-4">{{ sale.sale_items_count }}</td>
                    <td class="px-6 py-4">
                      <div>
                        <p>{{ formatTimeDayMonthyear(sale.start_date) }}</p>
                        <p>{{ formatTimeDayMonthyear(sale.end_date) }}</p>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div
                        class="p-1 rounded-xl bg-primary text-white tag_sale"
                        v-if="sale.state == 'pending'"
                      >Chưa bắt đầu</div>

                      <div
                        class="p-1 rounded-xl bg-pink-200 text-red-600 tag_sale"
                        v-if="sale.state == 'running'"
                      >Đang sale</div>

                      <div
                        class="p-1 rounded-xl bg-gray-100 text-black tag_sale"
                        v-if="sale.state == 'finished'"
                      >Đã kết thúc</div>
                    </td>
                    <td class="px-6 py-4">
                      <select
                        @change="onChangeState(sale, $event)"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      >
                        <option
                          value="pending"
                          :selected="sale.state == 'pending' ? true : false"
                        >Chưa bắt đầu</option>
                        <option
                          value="finished"
                          :selected="sale.state == 'finished' ? true : false"
                        >Đã kết thúc</option>
                        <option
                          value="running"
                          :selected="sale.state == 'running' ? true : false"
                        >Đang sale</option>
                      </select>
                    </td>
                    <td class="px-6 py-4">
                      <div class="dropdown">
                        <button
                          type="button"
                          id="dropdownMenuButton"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          class="btn_crud"
                        >
                          <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                        </button>
                        <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                          <Link
                            class="dropdown-item text-sm py-2 cursor-pointer"
                            :href="route('sales.detail',sale)"
                          >Chỉnh sửa</Link>
                          <a class="dropdown-item text-sm py-2 cursor-pointer">Xem trước</a>
                          <a class="dropdown-item text-sm py-2 cursor-pointer text-red-600">Xóa</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <Pagination :links="sales.links" />
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
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    SearchCategory,
    Head,
    Pagination
  },
  props: {
    sales: Object,
    errors: Object,
    state: String,
    total: Number
  },
  data() {
    return {
      filter: this.state,
      term: null,
      selected: []
    };
  },
  computed: {
    selectAll: {
      get: function() {
        return this.sales.data
          ? this.selected.length == this.sales.data
          : false;
      },
      set: function(value) {
        var selected = [];

        if (value) {
          this.sales.data.forEach(function(sale) {
            selected.push(sale.id);
          });
        }

        this.selected = selected;
      }
    },
    searchItems: function() {
      if (this.search != null) {
        return this.sale.sale_items.filter(item => {
          return (
            item.SKU.toLowerCase().includes(this.search.toLowerCase()) ||
            item.name.toLowerCase().includes(this.search.toLowerCase())
          );
        });
      } else {
        return this.sale.sale_items;
      }
    }
  },
  mounted: function() {},
  methods: {
    search() {
      this.$inertia.get(
        this.route(`sales.index`),
        { term: this.term },
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    },
    Filter(event) {
      if (event.target.value == "") {
        this.$inertia.get(
          this.route("sales.index"),
          {},
          {
            preserveScroll: true
          }
        );
      } else {
        this.filter = event.target.value;
        let query = {
          state: event.target.value
        };
        this.$inertia.get(this.route("sales.index"), query, {
          preserveScroll: true
        });
      }
    },
    onChangeState(product, event) {
      let query = {
        state: event.target.value,
        id: product.id
      };
      this.$inertia.post(route("sales.changeState"), query, {
        preserveState: true,
        preserveScroll: true
      });
    }
  }
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

.tag_sale {
  width: fit-content;
}
</style>