<template>
  <section class="content">

    <Head title="Quản lý bài viết"></Head>
    <alert :dismissible="true"></alert>
    <!-- Modal -->
    <div>
      <div class="m-8 bg-white">
        <div class="p-4">
          <h2 class="font-semibold text-3xl flex mr-2">
            Quản lý bài viết
            <p class="text-gray-400">( 125 )</p>
          </h2>
          <div class="my-3">
            <div class="flex justify-between">
              <div class="flex">
                <div class="form_search">
                  <form v-on:submit.prevent>
                    <div class="relative">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-sm text-gray-500 dark:text-gray-400" fill="none"
                          stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                      </div>
                      <input type="search" id="default-search" name="search" v-model="term" @keyup="search"
                        laceholder="Search Menus"
                        class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tìm bài viết" required />
                    </div>
                  </form>
                </div>
                <div class>
                  <div class="mt-2" v-if="selected.length > 0" @click="DeleteCheckbox()">
                    <a href class="flex text-red-600 mx-3 text-sm">
                      <font-awesome-icon :icon="['fas', 'trash']" style="color: #d22839;" class="mx-2 mt-1" />Xóa
                      <span>({{ selected.length }})</span> sản phẩm đã chọn
                    </a>
                  </div>
                </div>
              </div>
              <div class>
                <Link :href="route('post.create')" class="bg-primary px-3 py-2 rounded-lg text-white">
                <font-awesome-icon :icon="['fas', 'plus']" class="mr-2" />Viết bài
                </Link>
              </div>
            </div>
            <div class="my-4">
              <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                      <th scope="col" class="px-6 py-3">
                        <input id="default-checkbox" type="checkbox" v-model="selectAll"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                      </th>
                      <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                          Ảnh bài viết
                         
                        </div>
                      </th>
                      <th scope="col" class="px-6 py-3">
                        <div class="flex items-center" @click="sortValue('name')">
                          Tên bài viết
                          <a >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true"
                              fill="currentColor"   viewBox="0 0 320 512">
                              <path
                                d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                            </svg>
                          </a>
                          
                        </div>
                      </th>
                      <!-- <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                          Đăng bài
                          <a href="#">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="w-3 h-3 ml-1"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 320 512"
                            >
                              <path
                                d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"
                              />
                            </svg>
                          </a>
                        </div>
                      </th> -->
                      <!-- <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                           Nổi bật
                          <a href="#">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="w-3 h-3 ml-1"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 320 512"
                            >
                              <path
                                d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"
                              />
                            </svg>
                          </a>
                        </div>
                      </th> -->
                      <th scope="col" class="px-6 py-3"  @click="sortValue('created_at')">
                        <div class="flex items-center">
                          Thời gian đăng bài
                          <a >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true"
                              fill="currentColor" viewBox="0 0 320 512">
                              <path
                                d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                            </svg>
                          </a>
                        </div>
                      </th>

                      <th scope="col" class="px-6 py-3"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(post, index) in posts.data" :key="index">
                      <td class="whitespace-nowrap px-6 py-4 font-medium">
                        <input id="default-checkbox" type="checkbox" v-model="selected" :value="post.id"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                      </td>
                      <td class="whitespace-nowrap px-6 py-4 font-medium">
                        <img :src="post.image" class="w-25 h-20" alt />
                      </td>
                      <td class="whitespace-nowrap px-6 py-4 font-medium">{{ post.name }}</td>
                      <!-- <td class="whitespace-nowrap px-6 py-4 font-medium">
                      <input :checked="p.active == 1 ? true : false" @change="onChangeActive(post, $event)"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        type="checkbox" />
                    </td>
                
                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                      <select @change="onChangeStatus(post, $event)"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mx-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option :value="1" :selected="post.status == 1 ? true : false">Còn hàng</option>
                        <option :value="0" :selected="post.status == 0 ? true : false">Hết hàng</option>
                      </select>
                    </td> -->
                      <td class="whitespace-nowrap px-6 py-4 font-medium">
                        {{ post.created_at ? formatTimeDayMonthyear(post.created_at) : ''
                        }}
                      </td>
                      <td class="whitespace-nowrap px-6 py-4 font-medium">
                        <div class="dropdown">
                          <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="btn_crud"
                            aria-haspopup="true" aria-expanded="false">
                            <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                          </button>
                          <div class="dropdown-menu">
                            <Link class="dropdown-item text-sm py-2 cursor-pointer" :href="route('post.edit', post.id)">
                            Chỉnh sửa</Link>

                            <a class="dropdown-item text-sm py-2 cursor-pointer text-red-600"
                              @click="Delete(post.id)">Xóa</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <Pagination :links="posts.links" />
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
import Pagination from "@/Components/Pagination";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    Head,
    Pagination
  },
  props: {
    posts: Object,
    errors: Object
  },
  data() {
    return {
      sort: this.sortBy,
      sortDirection: this.sort_Direction,
      selected: [],
      term: null,
      filter: this.status
    };
  },
  computed: {
    selectAll: {
      get: function () {
        return this.posts.data
          ? this.selected.length == this.posts.data
          : false;
      },
      set: function (value) {
        var selected = [];

        if (value) {
          this.posts.data.forEach(function (post) {
            selected.push(post.id);
          });
        }

        this.selected = selected;
      }
    }
  },
  methods: {
    search() {
      this.$inertia.get(
        this.route("post.index"),
        { term: this.term },
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    },
    Filter(event) {
      if (event.target.value == "") {
        this.$inertia.get(
          this.route("posts.index"),
          {},
          {
            preserveScroll: true
          }
        );
      } else {
        this.filter = event.target.value;
        let query = {
          state: event.target.value
        };
        this.$inertia.get(this.route("posts.index"), query, {
          preserveScroll: true
        });
      }
    },
    sortValue: function (s) {
      if (s === this.sort) {
        this.sortDirection = this.sortDirection === "asc" ? "desc" : "asc";
      }
      this.sort = s;

      this.$inertia.get(
        this.route("post.index"),
        {
          sortBy: this.sort,
          sortDirection: this.sortDirection,
          page: this.posts.current_page
        },
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    },

    DeleteCheckbox() {
      let query = {
        ids: this.selected
      };
      this.$swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.$inertia.delete(
            this.route("post.deletePosts", query, {
              preserveState: true,
              preserveScroll: true
            })
          );
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },

    changOutStanding(product, event) {
      let query = {
        outstanding: event.target.checked,
        id: product.id
      };
      this.$inertia.post(route("post.changeOutstanding"), query, {
        preserveState: true,
        preserveScroll: true
      });
    },
    Delete(id) {
      this.$swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.$inertia.delete(route("post.destroy", id));
        } else {
          this.$swal("Action cancelled!");
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

.tag_sale {
  width: fit-content;
}
</style>