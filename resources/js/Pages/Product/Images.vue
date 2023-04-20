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

            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              @click="reset()"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="save">
              <div v-if="editMode">
                <div class="text-center" :class="errors.images ? 'border-red-500' : ''">
                  <input @input="form.images = $event.target.files[0]" type="file" accept="image/*" />
                </div>
                <div class="text-red-500" v-if="errors.images">{{ errors.images }}</div>
              </div>
              <div v-else>
                <div class="text-center" :class="errors.images ? 'border-red-500' : ''">
                  <input
                    @input="form.images = $event.target.files"
                    type="file"
                    accept="image/*"
                    multiple
                  />
                </div>
                <div class="text-red-500" v-if="errors.images">{{ errors.images }}</div>
              </div>
              <hr />

              <div class="modal-footer">
                <button
                  type="button"
                  class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                  data-dismiss="modal"
                  @click="reset()"
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
    <div class="m-8 bg-white">
      <div class="p-4">
        <div class>
          <div class="flex justify-between">
            <div class="flex">
              <Link
                :href="route('warehouse.show', category.slug)"
                class="px-2 py-3 border rounded-md"
              >
                <font-awesome-icon :icon="['fas', 'chevron-left']" />
              </Link>
              <div class="ml-3">
                <h2 class="text-lg font-semibold text-black">Danh sách hình ảnh</h2>
                <BreadCrumb :crumbs="crumbs"></BreadCrumb>
              </div>
              <div class="flex">
                <div class="mt-3">
                  <button v-if="selected.length > 0" class="flex text-red-600 mx-3 text-sm">
                    <font-awesome-icon
                      :icon="['fas', 'trash']"
                      style="color: #d22839;"
                      class="mx-2 mt-1"
                    />Xóa
                    <span>({{ selected.length }})</span> sản phẩm đã chọn
                  </button>
                </div>
              </div>
            </div>
            <button
              data-toggle="modal"
              data-target="#exampleModal"
              @click="add()"
              class="px-2 py-2 text-sm text-white bg-primary rounded-lg border mx-1"
            >
              <font-awesome-icon :icon="['fas', 'plus']" />Thêm Ảnh
            </button>
          </div>
        </div>

        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
              <div class>
                <table class="min-w-full text-left text-sm font-light">
                  <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                      <th scope="col" class="px-6 py-4">
                        <input
                          id="default-checkbox"
                          type="checkbox"
                          v-model="selectAll"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                      </th>
                      <th scope="col" class="px-6 py-4 text-sm font-semibold">ID</th>

                      <th scope="col" class="px-6 py-4 text-sm font-semibold">Hình ảnh</th>

                      <th scope="col" class="px-6 py-4 text-sm font-semibold"></th>
                    </tr>
                  </thead>
                  <draggable
                    v-model="product.images"
                    tag="tbody"
                    @change="onUnpublishedChange"
                    v-bind="dragOptions"
                    @start="isDragging = true"
                    @end="isDragging = false"
                    item-key="priority"
                    class="bg-white divide-y divide-gray-200"
                  >
                    <template>
                      <tr
                        v-for="(image, index) in product.images"
                        :key="index"
                        class="border-b dark:border-neutral-500"
                      >
                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                          <input
                            id="default-checkbox"
                            type="checkbox"
                            v-model="selected"
                            :value="image.id"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                          />
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">{{ index + 1 }}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                          <img :src="image.image" class="w-16 h-16" alt />
                        </td>

                        <td class="whitespace-nowrap px-6 py-4 relative">
                          <div class="dropdown">
                            <button
                              type="button"
                              id="dropdownMenuButton"
                              data-toggle="dropdown"
                              class="btn_crud"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a
                                data-toggle="modal"
                                data-target="#exampleModal"
                                @click="edit(image)"
                                class="dropdown-item text-sm py-2 cursor-pointer"
                              >Chỉnh sửa</a>
                              <!-- <Link class="dropdown-item text-sm py-2 cursor-pointer"  :href="route('warehouse.attributes',[category.slug,product.id])">Thuộc tính</Link> -->

                              <a
                                class="dropdown-item text-sm py-2 cursor-pointer text-red-600"
                                @click="Delete(image.id)"
                              >Xóa</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </template>
                  </draggable>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import draggable from "vuedraggable";
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import BreadCrumb from "@/Components/BreadCrumb";
export default {
  layout: [Layout],
  components: {
    Link,
    Head,
    BreadCrumb,
    draggable,
    Alert
  },
  props: {
    product: Object,
    errors: Object,
    category: Object
  },
  data() {
    return {
      editMode: false,
      selected: [],
      crumbs: [
        {
          route: "warehouse.show",
          name: "Sản phẩm",
          parma: this.category.slug
        },
        {
          route: "warehouse.show",
          name: this.product.name,
          parma: this.category.slug
        },
        {
          route: "images.index",
          name: "Danh sách Ảnh",
          parma: [this.category.slug, this.product.id]
        }
      ],
      form: this.$inertia.form({
        id: null,
        images: null
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
    },
    selectAll: {
      get: function() {
        return this.product.images
          ? this.selected.length == this.product.images
          : false;
      },
      set: function(value) {
        var selected = [];

        if (value) {
          this.product.images.forEach(function(image) {
            selected.push(image.id);
          });
        }

        this.selected = selected;
      }
    }
  },
  methods: {
    save() {
      if (this.editMode) {
        this.form.post(route("product.images.update", this.form.id), {
          preserveState: true,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
              this.editMode = true;
            }
          },
          onSuccess: page => {
            $("#exampleModal").modal("hide");
            this.reset();
          }
        });
      } else {
        this.form.post(route("product.images.store", this.product.id), {
          preserveState: true,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
              this.editMode = false;
            }
          },
          onSuccess: page => {
            $("#exampleModal").modal("hide");
            $(".list_icon_crud").hide();
            this.reset();
          }
        });
      }
    },
    onUnpublishedChange() {
      let query = {
        data: this.product.images
      };
      this.$inertia.post(this.route("product.images.priority"), query, {
        preserveState: false
      });
    },
    add() {
      this.editMode = false;
      this.reset();
    },
    reset() {
      this.editMode = false;
      this.form = this.$inertia.form({
        id: null,
        images: null
      });
    },
    edit(data) {
      this.editMode = true;
      this.form.id = data.id;
    },
    Delete(id) {
      if (!confirm("Are you sure want to remove?")) return;
      this.$inertia.delete(route("product.images.destroy", id));
    }
  }
};
</script>

<style></style>