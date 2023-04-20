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
              <div class="form-group" :class="errors.name ? 'has-error' : ''">
                <label for="recipient-name" class="col-form-label">Tên phí vận chuyển:</label>
                <input
                  type="text"
                  v-model="form.name"
                  class="form-control text-sm rounded-lg"
                  placeholder="End Price"
                  id="recipient-name"
                />
                <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
              </div>
              <div class="form-group" :class="errors.start_price ? 'has-error' : ''">
                <label for="recipient-name" class="col-form-label">Start price:</label>
                <input
                  type="number"
                  min="0"
                  v-model="form.start_price"
                  class="form-control text-sm rounded-lg"
                  placeholder="Start Price"
                  id="recipient-name"
                />

                <div class="text-red-500" v-if="errors.start_price">{{ errors.start_price }}</div>
              </div>
              <div class="form-group" :class="errors.end_price ? 'has-error' : ''">
                <label for="recipient-name" class="col-form-label">End Price:</label>
                <input
                  type="number"
                  min="0"
                  v-model="form.end_price"
                  class="form-control text-sm rounded-lg"
                  placeholder="Nhập giá tối đa"
                  id="recipient-name"
                />
                <div class="text-red-500" v-if="errors.end_price">{{ errors.end_price }}</div>
              </div>
              <div class="form-group" :class="errors.fee ? 'has-error' : ''">
                <label for="recipient-name" class="col-form-label">Phí ship (% Tổng giá trị đơn hàng) :</label>
                <input
                  type="number"
                  min="0"
                  v-model="form.fee"
                  class="form-control text-sm rounded-lg"
                  placeholder="Nhập giá trị"
                  id="recipient-name"
                />
                <div class="text-red-500" v-if="errors.fee">{{ errors.fee }}</div>
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
          <h2 class="font-semibold text-3xl flex mr-2">Phí vận chuyển</h2>
          <div class="my-3">
            <div class="flex"></div>
            <div class="flex justify-between mt-5">
              <div>
                <button
                  class="px-2 py-2 text-sm text-white bg-primary rounded-lg border mx-1"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  @click="add()"
                >
                  <font-awesome-icon :icon="['fas', 'plus']" />Thêm phí vận chuyển
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

                            <th scope="col" class="px-6 py-4 text-sm font-semibold">Tên phí ship</th>

                            <th scope="col" class="px-6 py-4 text-sm font-semibold">Start Price</th>
                            <th scope="col" class="px-6 py-4 text-sm font-semibold">End Price</th>
                            <th scope="col" class="px-6 py-4 text-sm font-semibold">Fee</th>
                            <th scope="col" class="px-6 py-4 text-sm font-semibold"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="(shipping, index) in shipping_fees"
                            :key="index"
                            class="border-b dark:border-neutral-500"
                          >
                            <td class="whitespace-nowrap px-6 py-4">{{ index + 1 }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ shipping.name }}</td>
                            <td
                              class="whitespace-nowrap px-6 py-4"
                            >{{ formatPrice(shipping.start_price) }}</td>
                            <td
                              class="whitespace-nowrap px-6 py-4"
                            >{{ formatPrice(shipping.end_price) }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ shipping.fee }} %</td>
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
                                  <a
                                    class="dropdown-item text-sm py-2 cursor-pointer"
                                    data-toggle="modal"
                                    data-target="#exampleModal"
                                    @click="edit(shipping)"
                                  >Chỉnh sửa</a>

                                  <a
                                    class="dropdown-item text-sm py-2 cursor-pointer text-red-600"
                                    @click="Delete(shipping.id)"
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
    shipping_fees: Array,

    errors: Object
  },
  data() {
    return {
      editMode: false,

      form: this.$inertia.form({
        id: null,
        name: null,
        fee: null,
        start_price: null,
        end_price: null
      })
    };
  },
  mounted() {},
  methods: {
    add() {
      this.editMode = false;
      this.form.reset();
    },
    save() {
      if (this.editMode) {
        this.form.put(route("shipping-fee.update", this.form.id), {
          preserveState: true,
          onError: errors => {
            if (Object.keys(errors).length > 0) {
              this.editMode = true;
            }
          },
          onSuccess: page => {
            // $("#exampleModal").modal("hide");
            $("#exampleModal").modal("toggle");
            this.form.reset();
          }
        });
      } else {
        this.form.post(route("shipping-fee.store"), {
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
      this.form.fee = data.fee;
      this.form.start_price = data.start_price;
      this.form.end_price = data.end_price;
    },

    Delete(id) {
      if (!confirm("Are you sure want to remove?")) return;
      this.$inertia.delete(route("shipping-fee.destroy", id));
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
