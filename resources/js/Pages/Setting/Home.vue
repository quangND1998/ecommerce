<template>
  <section class="content">
    <Head title="Trang Chủ"></Head>
    <alert :dismissible="true"></alert>
    <!-- Modal -->
    <div>
      <form @submit.prevent="save" class="min-[320px]:p-0 min-[320px]:m-0 lg:container mx-auto">
        <div class="min-[320px]:m-0 sm:m-2 md:m-4 lg:m-8">
          <div class="min-[320px]:p-0 sm:m-0 md:m-2 lg:p-4">
            <div class="bg-white rounded-md border p-3">
              <h3 class="text-xl font-semibold">Trang chủ</h3>
              <p class="text-gray-500 text-xs">Cài đặt slider trên trang chủ</p>
              <div>
                <h5 class="text-base font-semibold">Hình ảnh 1</h5>
                <div class="border rounded-md p-3">
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
                          <span class="font-semibold">Click to upload</span> or
                          drag and drop
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
                    </label>
                  </div>
                  <img v-if="image" :src="image" alt />
                </div>
                <div v-if="errors.image" class="text-rose-600">{{ errors.image }}</div>
              </div>
              <div class="my-6">
                <label
                  for="default-input"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                  Link bài
                  viết 1
                </label>
                <input
                  type="text"
                  id="default-input"
                  v-model="form.link"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="http://"
                />
                <div v-if="errors.link" class="text-rose-600">{{ errors.link }}</div>
              </div>
              <div class="flex justify-between">
                <button
                  class="px-3 py-2 bg-red-600 cursor-pointer text-white text-base rounded-md"
                  @click="cancel()"
                >
                  <!-- <font-awesome-icon :icon="['fas', 'trash']" class="mr-3" /> -->
                  Cancel
                </button>

                <button
                  v-if="editMode"
                  type="submit"
                  class="px-3 py-2 bg-primary cursor-pointer text-white text-base rounded-md"
                  @click.prevent="save()"
                >Update</button>
                <button
                  v-else
                  type="submit"
                  class="px-3 py-2 bg-primary cursor-pointer text-white text-base rounded-md"
                  @click.prevent="save()"
                >Save</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="my-4">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
          >
            <tr>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">STT</div>
              </th>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">Ảnh</div>
              </th>

              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">Link bài viết</div>
              </th>
              <th scope="col" class="px-6 py-3">
                <div class="flex items-center">Active</div>
              </th>
              <th scope="col" class="px-6 py-3"></th>
            </tr>
          </thead>
          <draggable
            v-model="homes"
            tag="tbody"
            @change="onUnpublishedChange"
            v-bind="dragOptions"
            @start="isDragging = true"
            @end="isDragging = false"
            item-key="priority"
            class="bg-white divide-y divide-gray-200"
          >
            <template>
              <tr v-for="(home, index) in homes" :key="index">
                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ index + 1 }}</td>
                <td class="whitespace-nowrap px-6 py-4 font-medium">
                  <img :src="home.image" width="50px" alt />
                </td>
                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ home.link }}</td>
                <td class="whitespace-nowrap px-6 py-4 font-medium">
                  <input
                    :checked="home.state == 1 ? true : false"
                    @change="onChangeActive(home, $event)"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    type="checkbox"
                  />
                </td>

                <td class="whitespace-nowrap px-6 py-4 font-medium">
                  <button
                    class="text-sm py-2 mr-4 cursor-pointer text-blue-600"
                    @click="edit(home)"
                  >Edit</button>
                  <button
                    class="text-sm py-2 cursor-pointer text-red-600"
                    @click="Delete(home.id)"
                  >Xóa</button>
                  <!-- <div class="dropdown">
                  <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="btn_crud"
                    aria-haspopup="true" aria-expanded="false">
                    <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                  </button>
                  <div class="dropdown-menu">
                    <button class="dropdown-item text-sm py-2 cursor-pointer">Chỉnh sửa</button>

                  
                  </div>
                  </div>-->
                </td>
              </tr>
            </template>
          </draggable>
        </table>
      </div>
    </div>
  </section>
</template>
    
<script>
import draggable from "vuedraggable";
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
    draggable
  },
  props: {
    homes: Array,
    errors: Object
  },
  data() {
    return {
      editMode: false,
      image: null,
      form: this.$inertia.form({
        id: null,
        link: null,
        image: null
      })
    };
  },
  computed: {
    dragOptions() {
      return {
        animation: 100,
        group: "description",
        disabled: false,
        ghostClass: "ghost",
        scrollSensitivity: 100,
        forceFallback: true
      };
    }
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
      if (this.editMode) {
        this.form.post(route("home.update", this.form.id), {
          preserveState: false,
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
        this.form.post(route("home.store"), {
          preserveState: false,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
            }
          },
          onSuccess: page => {
            $("#exampleModal").modal("hide");
            this.cancel();
          }
        });
      }
    },
    edit(data) {
      this.editMode = true;
      this.form.link = data.link;
      this.form.id = data.id;
    },
    cancel() {
      this.editMode = false;
      this.image = null;
      this.form = this.$inertia.form({
        id: null,
        link: null,
        image: null
      });
    },
    onUnpublishedChange() {
      let query = {
        data: this.homes
      };
      this.$inertia.post(this.route("home.priority"), query, {
        preserveState: false
      });
    },
    onChangeActive(home, event) {
      let query = {
        state: event.target.checked,
        id: home.id
      };
      this.$inertia.post(route("home.changeActive"), query, {
        preserveState: true,
        preserveScroll: true
      });
    },
    Delete(id) {
      this.$swal({
        title: "Are you sure?",
        text: "Once deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.$inertia.delete(route("home.destroy", id));
        } else {
          this.$swal("Action cancelled!");
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