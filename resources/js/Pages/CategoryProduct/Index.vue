<template>
  <section class="content">
    <Head title="Danh mục sản phẩm"></Head>
    <alert :dismissible="true"></alert>
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
            <h5
              v-if="editMode"
              class="modal-title text-lg font-semibold"
              id="exampleModalLabel"
            >Sửa danh mục sản phẩm</h5>
            <h5
              v-else
              class="modal-title text-lg font-semibold"
              id="exampleModalLabel"
            >Thêm danh mục sản phẩm</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="save">
              <div class="form-group" :class="errors.name ? 'has-error' : ''">
                <label for="recipient-name" class="col-form-label">Tên danh mục:</label>
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
                    <img v-if="image" :src="image" alt />
                    <img v-else src="/img/xop.png" alt />
                  </div>
                  <div class="px-4">
                    <h6 class="text-base font-semibold">Hình ảnh</h6>
                    <p
                      class="text-sm"
                    >Đăng ảnh/icon cho danh mục sản phẩm. Kích thước tối thiểu 40x40px</p>
                  </div>
                </div>
                <div class="text-center my-3" :class="errors.image ? 'border-red-500' : ''">
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
                        <p
                          class="text-xs text-gray-500 dark:text-gray-400"
                        >SVG, PNG, JPG or GIF (MAX. 40x40px)</p>
                      </div>
                      <input
                        id="dropzone-file"
                        @change="onFileChange"
                        @input="form.image = $event.target.files[0]"
                        type="file"
                        class="hidden"
                        accept="image/*"
                      />
                    </label>
                  </div>
                </div>
                <div class="text-red-500" v-if="errors.image">{{ errors.image }}</div>
              </div>
              <hr />
              <div class="my-3">
                <label class="relative inline-flex items-center cursor-pointer">
                  <input
                    type="checkbox"
                    class="sr-only peer"
                    :checked="showToggle"
                    @change="onChangeDefault($event)"
                  />
                  <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                  ></div>
                  <span
                    class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Chọn danh mục cha</span>
                </label>
              </div>
              <div v-if="showToggle">
                <label
                  for="countries"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                  Danh mục
                  cha
                </label>
                <select
                  :class="errors.parent_id ? 'border-red-500' : ''"
                  v-model="form.parent_id"
                  id="countries"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                  <option :value="null">Chọn danh mục cha</option>
                  <option
                    v-for="(category, index) in categories"
                    :key="index"
                    :value="category.id"
                  >{{ category.name }}</option>
                </select>
                <div class="text-red-500" v-if="errors.parent_id">{{ errors.parent_id }}</div>
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
    <div>
      <div class="m-10 bg-white">
        <div class="p-5">
          <h2 class="font-semibold text-3xl">Danh mục sản phẩm</h2>
          <div class="flex justify-between">
            <SearchCategory />
            <div class="mt-5">
              <button
                class="bg-primary px-3 py-2 rounded-lg text-white"
                data-toggle="modal"
                data-target="#exampleModal"
                @click="add()"
              >
                <font-awesome-icon :icon="['fas', 'plus']" class="mr-2" />Thêm danh mục
              </button>
            </div>
          </div>
          <div class="border-2 mt-5 rounded-lg">
            <div class>
              <div class="px-2 py-3">
                <h3 class="text-lg font-semibold flex">
                  Không phân loại
                  <p class="text-gray-500 text-lg italic ml-3 font-normal">Mặc định</p>
                </h3>
              </div>
              <hr />
              <div class="menu-category">
                <div
                  v-for="(category, index) in categories"
                  :key="index"
                  class="flex justify-between divide-y divide-slate-200 px-2 py-3"
                >
                  <div class="w-full">
                    <a class="flex title_carton treeview" id="carton_1">
                      <img :src="category.image" alt />
                      <h3 class="text-lg font-semibold mx-3 cursor-pointer">{{ category.name }}</h3>
                    </a>
                    <div
                      class="pl-5 carton_sub w-full my-2 treeview-menu"
                      :id="`subCarton_${category.id}}`"
                    >
                      <hr style="border: 1px solid #EAECF0" />
                      <div v-for="cate in category.children_categories" :key="cate.id">
                        <div class="bg-white flex justify-between py-3">
                          <h3 class="text-lg font-semibold mx-3 cursor-pointer">{{ cate.name }}</h3>
                          <div class="relative">
                            <!-- <button
                              class="item_crud"
                              id="dropdownMenuButton"
                              data-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                            </button>
                            <div
                              class="p-2 list_icon_crud absolute block top-0"
                              aria-labelledby="dropdownMenuButton"
                            >
                              <a
                                class="text-sm py-2 cursor-pointer"
                                data-toggle="modal"
                                data-target="#exampleModal"
                                @click="edit(cate)"
                              >Chỉnh sửa</a>
                              <a class="text-sm py-2 cursor-pointer">Xem trước</a>
                              <a class="text-sm py-2 cursor-pointer text-red-600">Xóa</a>
                            </div>-->
                            <div class="dropdown">
                              <button
                                type="button"
                                id="dropdownMenuButton"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a
                                  class="dropdown-item text-sm py-2 cursor-pointer"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                  @click="edit(cate)"
                                >Chỉnh sửa</a>
                                <a class="dropdown-item text-sm py-2 cursor-pointer">Xem trước</a>
                                <a
                                  class="dropdown-item text-sm py-2 cursor-pointer text-red-600" @click="Delete(cate.id)"
                                >Xóa</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr style="border: 1px solid #EAECF0" />
                      </div>
                      <!-- <hr style="border: 1px solid #EAECF0" />
                      <div class="bg-white py-3">
                        <h3 class="text-lg font-semibold mx-3 cursor-pointer">Hộp Carton 5 lớp</h3>
                      </div>
                      <hr style="border: 1px solid #EAECF0" />
                      <div class="bg-white py-3">
                        <h3 class="text-lg font-semibold mx-3 cursor-pointer">Hộp Carton 5 lớp</h3>
                      </div>
                      <hr style="border: 1px solid #EAECF0" />-->
                    </div>
                  </div>
                  <div class="relative">
                    <!-- <button class="item_crud"    id="dropdownMenuButton"
                              data-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false">
                      <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                    </button>
                    <div class="p-2 list_icon_crud absolute block top-0" id="dropdownMenuButton">
                      <a
                        class="text-sm py-2 cursor-pointer"
                        data-toggle="modal"
                        data-target="#exampleModal"
                        @click="edit(category)"
                      >Chỉnh sửa</a>
                      <a class="text-sm py-2 cursor-pointer">Xem trước</a>
                      <a class="text-sm py-2 cursor-pointer text-red-600">Xóa</a>
                    </div>-->

                    <div class="dropdown">
                      <button
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                      </button>
                      <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                        <a
                          class="dropdown-item text-sm py-2 cursor-pointer"
                          data-toggle="modal"
                          data-target="#exampleModal"
                          @click="edit(category)"
                        >Chỉnh sửa</a>
                        <a class="dropdown-item text-sm py-2 cursor-pointer">Xem trước</a>
                        <a class="dropdown-item text-sm py-2 cursor-pointer text-red-600" @click="Delete(category.id)">Xóa</a>
                      </div>
                    </div>
                  </div>

                  <hr style="border: 1px solid #EAECF0" />
                </div>

                <!-- <hr /> -->
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
    categories: Array,
    errors: Object
  },
  data() {
    return {
      image: null,
      showToggle: false,
      editMode: false,
      form: this.$inertia.form({
        id: null,
        name: null,
        image: null,
        parent_id: null
      })
    };
  },
  mounted: function() {
    $('[data-toggle="hideseek"]')
      .off()
      .hideseek();

    $(".list_icon_crud").hide();
    $(".item_crud").click(function(e) {
      $(".list_icon_crud").hide();
      e.preventDefault();
      //   $(this).next(".list_icon_crud").css("display","inline-grid");
      $(this)
        .next(".list_icon_crud")
        .slideToggle();
    });
    $(".carton_sub").hide();
    $(".title_carton").click(function(e) {
      $(".list_icon_crud").hide();
      e.preventDefault();
      $(this)
        .next(".carton_sub")
        .slideToggle();
    });
    //

    $(".item_crud").click(function(e) {
      $(".list_icon_crud").hide();
      e.preventDefault();
      $(this)
        .next(".list_icon_crud")
        .slideToggle();
    });
  },
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
        this.image = URL.createObjectURL(file);
      } else {
        this.image = null;
      }
    },
    save() {
      if (this.editMode) {
        this.form.post(route("categories.update", this.form.id), {
          preserveState: true,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
              this.editMode = true;
            }
          },
          onSuccess: page => {
            $("#exampleModal").modal("hide");
            $(".list_icon_crud").hide();
            this.form.reset();
          }
        });
      } else {
        this.form.post(route("categories.store"), {
          preserveState: true,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
              this.editMode = false;
            }
          },
          onSuccess: page => {
            $("#exampleModal").modal("hide");
            $(".list_icon_crud").hide();
            this.form.reset();
          }
        });
      }
    },
    edit(data) {
      this.editMode = true;
      this.form.id = data.id;
      this.form.name = data.name;
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

<style scoped>
.carton_sub {
  display: none;
}

.carton_sub {
  background: #d1d5db;
}

.subCarton_show {
  display: block;
}

.btn-upload {
  padding: 0.3rem 0.7rem;
}

.modal-dialog {
  top: 20%;
}

.list_icon_crud {
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  width: 90px;
  left: 20px;
  top: 0px;
  z-index: 111;
  display: inline-grid;
}

/* .list_icon_crud button{
  padding:0.5rem;
} */
</style>