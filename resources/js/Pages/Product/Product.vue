<template>
  <div>
    <ImportModel :errors="errors" />
    <div class="flex justify-between mt-5">
      <div class="flex">
        <div class="form_search">
          <form v-on:submit.prevent>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
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
                name="search"
                data-toggle="hideseek"
                laceholder="Search Menus"
                class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Tìm sản phẩm bằng SKU, Tên sản phẩm.."
                required
              />
            </div>
          </form>
        </div>
        <div class>
          <select
            v-model="filter"
            @change="Filter"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          >
            <option :value="null">Tình trạng</option>
            <option :value="1">Còn hàng</option>
            <option :value="0">Hết hàng</option>
          </select>
        </div>
        <div class="mt-2">
          <button
            v-if="selected.length > 0"
            class="flex text-red-600 mx-3 text-sm"
            @click="DeleteCheckbox()"
          >
            <font-awesome-icon :icon="['fas', 'trash']" style="color: #d22839;" class="mx-2 mt-1" />Xóa
            <span>({{ selected.length }})</span> sản phẩm đã chọn
          </button>
        </div>
      </div>
      <div>
        <a
          :href="route('warehouse.exportbyCategory',this.category.slug)"
          target="_blank"
          class="px-2 py-2 text-sm rounded-lg border mx-1"
        >
          <font-awesome-icon :icon="['fas', 'download']" style="color: #0d0d0d;" class="mr-2" />Xuất file CSV Category
        </a>

        <!-- <Link :href="route('warehouse.export')" class="px-2 py-2 text-sm rounded-lg border mx-1">
          <font-awesome-icon :icon="['fas', 'download']" style="color: #0d0d0d;" />Xuất file CSV
        </Link>-->
        <button
          class="px-2 py-2 text-sm bg-gray-200 rounded-lg border mx-1"
          data-toggle="modal"
          data-target="#exampleModal"
        >
          <font-awesome-icon :icon="['far', 'file']" class="mr-2" />Nhập file CSV
        </button>
        <Link
          v-if="category"
          :href="route('warehouse.create', category.slug)"
          class="px-2 py-2 text-sm text-white bg-primary rounded-lg border mx-1"
        >
          <font-awesome-icon :icon="['fas', 'plus']" class="mr-2" />Thêm 1 sản phẩm
        </Link>
      </div>
    </div>

    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
          <div class>
            <table class="min-w-full text-left text-sm font-light">
              <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                  <th scope="col" class="px-6 py-4">
                    <input
                      id="default-checkbox"
                      type="checkbox"
                      v-model="selectAll"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />
                  </th>
                  <th scope="col" class="px-6 py-4 text-sm font-semibold">Hình ảnh</th>
                  <th @click="sortValue('SKU')" scope="col" class="px-6 py-4 text-sm font-semibold">
                    SKU
                    <i
                      class="fa fa-arrow-up"
                      :class="[(sortDirection === 'asc' && sort == 'SKU') ? 'fa fa-arrow-up' : 'fa fa-arrow-down']"
                    ></i>
                  </th>

                  <th
                    @click="sortValue('name')"
                    scope="col"
                    class="px-6 py-4 text-sm font-semibold"
                  >
                    Tên sản phẩm
                    <i
                      class="fa fa-arrow-up"
                      :class="[(sortDirection === 'asc' && sort == 'name') ? 'fa fa-arrow-up' : 'fa fa-arrow-down']"
                    ></i>
                  </th>
                  <th
                    @click="sortValue('cost')"
                    scope="col"
                    class="px-6 py-4 text-sm font-semibold"
                  >
                    Giá bán
                    <i
                      class="fa fa-arrow-up"
                      :class="[(sortDirection === 'asc' && sort == 'cost') ? 'fa fa-arrow-up' : 'fa fa-arrow-down']"
                    ></i>
                  </th>
                  <th
                    @click="sortValue('price')"
                    scope="col"
                    class="px-6 py-4 text-sm font-semibold"
                  >
                    Giá gốc
                    <i
                      class="fa fa-arrow-up"
                      :class="[(sortDirection === 'asc' && sort == 'cost') ? 'fa fa-arrow-up' : 'fa fa-arrow-down']"
                    ></i>
                  </th>
                  <th scope="col" class="px-6 py-4 text-sm font-semibold">Active</th>
                  <th scope="col" class="px-6 py-4 text-sm font-semibold">Đã bán</th>
                  <th scope="col" class="px-6 py-4 text-sm font-semibold">Tình trạng</th>
                  <th scope="col" class="px-6 py-4 text-sm font-semibold">Chỉnh sửa nhanh</th>
                  <th scope="col" class="px-6 py-4 text-sm font-semibold"></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(product, index) in products.data"
                  :key="index"
                  class="border-b dark:border-neutral-500"
                >
                  <td class="whitespace-nowrap px-6 py-4 font-medium">
                    <input
                      id="default-checkbox"
                      type="checkbox"
                      v-model="selected"
                      :value="product.id"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />
                  </td>
                  <td class="whitespace-nowrap px-6 py-4">
                    <img
                      v-if="product.first_image"
                      :src="product.first_image.image"
                      class="w-16 h-16"
                      alt
                    />
                  </td>
                  <td class="whitespace-nowrap px-2 py-2">
                    <input
                      ref="product_sku"
                      :value="product.SKU "
                      :id="product.id"
                      class="px-2 py-2 text-xs rounded-lg border"
                    />
                    <!-- <button class="px-2 py-2 text-xs rounded-lg border">{{ product.SKU }}</button> -->
                  </td>
                  <td class="whitespace-nowrap px-6 py-4">{{ product.name }}</td>
                  <td class="whitespace-nowrap px-2 py-2">
                    <input
                      ref="product_cost"
                      :value="product.cost"
                      :id="product.id"
                      class="px-2 py-2 text-xs rounded-lg border"
                    />
                  </td>
                  <td class="whitespace-nowrap px-2 py-2">
                    <input
                      :disabled="product.edit"
                      ref="product_price"
                      :value="product.price"
                      :id="product.id"
                      class="px-2 py-2 text-xs rounded-lg border"
                    />
                  </td>
                  <td class="whitespace-nowrap px-2 py-2">
                    <input
                      :checked="product.active == 1 ? true : false"
                      @change="onChangeActive(product, $event)"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      type="checkbox"
                    />
                  </td>
                  <td class="whitespace-nowrap px-2 py-2">
                    <select
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                      <option :value="1" :selected="product.auto_sold == 1 ? true : false">Auto</option>
                      <option :value="0" :selected="product.auto_sold == 0 ? true : false">Nhập</option>
                    </select>
                  </td>
                  <td class="whitespace-nowrap px-2 py-2">
                    <select
                      @change="onChangeStatus(product, $event)"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                      <option :value="1" :selected="product.status == 1 ? true : false">Còn hàng</option>
                      <option :value="0" :selected="product.status == 0 ? true : false">Hết hàng</option>
                    </select>
                  </td>
                  <td class="whitespace-nowrap px-2 py-2 text-center">
                    <button class="mx-2" @click="submit(product,index)">
                      <font-awesome-icon :icon="['fas', 'check']" />
                    </button>
                    <!-- <button class="mx-2">
                      <font-awesome-icon :icon="['fas', 'edit']" />
                    </button>-->
                  </td>
                  <td class="whitespace-nowrap px-6 py-4 relative">
                    <div class="dropdown">
                      <button
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        class="btn_crud"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <Link
                          class="dropdown-item text-sm py-2 cursor-pointer"
                          :href="route('images.index', [category.slug, product.id])"
                        >Images</Link>
                        <Link
                          class="dropdown-item text-sm py-2 cursor-pointer"
                          :href="route('warehouse.edit', [category.slug, product.id])"
                        >Chỉnh sửa</Link>
                        <Link
                          class="dropdown-item text-sm py-2 cursor-pointer"
                          :href="route('product.option.index',[product.id])"
                        >Options</Link>

                        <a
                          class="dropdown-item text-sm py-2 cursor-pointer text-red-600"
                          @click="Delete(product.id)"
                        >Xóa</a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <Pagination :links="products.links" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import LayoutProduct from "@/Pages/Product/Layout";
