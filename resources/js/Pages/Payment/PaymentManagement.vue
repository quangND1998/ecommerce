<template>
  <section class="min-[320px]:m-0 min-[320px]:p-0 content">
    <Head title="Quản lý thanh toán"></Head>
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-lg">
          <div class="modal-header">
            <h5 v-if="editMode" class="modal-title text-lg font-semibold" id="exampleModalLabel">
              Sửa phương thức thanh
              toán
            </h5>
            <h5
              v-else
              class="modal-title text-lg font-semibold"
              id="exampleModalLabel"
            >Thêm phương thức thanh toán</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="save">
              <div class="form-group" :class="errors.name ? 'has-error' : ''">
                <label for="recipient-name" class="col-form-label">Tên phương thức:</label>
                <input
                  type="text"
                  v-model="form.name"
                  class="form-control text-sm rounded-lg"
                  placeholder="Tên danh mục"
                  id="recipient-name"
                />
                <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
              </div>
              <div>
                <div class="flex">
                  <div class="border-dashed border-2 border-gray-300 px-4 py-3 rounded-lg">
                    <img v-if="thumb" :src="thumb" alt />
                  </div>
                  <div class="px-4">
                    <h6 class="text-base font-semibold">Hình ảnh</h6>
                    <p class="text-sm">Đăng ảnh/icon cho phương thức thanh toán</p>
                  </div>
                </div>
                <div class="text-center my-3" :class="errors.thumb ? 'border-red-500' : ''">
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
                          <span class="font-semibold">Click to upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                          SVG, PNG, JPG or GIF
                          (MAX. 40x40px)
                        </p>
                      </div>
                      <input
                        id="dropzone-file"
                        @change="onFileChange"
                        @input="form.thumb = $event.target.files[0]"
                        type="file"
                        class="hidden"
                        accept="image/*"
                      />
                    </label>
                  </div>
                </div>
                <div class="text-red-500" v-if="errors.thumb">{{ errors.thumb }}</div>
              </div>
              <hr />
              <div class="my-3">
                <label class="relative inline-flex items-center cursor-pointer">
                  <input
                    type="checkbox"
                    class="sr-only peer"
                    :checked="form.active"
                    v-model="form.active"
                  />
                  <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                  ></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ form.active == true ? 'Active' :
                    'InActive' }}
                  </span>
                </label>
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                  data-dismiss="modal"
                >Quay lại</button>
                <button
                  @click.prevent="save()"
                  type="submit"
                  class="inline-block px-6 py-2.5 bg-gray-800 text-white font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-primary-900 hover:shadow-lg bg-primary focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out"
                >
                  Lưu
                  lại
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="m-10 bg-white">
      <div class="p-5">
        <div class="flex justify-between">
          <div class="mt-5">
            <button
              class="bg-primary px-3 py-2 rounded-lg text-white"
              data-toggle="modal"
              data-target="#exampleModal"
              @click="add()"
            >
              <font-awesome-icon :icon="['fas', 'plus']" class="mr-2" />Thêm phương thức thanh toán
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="min-[320px]:m-0 min-[320px]:p-0 container mx-auto">
      <div class="min-[320px]:m-0 m-8">
        <div class="min-[320px]:p-0 p-4">
          <div class="min-[320px]:p-0 bg-white rounded-md border p-3">
            <h3 class="text-xl font-semibold">Quản lý thanh toán</h3>
            <div class="border rounded-md p-2 my-3">
              <div
                class="min-[320px]:block sm:block md:block xl:grid 2xl:grid grid grid-cols-3 gap-4"
              >
                <div>
                  <ul>
                    <div v-for="(payment, index) in payments" :key="index" class="py-3">
                      <div
                        class="flex"
                        :class="{ 'text-blue-600': $page.url === `/admin/payments/infor/${payment.id}`}"
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
                            <font-awesome-icon :icon="['fasl', 'minus']" class="mr-2" />Chưa kích hoạt
                            kích hoạt
                          </p>
                        </Link>
                        <div class="relative">
                          <a
                            class="text-sm py-2 cursor-pointer"
                            data-toggle="modal"
                            data-target="#exampleModal"
                            @click="edit(payment)"
                          >
                            <font-awesome-icon :icon="['fas', 'pen-to-square']" />
                          </a>
                        </div>
                      </div>
                    </div>
                  </ul>
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
    errors: Object
  },
  data() {
    return {
      thumb: null,
      showToggle: false,
      editMode: false,
      form: this.$inertia.form({
        id: null,
        name: null,
        thumb: null,
        active: false
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
        this.thumb = URL.createObjectURL(file);
      } else {
        this.thumb = null;
      }
    },
    save() {
      if (this.editMode) {
        this.form.post(route("payment.update", this.form.id), {
          preserveState: true,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
              this.editMode = true;
            }
          },
          onSuccess: page => {
            $("#exampleModal").modal("hide");

            this.form.reset();
          }
        });
      } else {
        this.form.post(route("payment.store"), {
          preserveState: true,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
              this.editMode = false;
            }
          },
          onSuccess: page => {
            $("#exampleModal").modal("hide");

            this.form.reset();
          }
        });
      }
    },
    edit(data) {
      this.editMode = true;
      this.form.id = data.id;
      this.form.name = data.name;
      this.form.active = data.active;
      this.image = data.image;
      this.form.parent_id = data.parent_id;
      if (this.form.parent_id) {
        this.showToggle = true;
      }
    },
    Delete(id) {
      if (!confirm("Are you sure want to remove?")) return;
      this.$inertia.delete(route("categories.destroy", id));
    }
  }
};
</script>
  
<style scoped></style>