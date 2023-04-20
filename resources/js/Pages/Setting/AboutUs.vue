<template>
  <section class="content">
    <Head title="Về chúng tôi"></Head>
    <alert :dismissible="true"></alert>
    <div>
      <div class="min-[320px]:p-0 min-[320px]:m-0 lg:container mx-auto">
        <div class="min-[320px]:m-0 sm:m-2 md:m-4 lg:m-8">
          <div class="min-[320px]:p-2 sm:m-0 md:m-2 lg:p-4">
            <div class="my-3 flex">
              <div class="block">
                <h2
                  class="min-[320px]:text-xl sm:text-2xl md:text-2xl font-semibold lg:text-3xl flex mr-2"
                >Về chúng tôi</h2>
                <p class="text-gray-500 text-xs mt-2">Đăng nội dung bài biết giới thiệu về công ty</p>
              </div>
            </div>
            <div class="bg-white rounded-md border p-3">
              <div class="mb-6">
                <div class="mb-6">
                  <label
                    for="default-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Mô tả</label>

                  <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                    <label for="editor" class="sr-only">Publish post</label>
                    <ckeditor
                      v-model="form.description"
                      :config="editorConfig"
                      rows="20"
                      class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                      placeholder="Nhập mô tả"
                    ></ckeditor>
                  </div>
                  <div v-if="errors.description" class="text-rose-600">{{ errors.description }}</div>
                </div>
              </div>
            </div>
            <div class="my-5">
              <h3 class="text-lg font-semibold">Hình ảnh</h3>
              <div v-if="errors.image" class="text-rose-600">{{ errors.image }}</div>
              <div class="bg-white border rounded-md p-3">
                <div class="flex items-center justify-center w-full">
                  <label
                    for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                  >
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
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
                      <p
                        class="text-xs text-gray-500 dark:text-gray-400"
                      >SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input
                      @input="form.image = $event.target.files[0]"
                      @change="onFileChange"
                      id="dropzone-file"
                      type="file"
                      class="hidden"
                    />
                    <img v-if="image" :src="image" alt />
            
                  </label>
                </div>
              </div>
            </div>
        <img v-if="about_us && about_us.image" :src="about_us.image" alt />
            <div class="flex justify-between">
              <a href class="text-red-600 text-base">
                <!-- <font-awesome-icon :icon="['fas', 'trash']" class="mr-3" />Xóa bài viết -->
              </a>
              <button
                type="submit"
                class="px-3 py-2 bg-primary text-white text-base rounded-md"
                @click="save"
              >Lưu lại</button>
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
import Multiselect from "@vueform/multiselect/dist/multiselect.vue2.js";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    SearchCategory,
    Multiselect,
    Head
  },
  props: {
    about_us: Object,
    errors: Object
  },
  data() {
    return {
      editorData: "<p>Content of the editor.</p>",
      editorConfig: {
        // The configuration of the editor.
      },
      image: null,
      form: this.$inertia.form({
        description: this.about_us !== null ? this.about_us.description : null,
        image: null
      })
    };
  },

  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      if (file) {
        this.image = URL.createObjectURL(file);
      } else {
        this.image = null;
      }
    },
    save() {
      this.form.post(route("about-us.store", this.form.id), {
        preserveState: false,
        onError: errors => {
          if (Object.keys(errors).length > 0) {
          }
        },
        onSuccess: page => {
          $("#exampleModal").modal("hide");
          $(".list_icon_crud").hide();
          this.form.reset();
        }
      });
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