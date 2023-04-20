<template>
  <section class="min-[320px]:m-0 min-[320px]:p-0 content">
    <Head title="Quản lý thanh toán"></Head>

    <div class="min-[320px]:m-0 min-[320px]:p-0 container mx-auto">
      <div class="min-[320px]:m-0 m-8">
        <div class="min-[320px]:p-0 p-4">
          <div class="min-[320px]:p-0 bg-white rounded-md border p-3">
            <div class="my-3 flex">
              <Link
                :href="route('payment.index')"
                class="px-3 mr-4 py-3 bg-white border rounded-lg"
              >
                <font-awesome-icon :icon="['fas', 'chevron-left']" />
              </Link>

              <div class="block">
                <p class="text-gray-500 text-xs">Trở về Quản lý thanh toán :</p>
                <h2 class="font-semibold text-3xl flex mr-2">Quản lý thanh toán</h2>
              </div>
            </div>
            <h3 class="text-xl font-semibold">Quản lý thanh toán</h3>
            <div class="border rounded-md p-2 my-3">
              <div
                class="min-[320px]:block sm:block md:block xl:grid 2xl:grid grid grid-cols-3 gap-4"
              >
                <div>
                  <ul>
                    <div
                      v-for="(payment, index) in payments"
                      :key="index"
                      class="py-3"
                      :href="route('payment.show', payment)"
                    >
                      <div
                        class="flex"
                        :class="{ 'bg-gray-200': $page.url === `/admin/payments/infor/${payment.id}` }"
                      >
                        <img :src="payment.thumb" alt />
                        <Link class="ml-2" :href="route('payment.show', payment)">
                          <p class="text-base text-gray-600">{{ payment.name }}</p>
                          <p class="text-sm text-gray-400" v-if="payment.active == 1">
                            <font-awesome-icon
                              :icon="['fas', 'circle-check']"
                              style="color: #10da5e;"
                              class="mr-2"
                            />Đang
                            kích hoạt
                          </p>
                          <p class="text-sm text-gray-400" v-else>
                            <font-awesome-icon :icon="['fasl', 'minus']" class="mr-2" />Chưa kích
                            hoạt
                            kích hoạt
                          </p>
                        </Link>
                      </div>
                    </div>
                  </ul>
                </div>
                <div class="min-[320px]:p-0 md:p-3 xl:p-3 2xl:p-3 col-span-2 bg-gray-200 p-3">
                  <h4 class="text-lg font-semibold">
                    Thông tin tài khoản / địa chỉ ví nhận tiền : {{
                    payment.name }}
                  </h4>
                  <div class="bg-white rounded-md p-3 my-4">
                    <form>
                      <div class="mb-6 form-group" :class="errors.description ? 'has-error' : ''">
                        <label
                          for
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                          Hướng dẫn/ Mô
                          tả
                        </label>

                        <ckeditor v-model="form.description" :config="editorConfig"></ckeditor>
                        <div
                          v-if="errors.description"
                          class="text-rose-600"
                        >{{ errors.description }}</div>
                      </div>
                    </form>
                    <hr class="pb-4" />

                    <div>
                      <div class="block">
                        <div class="border-dashed border-2 border-gray-300 px-16 py-8 rounded-lg">
                          <img v-if="qr_code" :src="qr_code" class="mx-auto" alt />
                          <img
                            v-else-if="payment_info && payment_info.qr_code"
                            :src="payment_info.qr_code"
                            class="mx-auto"
                            alt
                          />
                        </div>
                        <div class="px-4 text-center">
                          <h6 class="text-base font-semibold">Hình ảnh</h6>
                          <p class="text-sm">Đăng QR code cho phương thức thanh toán</p>
                        </div>
                      </div>
                      <div class="text-red-500" v-if="errors.qr_code">{{ errors.qr_code }}</div>
                      <div class="text-center my-3" :class="errors.qr_code ? 'border-red-500' : ''">
                        <div class="flex items-center justify-center w-full">
                          <label
                            for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                          >
                            <div class="flex flex-col items-center justify-center pt-2 pb-3">
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
                                />
                              </svg>
                              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Click to upload</span> or drag
                                and drop
                              </p>
                              <p class="text-xs text-gray-500 dark:text-gray-400">
                                SVG, PNG, JPG or GIF
                                (MAX. 40x40px)
                              </p>
                            </div>
                            <input
                              id="dropzone-file"
                              @change="onFileChange"
                              @input="form.qr_code = $event.target.files[0]"
                              type="file"
                              class="hidden"
                              accept="image/*"
                            />
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="flex justify-between">
                      <label class="relative inline-flex items-center cursor-pointer">
                        <input
                          type="checkbox"
                          :checked="form.active"
                          v-model="form.active"
                          class="sr-only peer"
                        />
                        <div
                          class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                        ></div>
                        <span
                          class="ml-3 text-xs lg:text-sm font-medium text-gray-900 dark:text-gray-300"
                        >
                          Nhận tiền qua
                          địa chỉ/ví này
                        </span>
                      </label>
                      <button
                        v-if="payment_info"
                        @click.prevent="update"
                        class="px-1 py-0 text-white bg-primary rounded-md lg:px-3 lg:py-2"
                      >Lưu</button>
                      <button
                        v-else
                        @click.prevent="save"
                        class="px-1 py-0 text-white bg-primary rounded-md lg:px-3 lg:py-2"
                      >Lưu</button>
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
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    SearchCategory,
    Head
  },
  props: {
    payments: Array,
    payment: Object,
    payment_info: null,
    errors: Object
  },
  data() {
    return {
      editorData: "<p>Content of the editor.</p>",
      editorConfig: {
        // The configuration of the editor.
      },
      qr_code: null,
      showToggle: false,
      editMode: false,
      form: this.$inertia.form({
        qr_code: null,
        active: this.payment_info ? this.payment_info.active : true,
        description: this.payment_info ? this.payment_info.description : null
      })
    };
  },
  mounted: function() {},
  methods: {
    add() {
      this.editMode = false;
      this.form.reset();
    },
    onChangeDefault(event) {
      if (event.target.checked) {
        this.showToggle = true;
      } else {
        this.showToggle = false;
      }
    },
    onFileChange(e) {
      const file = e.target.files[0];
      if (file) {
        this.qr_code = URL.createObjectURL(file);
      } else {
        this.qr_code = null;
      }
    },
    update() {
      this.form.post(route("payment.infor.update", this.payment_info.id), {
        preserveState: false,
        onError: errors => {
          if (Object.keys(errors).length > 0) {
            this.editMode = true;
          }
        },
        onSuccess: page => {
          this.form.reset();
        }
      });
    },
    save() {
      this.form.post(route("payment.infor.store", this.payment.id), {
        preserveState: false,
        onError: errors => {
          if (Object.keys(errors).length > 0) {
            this.editMode = false;
          }
        },
        onSuccess: page => {
          this.form.reset();
        }
      });
    }
  }

  //   edit(data) {
  //     this.editMode = true;
  //     this.form.id = data.id;
  //     this.form.description = data.description;
  //     this.form.active = data.active;
  //     this.qr_code = data.qr_code;
  //     this.form.parent_id = data.parent_id;
  //     if (this.form.parent_id) {
  //       this.showToggle = true;
  //     }
  //   },
};
</script>
  
<style scoped></style>