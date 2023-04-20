<template>
  <section class="min-[320px]:p-0 min-[320px]:m-0 content">
    <Head title="Cài đặt thông itn chung"></Head>
    <alert :dismissible="true"></alert>
    <!-- Modal -->
    <div>
      <form @submit.prevent="save()" class="p-0 m-0 lg:container mx-auto">
        <div class="min-[320px]:m-2 sm:m-4 md:m-8 lg:m-8">
          <div class="min-[320px]:p-0 sm:p-2 md:p-2 lg:p-4">
            <div class="my-3 flex">
              <div class="block">
                <h2
                  class="min-[320px]:text-xl min-[320px]:mt-4 sm:text-xl md:text-2xl font-semibold lg:text-3xl flex mr-2"
                >Cài đặt thông tin chung</h2>
                <p
                  class="text-gray-500 text-xs"
                >Chỉnh sửa thông tin về công ty, liên kết, số điện thoại</p>
              </div>
            </div>
            <div class="bg-white border rounded-md p-3">
              <h3 class="text-lg font-semibold">Thông tin công ty</h3>
              <div class="my-2">
                <label
                  for="company_name"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Tên công ty</label>
                <input
                  type="text"
                  v-model="form.company_name"
                  id="company_name"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Công ty TNHH Lê Bùi"
                />
                <div class="text-red-500" v-if="errors.company_name">{{ errors.company_name }}</div>
              </div>
              <div class="my-2">
                <label
                  for="email"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Email</label>
                <input
                  type="mail"
                  id="email"
                  v-model="form.email"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="congtytnhhlebui@gmail.com"
                />
                <div class="text-red-500" v-if="errors.email">{{ errors.email }}</div>
              </div>

              <div class="my-2">
                <label
                  for="address"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Địa chỉ</label>
                <input
                  type="text"
                  id="address"
                  v-model="form.address"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Xưởng Carton Lê Bùi - Phù Dực, Phù Đổng, Gia Lam, Hà Nội"
                />
                <div class="text-red-500" v-if="errors.address">{{ errors.address }}</div>
              </div>
              <div class="my-2">
                <label
                  for="tax_code"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Mã số thuế</label>
                <input
                  type="text"
                  id="tax_code"
                  v-model="form.tax_code"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
              </div>
            </div>
            <div class="bg-white border rounded-md my-5 p-3">
              <h3 class="text-lg font-semibold">Liên hệ</h3>
              <div class="my-2">
                <label
                  for="hotline"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Số hotline</label>
                <input
                  type="text"
                  id="hotline"
                  v-model="form.hotline"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
              </div>
              <div class="my-2">
                <label
                  for="zalo_phone"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Zalo</label>
                <input
                  type="mail"
                  id="zalo_phone"
                  v-model="form.zalo_phone"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
              </div>
              <div class="my-2">
                <label
                  for="facebook"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Facebook</label>
                <input
                  type="text"
                  id="facebook"
                  v-model="form.facebook"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
              </div>
              <div class="my-2">
                <label
                  for="map"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Nhúng bản đồ</label>
                <textarea
                  id="map"
                  rows="4"
                  v-model="form.map"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Nhúng iframe bản đồ"
                ></textarea>
              </div>
            </div>
            <div class="text-end">
              <button
                type="submit"
                class="px-3 py-2 bg-primary text-white rounded-md"
                @click.prevent="save"
              >Lưu thông tin</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</template>
  
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
    setting: Object,
    errors: Object
  },
  data() {
    return {
      form: this.$inertia.form({
        company_name: this.setting !== null ? this.setting.company_name : null,
        email: this.setting !== null ? this.setting.email : null,
        tax_code: this.setting !== null ? this.setting.tax_code : null,
        address: this.setting !== null ? this.setting.address : null,
        hotline: this.setting !== null ? this.setting.hotline : null,
        zalo_phone: this.setting !== null ? this.setting.zalo_phone : null,
        facebook: this.setting !== null ? this.setting.facebook : null,
        map: this.setting !== null ? this.setting.map : null
      })
    };
  },
  // created() {
  //   (this.form.company_name =
  //     this.setting !== null ? this.setting.company_name : null),
  //     (this.form.email = this.setting !== null ? this.setting.email : null),
  //     (this.form.tax_code =
  //       this.setting !== null ? this.setting.tax_code : null),
  //     (this.form.address = this.setting !== null ? this.setting.address : null),
  //     (this.form.hotline = this.setting !== null ? this.setting.hotline : null),
  //     (this.form.zalo_phone =
  //       this.setting !== null ? this.setting.zalo_phone : null),
  //     (this.form.facebook =
  //       this.setting !== null ? this.setting.facebook : null),
  //     (this.form.map = this.setting !== null ? this.setting.map : null);
  // },

  methods: {
    save() {
      this.form.post(route("setting.store"), {
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