<template>
  <section class="content">
    <Head title="Thêm bài viết mới"></Head>
    <!-- Modal -->
    <div>
      <div class="container mx-auto">
        <div class="m-8">
          <div class="p-4">
            <div class="my-3 flex">
              <Link :href="route('post.index')" class="px-3 mr-4 py-3  bg-white border rounded-lg">
                <font-awesome-icon :icon="['fas', 'chevron-left']" />
              </Link>
              <div class="block">
                <p class="text-gray-500 text-xs">Trở về</p>
                <h2 class="font-semibold text-3xl flex mr-2">Thêm bài viết mới</h2>
              </div>
            </div>
            <div class="bg-white rounded-md border p-3">
              <div class="mb-6">
                <label
                  for="default-input"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                  Tên bài
                  viết
                </label>
                <input
                  type="text"
                  v-model="form.name"
                  id="default-input"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Chưa đặt tên"
                />
                <div v-if="errors.name" class="text-rose-600">{{ errors.name }}</div>
              </div>
              <div class="mb-6">
                <label
                  for="default-sub_title"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Mô tả ngắn</label>

                <div
                  class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
                >
                  <div class="dark:bg-gray-800">
                    <label for="editor" class="sr-only">Publish post</label>
                    <ckeditor
                      v-model="form.sub_title"
                      :config="editorConfig1"
                      class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                      placeholder="Nhập mô tả"
                    ></ckeditor>

                    <div v-if="errors.sub_title" class="text-rose-600">{{ errors.sub_title }}</div>
                  </div>
                </div>

                <div class="mb-6">
                  <label
                    for="default-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >
                    Nội dung bài
                    viết
                  </label>

                  <div
                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
                  >
                    <div class="rounded-b-lg dark:bg-gray-800">
                      <label for="editor" class="sr-only">Publish post</label>
                      <ckeditor
                        v-model="form.description"
                        :config="editorConfig2"
                        class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                        placeholder="Nhập mô tả"
                      ></ckeditor>
                      <div v-if="errors.description" class="text-rose-600">{{ errors.description }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="my-5">
              <h3 class="text-lg font-semibold">Hình ảnh</h3>
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
                      <p class="text-xs text-gray-500 dark:text-gray-400">
                        SVG, PNG, JPG or GIF (MAX.
                        800x400px)
                      </p>
                    </div>
                    <input
                      id="dropzone-file"
                      @change="onFileChange"
                      @input="form.image = $event.target.files[0]"
                      type="file"
                      class="hidden"
                    />
                  </label>

                  <div v-if="errors.image" class="text-rose-600">{{ errors.image }}</div>
                </div>
                <img v-if="image" :src="image" alt />
              </div>
            </div>
            <div class="my-5">
              <h3 class="text-lg font-semibold">Tag</h3>
              <div class="bg-white border rounded-md p-3">
                <label
                  for="default-tag"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                  Thêm tag
                  mới
                </label>
                <div class="row d-flex justify-content-center px-3">
                  <div class="w-full">
                    <Multiselect
                      v-model="form.tags"
                      mode="tags"
                      :appendNewTag="false"
                      :createTag="false"
                      :searchable="true"
                      label="name"
                      valueProp="id"
                      trackBy="name"
                      :options="tags"
                      class="multiselect-blue"
                      :classes="{
                                                tagsSearch: 'absolute inset-0 border-0 outline-none focus:ring-0 appearance-none p-0 text-base font-sans box-border w-full',
                                                container: 'relative mx-auto w-full flex items-center py-2 px-3 justify-end box-border cursor-pointer border border-gray-300 rounded bg-white text-xs leading-snug outline-none',
                                                tags: 'flex-grow flex-shrink flex flex-wrap items-center mt-1 pl-2 rtl:pl-0 rtl:pr-2',
                                                tag: 'bg-blue-500 text-white text-xs font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap rtl:pl-0 rtl:pr-2 rtl:mr-0 rtl:ml-1',
                                            }"
                    ></Multiselect>
                  </div>
                </div>
              </div>
              <div v-if="errors.tags" class="text-rose-600">{{ errors.tags }}</div>
            </div>
            <!-- <div class="my-5">
                            <h3 class="text-lg font-semibold">Công cụ tìm kiếm</h3>
                            <div class="bg-white border rounded-md p-3">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">
                                    Tên bài
                                    viết
                                </label>
                                <p class="text-green-500 text-sm">http://cartonlebui.com/blog/ten-bai-viet</p>
                                <span class="text-xs text-gray-500">Mô tả bài viết</span>
                                <div class="my-3">
                                    <label for="default-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
                                    <form>
                                        <div
                                            class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                                <label for="comment" class="sr-only">Your comment</label>
                                                <textarea id="comment" rows="4"
                                                    class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                                    placeholder="http://cartonlebui.com/blog/ten-bai-viet"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
            </div>-->
            <div class="flex justify-between">
              <a href class="text-red-600 text-base">
                <!-- <font-awesome-icon :icon="['fas', 'trash']" class="mr-3" />Xóa bài viết -->
              </a>
              <button
                class="px-3 py-2 bg-primary text-white text-base rounded-md"
                @click.prevent="save()"
              >Đăng bài viết</button>
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
    tags: Array,
    errors: Object
  },
  data() {
    return {
      editorConfig1: {
        // The configuration of the editor.
      },

      editorConfig2: {
        // The configuration of the editor.
      },
      image: null,
      form: this.$inertia.form({
        name: null,
        tags: null,
        sub_title: null,
        description: null,
        image: null
      })
    };
  },

  methods: {
    save() {
      this.form.post(route("post.store"), {
        preserveState: true,
        onError: errors => {
          if (Object.keys(errors).length > 0) {
            this.editMode = true;
          }
        },
        onSuccess: page => {
          // $("#exampleModal").modal("hide");

          this.form.reset();
        }
      });
    },
    onFileChange(e) {
      const file = e.target.files[0];
      if (file) {
        this.image = URL.createObjectURL(file);
      } else {
        this.image = null;
      }
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