<template>
  <section class="content">
    <Alert :dismissible="true"></Alert>

    <Head title="Thêm Sản phẩm trình sale"></Head>

    <div class="flex flex-col bg-white p-3 rounded-lg my-4">
      <div class="my-3 flex">
        <Link :href="route('sales.detail',sale)" class="px-3 mr-4 py-1 bg-white border rounded-lg">
          <font-awesome-icon :icon="['fas', 'chevron-left']" class="mt-2.5" />
        </Link>

        <div class="block">
          <p class="text-gray-500 text-xs">Trở về chi tiết chương trình sale :</p>
          <h2 class="font-semibold text-3xl flex mr-2">{{ sale.name }}</h2>
        </div>
      </div>
      <div class="flex justify-between mt-5 bg-white p-3 rounded-lg my-4">
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
        </div>
        <div class="mt-2">
          <button
            v-if="selected.length > 0"
            class="flex blue-red-600 mx-3 text-sm bg-primary px-3 py-2 text-white rounded-lg border"
            @click="AddCheckbox()"
          >
            <font-awesome-icon :icon="['fas', 'plus']" style="color: #ffffff;" class="mx-2 mt-1" />Thêm
            <span>({{ selected.length }})</span> sản phẩm đã chọn vào chương trình sale
          </button>
        </div>
      </div>
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

                  <td class="whitespace-nowrap px-2 py-2">
                    <button class="px-2 py-2 text-xs rounded-lg border">{{ product.SKU }}</button>
                  </td>
                  <td class="whitespace-nowrap px-6 py-4">{{ product.name }}</td>
                  <td class="whitespace-nowrap px-2 py-2">
                    <button class="px-2 py-2 text-xs rounded-lg border">{{ product.cost }}</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <Pagination :links="products.links" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import LayoutProduct from "@/Pages/Product/Layout";
import Layout from "@/Components/Layout/Layout";
import Pagination from "@/Components/Pagination.vue";
import Alert from "@/Components/Alert";
export default {
  layout: [Layout],
  components: {
    Pagination,
    Link,
    Head,
    Alert
  },
  props: {
    products: Object,
    sale: Object,
    sortBy: String,
    sort_Direction: String,
    status: String,
    errors: Object
  },
  data() {
    return {
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
        this.route("sales.addProducts", this.sale.id),
        { term: this.term },
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    },

    sortValue: function(s) {
      if (s === this.sort) {
        this.sortDirection = this.sortDirection === "asc" ? "desc" : "asc";
      }
      this.sort = s;

      this.$inertia.get(
        this.route("sales.addProducts", this.sale.id),
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

    AddCheckbox() {
      let query = {
        ids: this.selected
      };
      this.$swal({
        title: "Bạn có muốn?",
        text: "Thêm các sản phẩm trên vào trường trình sales!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willAdd => {
        if (willAdd) {
          this.$inertia.post(
            this.route("sales.saveItems", this.sale.id),
            query,
            {
              preserveState: true,
              preserveScroll: true
            }
          );
        } else {
          this.$swal("Action cancelled!");
        }
      });
    }
  }
};
</script>

<style></style>