<template>
  <section class="content">
    <Head title="Kho hàng"></Head>
    <!-- Modal -->

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
              Sửa 
              thuộc tính
            </h5>
            <h5
              v-else
              class="modal-title text-lg font-semibold"
              id="exampleModalLabel"
            >Thêm thuộc tính</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="save">
              <div class="form-group" :class="errors.category_product_id ? 'has-error' : ''">
                <label for="recipient-name" class="col-form-label">Danh mục sản phẩm:</label>
                <select
                  :class="errors.category_product_id ? 'border-red-500' : ''"
                  v-model="form.category_product_id"
                  id="countries"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                  <option :value="null">Chọn Danh mục sản phẩm</option>
                  <option
                    v-for="(category, index) in categories"
                    :key="index"
                    :value="category.id"
                  >{{ category.name }}</option>
                </select>
              </div>
              <div class="form-group" :class="errors.name ? 'has-error' : ''">
                <label for="recipient-name" class="col-form-label">Tên  thuộc tính:</label>
                <input
                  type="text"
                  v-model="form.name"
                  class="form-control text-sm rounded-lg"
                  placeholder="Tên danh mục"
                  id="recipient-name"
                />
                <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
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
      <div class="m-8 bg-white">
        <div class="p-4">
          <h2 class="font-semibold text-3xl flex mr-2">Danh sáchthuộc tính</h2>
          <div class="my-3">
            <div class="flex">
              <BreadCrumb :crumbs="crumbs"></BreadCrumb>
            </div>
            <div class="flex justify-between mt-5">
              <div class="form_search w-1/4">
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
                    name="search"
                    v-model="term"
                    @keyup="search"
                    class="block w-full p-2 pl-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search"
                  />
                </div>
              </div>
              <div class>
                <select
                  id="countries"
                  v-model="filter"
                  @change="Filter"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                  <option :value="null">Danh mục sản phẩm</option>
                  <option v-for="(cate, index) in categories" :key="index" :value="cate.name">
                    {{
                    cate.name }}
                  </option>
                </select>
              </div>

              <div>
                <button
                  class="px-2 py-2 text-sm text-white bg-primary rounded-lg border mx-1"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  @click="add()"
                >
                  <font-awesome-icon :icon="['fas', 'plus']" />Thêm thuộc tính
                </button>
              </div>
            </div>
            <div>
              <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class>
                      <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                          <tr>
                            <th scope="col" class="px-6 py-4 text-sm font-semibold">ID</th>

                            <th scope="col" class="px-6 py-4 text-sm font-semibold">Tên thuộc tính</th>

                               <th scope="col" class="px-6 py-4 text-sm font-semibold">Số lượng giá trị</th>
                            <th
                              scope="col"
                              class="px-6 py-4 text-sm font-semibold"
                            >Danh mục sản phẩm</th>
                            <th scope="col" class="px-6 py-4 text-sm font-semibold"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="(attribute, index) in attributes.data"
                            :key="index"
                            class="border-b dark:border-neutral-500"
                          >
                            <td class="whitespace-nowrap px-6 py-4">{{ index + 1 }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ attribute.name }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ attribute.values_count }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                              <span
                                class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded"
                              >
                                {{
                                attribute.category_product.name
                                }}
                              </span>
                            </td>
                            <td>
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
                                  <Link

                                  :href="route('attributes.attribute-values.index', attribute.id)"
                                    class="dropdown-item text-sm py-2 cursor-pointer"
                                   
                                  >Thuộc tính</Link>
                                  <a
                                    class="dropdown-item text-sm py-2 cursor-pointer"
                                    data-toggle="modal"
                                    data-target="#exampleModal"
                                    @click="edit(attribute)"
                                  >Chỉnh sửa</a>

                                  <a
                                    class="dropdown-item text-sm py-2 cursor-pointer text-red-600"
                                    @click="Delete(attribute.id)"
                                  >Xóa</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Pagination :links="attributes.links" />
  </section>
</template>
  
<script>
// Require needed datatables modules


import { Link, Head } from "@inertiajs/inertia-vue";
import BreadCrumb from "@/Components/BreadCrumb.vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
import Pagination from "@/Components/Pagination.vue";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    SearchCategory,
    Head,
    BreadCrumb,

    Pagination
  },
  props: {
    attributes: Object,
    categories: Array,
    category: String,
    errors: Object
  },
  data() {
    return {
      editMode: false,
      term: null,
      filter: this.category,
      crumbs: [
        {
          route: "attributes.index",
          name: "Danh mục thuộc tính"
        }
      ],
      form: this.$inertia.form({
        id: null,
        name: null,
        category_product_id: null
      })
    };
  },
  mounted() {
   
  },
  methods: {
    search() {
      this.$inertia.get(
        this.route("attributes.index"),
        { term: this.term, category: this.filter },
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    },
    Filter(event) {
      console.log(event.target.value);
      if (event.target.value == "") {
        this.$inertia.get(
          this.route("attributes.index"),
          {},
          {
            preserveScroll: true
          }
        );
      } else {
        this.filter = event.target.value;
        let query = {
          category: event.target.value
        };
        this.$inertia.get(this.route("attributes.index"), query, {
          preserveScroll: true
        });
      }
    },
    add() {
      this.editMode = false;
      this.form.reset();
    },
    save() {
      if (this.editMode) {
        this.form.post(route("attributes.update", this.form.id), {
          preserveState: true,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
              this.editMode = true;
            }
            $("#exampleModal").modal("toggle");
          },
          onSuccess: page => {
            // $("#exampleModal").modal("hide");
            $("#exampleModal").modal("toggle");
            this.form.reset();
          }
        });
      } else {
        this.form.post(route("attributes.store"), {
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
      this.form.category_product_id = data.category_product_id;
    },

    Delete(id) {
      if (!confirm("Are you sure want to remove?")) return;
      this.$inertia.delete(route("attributes.destroy", id));
    }
  }
};
</script>
  
<style >
.list_icon_crud {
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

  right: -40px;
  top: 20px;
  z-index: 111;
  display: inline-grid;
}

</style>