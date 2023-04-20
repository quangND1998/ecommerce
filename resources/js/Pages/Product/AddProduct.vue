<template>
  <section class="content">
    <Head title="Thêm sản phẩm"></Head>
    <!-- Modal -->
    <div>
      <div class="m-8">
        <form>
          <div class="p-4">
            <Header name="Thêm sản phẩm mới" :category="category"></Header>

            <div>
              <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                  <div>
                    <h3 class="font-semibold text-lg">Thông tin sản phẩm</h3>
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                      <div class="mb-6 form-group" :class="errors.name ? 'has-error' : ''">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Tên
                          sản phẩm
                        </label>
                        <input
                          v-model="form.name"
                          :class="errors.name ? 'has-error' : ''"
                          class="block mb-2 font-medium form-control text-sm rounded-lg"
                        />
                        <div v-if="errors.name" class="text-rose-600">{{ errors.name }}</div>
                      </div>
                      <div class="mb-6 form-group" :class="errors.description ? 'has-error' : ''">
                        <label
                          for
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                          Mô
                          tả
                          sản phẩm
                        </label>

                        <ckeditor v-model="form.description" :config="editorConfig"></ckeditor>
                        <div v-if="errors.name" class="text-rose-600">{{ errors.description }}</div>
                      </div>
                    </div>
                  </div>

                  <div>
                    <h3 class="font-semibold text-lg">Hình ảnh</h3>
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                      <div data-v-24fde35b class="text-center my-3">
                        <div data-v-24fde35b class="flex items-center justify-center w-full">
                          <label
                            data-v-24fde35b
                            for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                          >
                            <div
                              data-v-24fde35b
                              class="flex flex-col items-center justify-center pt-2 pb-3"
                            >
                              <svg
                                data-v-24fde35b
                                aria-hidden="true"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 mb-3 text-gray-400"
                              >
                                <path
                                  data-v-24fde35b
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                />
                              </svg>
                              <p
                                data-v-24fde35b
                                class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                              >
                                <span data-v-24fde35b class="font-semibold">
                                  Click to
                                  upload
                                </span> or drag and drop
                              </p>
                              <p data-v-24fde35b class="text-xs text-gray-500 dark:text-gray-400">
                                SVG, PNG,
                                JPG
                                or GIF (MAX. 40x40px)
                              </p>
                            </div>
                            <input
                              @input="form.images = $event.target.files"
                              @change="onFileChange"
                              data-v-24fde35b
                              id="dropzone-file"
                              type="file"
                              accept="image/*"
                              class="hidden"
                              multiple
                            />
                            <div v-if="errors.images" class="text-rose-600">{{ errors.images }}</div>
                          </label>
                        </div>
                      </div>
                      <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                        <div class="-m-1 flex flex-wrap md:-m-2">
                          <div
                            v-for="(img, index) in images"
                            :key="index"
                            class="flex w-1/3 flex-wrap"
                          >
                            <div class="w-full p-1 md:p-2">
                              <font-awesome-icon :icon="['fas', 'delete-left']" />
                              <img
                                alt="gallery"
                                class="block h-50 w-50 rounded-lg object-cover object-center"
                                :src="img.image"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
             
                </div>
                <div>
                  <h3 class="font-semibold text-lg">Định giá</h3>
                  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-6 form-group" :class="errors.cost ? 'has-error' : ''">
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Giá
                        bán
                      </label>
                      <input
                        v-model="form.cost"
                        type="number"
                        class="block mb-2 font-medium form-control text-sm rounded-lg"
                      />
                      <div v-if="errors.cost" class="text-rose-600">{{ errors.cost }}</div>
                    </div>
                    <div class="mb-6 form-group" :class="errors.price ? 'has-error' : ''">
                      <label
                        for
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Giá gốc</label>
                      <input
                        v-model="form.price"
                        type="number"
                        class="block mb-2 font-medium form-control text-sm rounded-lg"
                      />
                      <div v-if="errors.price" class="text-rose-600">{{ errors.price }}</div>
                    </div>
                  </div>
                  <div>
                    <h3 class="font-semibold text-lg">Số lượng</h3>
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                      <div class="mb-6 form-group" :class="errors.status ? 'has-error' : ''">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Tình
                          trạng
                        </label>
                        <select
                          v-model="form.status"
                          id="countries"
                          class="block mb-2 font-medium form-control text-sm rounded-lg"
                        >
                          <option :value="true">Còn hàng</option>
                          <option :value="false">Hết hàng</option>
                          <div v-if="errors.status" class="text-rose-600">{{ errors.status }}</div>
                        </select>
                      </div>
                      <div class="mb-6 form-group" :class="errors.auto_sold ? 'has-error' : ''">
                        <label
                          for
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                          Số
                          lượng đã bán
                        </label>
                        <select
                          v-model="form.auto_sold"
                          id="countries"
                          class="block mb-2 font-medium form-control text-sm rounded-lg"
                        >
                          <option :value="true">Auto</option>
                          <option :value="false">Nhập</option>
                        </select>
                        <div v-if="errors.auto_sold" class="text-rose-600">{{ errors.auto_sold }}</div>
                      </div>
                      <div
                        class="mb-6 form-group"
                        :class="errors.quantity_sold ? 'has-error' : ''"
                        v-if="form.auto_sold == false"
                      >
                        <label
                          for
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                          Nhập
                          Số
                          lượng đã bán
                        </label>
                        <input
                          v-model="form.quantity_sold"
                          type="number"
                          required
                          min="0"
                          class="block mb-2 font-medium form-control text-sm rounded-lg"
                        />
                        <div v-if="errors.quantity_sold" class="text-rose-600">
                          {{
                          errors.quantity_sold }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <h3 class="font-semibold text-lg">Danh mục sản phẩm</h3>
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                      <div class="mb-6 form-group" :class="errors.category_id ? 'has-error' : ''">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Giá
                          bán
                        </label>
                        <select
                          v-model="form.category_id"
                          id="countries"
                          class="block mb-2 font-medium form-control text-sm rounded-lg"
                        >
                          <option :value="null">Danh mục sản phẩm</option>
                          <option
                            v-for="(category, index) in categories"
                            :key="index"
                            :value="category.id"
                          >{{ category.name }}</option>
                        </select>
                        <div v-if="errors.category_id" class="text-rose-600">
                          {{ errors.category_id
                          }}
                        </div>
                      </div>
                    </div>
                  </div>
               
                </div>
              </div>
              <div class="my-3 justify-end text-end">
                <button class="px-3 py-2 rounded-lg bg-primary" @click.prevent="save">Lưu lại</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>
  
<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
import Header from "@/Pages/Product/Header";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    SearchCategory,
    Head,
    Header
  },
  props: {
    categories: Array,
    errors: Object,
    category: Object
  },
  data() {
    return {
      editorData: "<p>Content of the editor.</p>",
      editorConfig: {
        // The configuration of the editor.
      },
      images: [],
      form: this.$inertia.form({
        name: null,
        description: null,
        SKU: null,
        status: true,
        auto_sold: true,
        quantity_sold: null,
        category_id: null,
        price: null,
        cost: null,
        images: null,
        arrayValues:[],
        
      })
    };
  },
  mounted: function() {
    $(".list_icon_crud").hide();
    $(".item_crud").click(function(e) {
      $(".list_icon_crud").hide();
      e.preventDefault();
      //   $(this).next(".list_icon_crud").css("display","inline-grid");
      $(this)
        .next(".list_icon_crud")
        .slideToggle();
    });
  },
  methods: {
    save() {
    
        this.form.post(route("warehouse.store", this.form.id), {
          preserveState: true,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
            }
          },
          onSuccess: page => {
            this.form.reset();
          }
        });
    
    },
    onFileChange(e) {
      const files = e.target.files;
      this.images = [];
      if (files.length > 0) {
        for (var i = 0; i < files.length; i++) {
          console.log(files[i]);
          this.images.push({
            name: files[i].name,
            image: URL.createObjectURL(files[i])
          });
        }
      } else {
        this.images = [];
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