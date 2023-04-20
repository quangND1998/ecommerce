<template>
  <section class="content">
    <Alert :dismissible="true"></Alert>
    <Head title="Thêm chương trình sale"></Head>
    <!-- Modal -->
    <div>
      <div class="m-8">
        <div class="p-4">
          <div class="my-3 flex">
            <Link :href="route('sales.index')" class="px-3 mr-4 py-3 bg-white border rounded-lg">
              <font-awesome-icon :icon="['fas', 'chevron-left']" />
            </Link>
            <div class="block">
              <p class="text-gray-500 text-xs">Trở về chương trình sale</p>
              <h2 class="font-semibold text-3xl flex mr-2">Tạo chương trình sale</h2>
            </div>
          </div>
          <div class="bg-white p-3 rounded-lg">
            <h3 class="text-lg font-semibold">Thông tin chương trình sale</h3>
            <div class="mr-2" :class="errors.name ? ' border-red-600':''">
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
                >Chiết khấu</label>
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
                  placeholder="Select datetime"
                  value-type="YYYY-MM-DD HH:mm:ss"
                ></date-picker>
                <div class="text-red-500" v-if="errors.start_date">{{ errors.start_date }}</div>
                <span class="mx-4 text-gray-500">đến</span>
                <date-picker v-model="form.end_date" type="datetime" placeholder="Select datetime"  value-type="YYYY-MM-DD HH:mm:ss"></date-picker>
                <div class="text-red-500" v-if="errors.end_date">{{ errors.end_date }}</div>
              </div>
            </div>

            <div class="text-end">
              <button
                class="px-3 py-2 text-white bg-primary rounded-lg hover:bg-blue-800 text-base"
                type="submit"
                @click="save()"
              >Lưu chương trình</button>
            </div>
          </div>
        </div>
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
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    SearchCategory,
    Head,
    DatePicker
  },
  props: {
    categories: Array,
    errors: Object
  },
  data() {
    return {
      form: this.$inertia.form({
        id: null,
        name: null,
        type: null,
        unit: null,
        start_date: null,
        end_date: null,
        discount: null
      })
    };
  },
  mounted: function() {},
  methods: {
    save() {
      this.form.post(route("sales.store"), {
        preserveState: true,
        onError: errors => {
          if (Object.keys(errors).length > 0) {
          }
        },
        onSuccess: page => {
          this.form.reset();
        }
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
</style>