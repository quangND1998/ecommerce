<template>
  <section class="content">
    <Alert :dismissible="true"></Alert>

    <Head title="Thêm chương trình sale"></Head>
    <!-- Modal -->
    <ImportModal :errors="errors" :sale="sale" />
    <div>
      <div class="m-8">
        <div class="p-4">
          <div class="my-3 flex">
            <Link :href="route('sales.index')" class="px-3 mr-4 py-3 bg-white border rounded-lg">
              <font-awesome-icon :icon="['fas', 'chevron-left']" />
            </Link>

            <div class="block">
              <p class="text-gray-500 text-xs">Trở về chương trình sale</p>
              <h2 class="font-semibold text-3xl flex mr-2">Cập nhật chương trình sale</h2>
            </div>
          </div>
          <div class="bg-white p-3 rounded-lg">
            <h3 class="text-lg font-semibold">Thông tin chương trình sale</h3>
            <div class="mr-2" :class="errors.name ? ' border-red-600' : ''">
              <label
                for="countries"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Tên
                chương trình
                khuyến mại
              </label>
              <input
                v-model="form.name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              />
              <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
            </div>
            <div class="flex my-4">
              <div class="mr-2">
                <label
                  for="countries"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                  Loại chương trình
                  khuyến mại
                </label>
                <select
                  v-model="form.type"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                  <option :value="null">Chọn chương trình triết khấu</option>
                  <option value="all">Chiết khấu toàn chương trình</option>
                  <option value="product">Chiết khấu theo sản phẩm</option>
                </select>
                <div class="text-red-500" v-if="errors.type">{{ errors.type }}</div>
              </div>
              <div class="mx-2" v-if="form.type">
                <label
                  for="countries"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                  Đơn vị chiết
                  khấu
                </label>
                <select
                  v-model="form.unit"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                  <option :value="null">Chọn đơn vị triết khấu</option>
                  <option value="%">%</option>
                  <option value="tiền">Tiền</option>
                </select>
                <div class="text-red-500" v-if="errors.unit">{{ errors.unit }}</div>
              </div>
              <div class="mx-2" v-if="form.type == 'all'">
                <label
                  for="countries"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                  Chiết
                  khấu
                </label>
                <input
                  v-if="form.unit == '%'"
                  v-model="form.discount"
                  type="number"
                  min="0"
                  max="100"
                  class="border border-gray-300 rounded-lg"
                  placeholder="10 %"
                />
                <input
                  v-else
                  type="number"
                  min="0"
                  v-model="form.discount"
                  class="border border-gray-300 rounded-lg"
                  placeholder="100000 đ"
                />
                <div class="text-red-500" v-if="errors.discount">{{ errors.discount }}</div>
              </div>
            </div>
            <div>
              <label
                for="countries"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Thời
                gian sale
              </label>
              <div date-rangepicker class="flex items-center">
                <date-picker
                  v-model="form.start_date"
                  type="datetime"
                  value-type="YYYY-MM-DD HH:mm:ss"
                  placeholder="Select datetime"
                ></date-picker>
                <div class="text-red-500" v-if="errors.start_date">{{ errors.start_date }}</div>
                <span class="mx-4 text-gray-500">đến</span>
                <date-picker
                  v-model="form.end_date"
                  type="datetime"
                  value-type="YYYY-MM-DD HH:mm:ss"
                  placeholder="Select datetime"
                ></date-picker>
                <div class="text-red-500" v-if="errors.end_date">{{ errors.end_date }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white p-3 rounded-lg my-4">
      <h3 class="text-lg font-semibold">Sản phẩm sale</h3>
      <div class="flex justify-between">
        <div class="flex">
          <p class="text-gray-500 text-base mr-3">Tìm kiếm sản phẩm</p>
          <div class="form_search" style="width:300px">
            <form>
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
                  v-model="search"
                  name="search"
                  data-toggle="hideseek"
                  laceholder="Search Menus"
                  data-list=".menu-category"
                  class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Tìm sản phẩm bằng SKU, Tên sản phẩm.."
                  required
                />
              </div>
            </form>
          </div>
          <div class="mt-2">
            <button
              v-if="selected.length > 0"
              class="flex text-red-600 mx-3 text-sm"
              @click="DeleteCheckbox()"
            >
              <font-awesome-icon
                :icon="['fas', 'trash']"
                style="color: #d22839;"
                class="mx-2 mt-1"
              />Xóa
              <span>({{ selected.length }})</span> sản phẩm đã chọn
            </button>
          </div>
        </div>
        <div class>
          <button class="px-2 py-2 text-sm rounded-lg border mx-1">
            <font-awesome-icon :icon="['fas', 'download']" style="color: #0d0d0d;" />Tải file mẫu
          </button>
          <button
            class="px-2 py-2 text-sm bg-gray-200 rounded-lg border mx-1"
            data-toggle="modal"
            data-target="#exampleModal"
          >
            <font-awesome-icon :icon="['far', 'file']" />Nhập file CSV
          </button>
          <Link
            :href="route('sales.addProducts', sale)"
            class="px-2 py-2 text-sm text-white bg-blue-500 rounded-lg border mx-1"
          >
            <font-awesome-icon :icon="['fas', 'plus']" />Thêm sản phẩm
          </Link>
        </div>
      </div>
      <div class="relative overflow-x-auto border border-gray-300 sm:rounded-lg my-4">
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
                <div class="flex items-center">Mã SKU</div>
              </th>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">Tên sản phẩm</div>
              </th>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">Giá trước chiết khấu</div>
              </th>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">Chiết khấu</div>
              </th>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">Giá sau chiết khấu</div>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(item, index) in searchItems"
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
                  :value="item.id"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
              </th>
              <td class="px-6 py-4">{{ item.product.SKU }}</td>
              <td class="px-6 py-4">{{ item.product.name }}</td>
              <td class="px-6 py-4">{{ item.product.cost }}</td>
              <td class="px-6 py-4" v-if="sale.type == 'product'">
                <input
                  v-if="sale.unit == '%'"
                  type="number"
                  @blur="updatePercent(item)"
                  v-on:keyup.enter="updatePercent(item)"
                  :max="100"
                  :min="0"
                  :value="`${item.discount}`"
                  :ref="`discount${item.id}`"
                  class="w-3/4 rounded-lg border border-gray-300"
                  placeholder="0%"
                />
                <input
                  v-else
                  type="number"
                  @blur="updateSale(item)"
                  v-on:keyup.enter="updateSale(item)"
                  :min="0"
                  :value="`${item.discount}`"
                  :ref="`discount${item.id}`"
                  class="w-3/4 rounded-lg border border-gray-300"
                  placeholder="0%"
                />

                <span v-if="sale.unit == '%'">%</span>
                <span v-else>đ</span>
              </td>
              <td
                class="px-6 py-4"
                v-else-if="sale.type !== 'product' && sale.unit !=='%'"
              >-{{ item.discount }}đ</td>
              <td
                class="px-6 py-4"
                v-else-if="sale.type !== 'product' && sale.unit =='%'"
              >{{ item.discount }} %</td>
              <td class="px-6 py-4">{{ formatPrice(item.price_sale) }} đ</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="text-end">
        <button
          class="px-3 py-2 text-white bg-primary rounded-lg hover:bg-blue-800 text-base"
          @click="save()"
        >
          Lưu chương
          trình
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import ImportModal from "@/Pages/Sales/ImportModal.vue";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    Head,
    DatePicker,
    ImportModal
  },
  props: {
    sale: Object,
    errors: Object
  },
  data() {
    return {
      selected: [],
      search: null,
      form: this.$inertia.form({
        id: null,
        name: this.sale.name,
        type: this.sale.type,
        unit: this.sale.unit,
        start_date: this.sale.start_date,
        end_date: this.sale.end_date,
        discount: this.sale.discount
      })
    };
  },
  computed: {
    selectAll: {
      get: function() {
        return this.sale.sale_items
          ? this.selected.length == this.sale.sale_items
          : false;
      },
      set: function(value) {
        var selected = [];

        if (value) {
          this.sale.sale_items.forEach(function(sale) {
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
            item.product.SKU.toLowerCase().includes(
              this.search.toLowerCase()
            ) ||
            item.product.name.toLowerCase().includes(this.search.toLowerCase())
          );
        });
      } else {
        return this.sale.sale_items;
      }
    }
  },
  mounted: function() {},
  methods: {
    save() {
      if (this.form.unit == "%" && this.form.discount >= 100) {
        this.$swal(
          "Error,Với đơn vị chiết khẩu là % , discount không được lớn hơn 100 .",
          {
            icon: "error"
          }
        );
      } else {
        this.form.put(route("sales.update", this.sale.id), {
          preserveState: false,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
            }
          },
          onSuccess: page => {
            this.form.reset();
          }
        });
      }
    },
    DeleteCheckbox() {
      let query = {
        ids: this.selected
      };
      this.$swal({
        title: "Bạn có muốn?",
        text: "Xóa các sản phẩm sale trong chương trình",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.$inertia.delete(
            this.route("sales.deleteItems", query, {
              preserveState: true,
              preserveScroll: true
            })
          );
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },
    updatePercent(item) {
      let query = {
        discount: this.$refs[`discount${item.id}`][0].value,
        item_sale_id: item.id,
        unit: this.sale.unit
        // shipping_fee: this.$refs[`shipping_fee${order.id}`][0].value
      };
      // console.log(query);
      if (
        parseInt(this.$refs[`discount${item.id}`][0].value) < 0 ||
        this.$refs[`discount${item.id}`][0].value >= 100
      ) {
        this.$swal("Error, Discount không được nhỏ hơn 0 hoặc lớn hơn 100 .", {
          icon: "error"
        });
      } else {
        axios
          .post("/admin/sales/updateDiscount", query)
          .then(response => {
            let index = this.sale.sale_items.findIndex(
              element => element.id == response.data.id
            );

            if (index !== -1) {
              this.sale.sale_items.splice(index, 1, response.data);
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
          });
      }
    },
    updateSale(item) {
      let query = {
        discount: this.$refs[`discount${item.id}`][0].value,
        item_sale_id: item.id,
        unit: this.sale.unit
        // shipping_fee: this.$refs[`shipping_fee${order.id}`][0].value
      };
      // console.log(query);
      if (
        parseInt(this.$refs[`discount${item.id}`][0].value) < 0 ||
        query.unit == "product"
      ) {
        this.$swal("Error, Discount không được nhỏ hơn 0  .", {
          icon: "error"
        });
      } else {
        axios
          .post("/admin/sales/updateDiscount", query)
          .then(response => {
            let index = this.sale.sale_items.findIndex(
              element => element.id == response.data.id
            );

            if (index !== -1) {
              this.sale.sale_items.splice(index, 1, response.data);
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
          });
      }
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
</style>