import Layout from "@/Components/Layout/Layout";
import Pagination from "@/Components/Pagination.vue";
import ImportModel from "@/Pages/Product/ImportModel";
export default {
  layout: [Layout, LayoutProduct],
  components: {
    Pagination,
    Link,
    Head,
    ImportModel
  },
  props: {
    products: Object,
    category: Object,
    sortBy: String,
    sort_Direction: String,
    status: String,
    errors: Object
  },
  data() {
    return {
      errorsJson: null,
      disabled: true,
      sort: this.sortBy,
      sortDirection: this.sort_Direction,
      selected: [],
      term: null,
      filter: this.status
    };
  },
  computed: {
    selectAll: {
      get: function() {
        return this.products.data
          ? this.selected.length == this.products.data
          : false;
      },
      set: function(value) {
        var selected = [];

        if (value) {
          this.products.data.forEach(function(device) {
            selected.push(device.id);
          });
        }

        this.selected = selected;
      }
    }
  },
  methods: {
    search() {
      this.$inertia.get(
        this.route("warehouse.show", this.category.slug),
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
          this.route("warehouse.show", this.category.slug),
          {},
          {
            preserveScroll: true
          }
        );
      } else {
        this.filter = event.target.value;
        let query = {
          status: event.target.value
        };
        this.$inertia.get(
          this.route("warehouse.show", this.category.slug),
          query,
          {
            preserveScroll: true
          }
        );
      }
    },
    sortValue: function(s) {
      if (s === this.sort) {
        this.sortDirection = this.sortDirection === "asc" ? "desc" : "asc";
      }
      this.sort = s;

      this.$inertia.get(
        this.route("warehouse.show", this.category.slug),
        {
          sortBy: this.sort,
          sortDirection: this.sortDirection,
          page: this.products.current_page
        },
        {
          preserveState: true
        }
      );
    },
    disableRow() {
      this.$refs.dropdown.$el;
    },
    submit(data, index) {
      let query = {
        product_cost: this.$refs.product_cost[index].value,
        product_sku: this.$refs.product_sku[index].value,
        product_price: this.$refs.product_price[index].value,
        id: data.id
      };
      // console.log(this.$refs.product_cost[index].value === "");

      axios
        .post("/admin/warehouse/saveCost", query)
        .then(response => {
          let index = this.products.data.findIndex(
            element => element.id == response.data.id
          );

          if (index !== -1) {
            this.products.data.splice(index, 1, response.data);
          }
          this.$swal("Success! ", {
            icon: "success"
          });
        })
        .catch(error => {
          let array = [];
          $.each(error.response.data.errors, function(key, value) {
            array.push(value[0]);
          });
          this.$swal("Error," + array, {
            icon: "error"
          });

          this.$refs.product_cost[index].value = data.cost;
          this.$refs.product_sku[index].value = data.SKU;
          this.$refs.product_price[index].value = data.price;
        });
    },
    onChangeStatus(product, event) {
      let query = {
        status: event.target.value,
        id: product.id
      };
      this.$inertia.post(route("warehouse.changeStatus"), query, {
        preserveState: true,
        preserveScroll: true
      });
    },
    onChangeActive(product, event) {
      let query = {
        active: event.target.checked,
        id: product.id
      };
      this.$inertia.post(route("warehouse.changeActive"), query, {
        preserveState: true,
        preserveScroll: true
      });
    },
    DeleteCheckbox() {
      let query = {
        ids: this.selected
      };
      this.$swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.$inertia.delete(
            this.route("warehouse.DeleteProducts", query, {
              preserveState: true,
              preserveScroll: true
            })
          );
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },

    changOutStanding(product, event) {
      let query = {
        outstanding: event.target.checked,
        id: product.id
      };
      this.$inertia.post(route("warehouse.changeOutStanding"), query, {
        preserveState: true,
        preserveScroll: true
      });
    },
    Delete(id) {
      this.$swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.$inertia.delete(route("warehouse.destroy", id));
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },
    exportProduct() {
      this.$inertia.get(
        route("warehouse.exportProduct"),
        {},
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    }
  }
};
</script>

<style></style>