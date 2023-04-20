<template>
    <section class="content">
      <Head title="Về chúng tôi"></Head>
      <!-- Modal -->
      <div>
        <div class="min-[320px]:p-0 min-[320px]:m-0 lg:container mx-auto">
          <div class="min-[320px]:m-0 sm:m-2 md:m-4 lg:m-8">
            <div class="min-[320px]:p-2 sm:m-0 md:m-2 lg:p-4">
              <div class="my-3 flex">
                
                <div class="block">
                  
                  <h2 class="min-[320px]:text-xl sm:text-2xl md:text-2xl font-semibold lg:text-3xl flex mr-2">
                   Về chúng tôi
                  </h2>
                  <p class="text-gray-500 text-xs mt-2">Đăng nội dung bài biết giới thiệu về công ty</p>
                </div>
              </div>
              <div class="bg-white rounded-md border p-3">
                <div class="mb-6">
                  <label
                    for="default-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Tên bài viết</label
                  >
                  <input
                    type="text"
                    id="default-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Chưa đặt tên"
                  />
                </div>
                <div class="mb-6">
                  <div class="mb-6">
                    <label
                      for="default-input"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Nội dung bài viết</label
                    >
                    <form>
                      <div
                        class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
                      >
                        <div
                          class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600"
                        >
                          <div
                            class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600"
                          >
                            <div class="flex items-center space-x-1 sm:pr-4">
                              <button
                                type="button"
                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                              >
                                <svg
                                  aria-hidden="true"
                                  class="w-5 h-5"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                                <span class="sr-only">Attach file</span>
                              </button>
                              <button
                                type="button"
                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                              >
                                <svg
                                  aria-hidden="true"
                                  class="w-5 h-5"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                                <span class="sr-only">Embed map</span>
                              </button>
                              <button
                                type="button"
                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                              >
                                <svg
                                  aria-hidden="true"
                                  class="w-5 h-5"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                                <span class="sr-only">Upload image</span>
                              </button>
                              <button
                                type="button"
                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                              >
                                <svg
                                  aria-hidden="true"
                                  class="w-5 h-5"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                                <span class="sr-only">Format code</span>
                              </button>
                              <button
                                type="button"
                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                              >
                                <svg
                                  aria-hidden="true"
                                  class="w-5 h-5"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                                <span class="sr-only">Add emoji</span>
                              </button>
                            </div>
                            <div
                              class="flex flex-wrap items-center space-x-1 sm:pl-4"
                            >
                              <button
                                type="button"
                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                              >
                                <svg
                                  aria-hidden="true"
                                  class="w-5 h-5"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                                <span class="sr-only">Add list</span>
                              </button>
                              <button
                                type="button"
                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                              >
                                <svg
                                  aria-hidden="true"
                                  class="w-5 h-5"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                                <span class="sr-only">Settings</span>
                              </button>
                              <button
                                type="button"
                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                              >
                                <svg
                                  aria-hidden="true"
                                  class="w-5 h-5"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                                <span class="sr-only">Timeline</span>
                              </button>
                              <button
                                type="button"
                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                              >
                                <svg
                                  aria-hidden="true"
                                  class="w-5 h-5"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                                <span class="sr-only">Download</span>
                              </button>
                            </div>
                          </div>
                          <button
                            type="button"
                            data-tooltip-target="tooltip-fullscreen"
                            class="p-2 text-gray-500 rounded cursor-pointer sm:ml-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                          >
                            <svg
                              aria-hidden="true"
                              class="w-5 h-5"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 11-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z"
                                clip-rule="evenodd"
                              ></path>
                            </svg>
                            <span class="sr-only">Full screen</span>
                          </button>
                          <div
                            id="tooltip-fullscreen"
                            role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
                          >
                            Show full screen
                            <div class="tooltip-arrow" data-popper-arrow></div>
                          </div>
                        </div>
                        <div
                          class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800"
                        >
                          <label for="editor" class="sr-only">Publish post</label>
                          <textarea
                            id="editor"
                            rows="20"
                            class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                            placeholder="Nhập mô tả"
                            required
                          ></textarea>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="my-5">
                  <h3 class="text-lg font-semibold">Hình ảnh</h3>
                  <div class="bg-white border rounded-md p-3">              
                      <div class="flex items-center justify-center w-full">
                          <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                  <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                  <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                              </div>
                              <input id="dropzone-file" type="file" class="hidden" />
                          </label>
                      </div> 
                  </div>
              </div>
              <div class="my-5">
                  <h3 class="text-lg font-semibold">Tag</h3>
                  <div class="bg-white border rounded-md p-3">              
                      <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thêm tag mới</label>
                      <div class="row d-flex justify-content-center px-3">
                          <div class="w-full"> <select id="choices-multiple-remove-button" class="w-full" placeholder="Thêm tag mới" style="width: 100% !important;" multiple>
                                  <option value="HTML">Hộp Carton</option>
                                  <option value="Jquery">Hộp Giấy</option>
                                  <option value="CSS">Hộp đựng bánh</option>
                              </select> </div>
                      </div>
                </div>
              </div>
              <div class="my-5">
                  <h3 class="text-lg font-semibold">Công cụ tìm kiếm</h3>
                  <div class="bg-white border rounded-md p-3">
                      <label for="default-input" class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Tên bài viết</label>
                      <p class="text-green-500 text-sm">http://cartonlebui.com/blog/ten-bai-viet</p>
                      <span class="text-xs text-gray-500">Mô tả bài viết</span>
                      <div class="my-3">
                          <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
                              <form>
                                  <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                      <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                          <label for="comment" class="sr-only">Your comment</label>
                                          <textarea id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="http://cartonlebui.com/blog/ten-bai-viet" required></textarea>
                                      </div>                                  
                                  </div>
                              </form>
                      </div>
                  </div>
              </div>
              <div class="flex justify-between">
                  <a href="" class="text-red-600 text-base">
                      <font-awesome-icon :icon="['fas', 'trash']" class="mr-3"/>
                      Xóa bài viết
                  </a>
                  <button class="px-3 py-2 bg-primary text-white text-base rounded-md">Đăng bài viết</button>
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
      Head,
    },
    props: {
      categories: Array,
      errors: Object,
    },
    data() {
      return {};
    },
    mounted: function () {
      $(document).ready(function(){
      
      var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
         removeItemButton: true,
         maxItemCount:5,
         searchResultLimit:5,
         renderChoiceLimit:5
       }); 
      
      
  });
    },
    methods: {},
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
  .mt-100{margin-top: 100px}
  body{background: #00B4DB;background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);background: linear-gradient(to right, #0083B0, #00B4DB);color: #514B64;min-height: 100vh}
  .choices__input.choices__input--cloned{
      width: 100% !important;
  }
  </style>