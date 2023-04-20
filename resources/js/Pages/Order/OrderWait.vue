<template>
  <div>
    <ModalDecline :errors="errors" />
    <ModelRefund :errors="errors" />
    <div class="min-[320px]:block sm:block md:block lg:grid lg:gap-4 lg:grid-cols-2 my-4">
      <div>
        <div class="min-[320px]:block sm:flex">
          <div class="min-[320px]:w-full sm:w-1/5 mr-3 text-gray-500">
            <label for>Mã đơn hàng</label>
          </div>
          <div class="min-[320px]:w-full form_search sm:w-4/5">
            <div>
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
                  v-model="term"
                  @keyup="search"
                  id="default-search"
                  name="search"
                  class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Tìm đơn hàng bằng mã đơn hàng"
                  required
                />
              </div>
            </div>
          </div>
        </div>
        <div class="min-[320px]:block flex my-3">
          <div class="min-[320px]:w-full w-1/5 mr-3 text-gray-500">
            <label for>Ngày tạo đơn</label>
          </div>
          <div class="min-[320px]:w-full w-4/5 flex flex-wrap">
            <div date-rangepicker class="flex items-center">
              <div class="relative">
                <date-picker
                  v-model="fromDate"
                  type="datetime"
                  placeholder="Select datetime"
                  value-type="YYYY-MM-DD HH:mm:ss"
                ></date-picker>
              </div>
              <span class="mx-4 text-gray-500">đến</span>
              <div class="relative">
                <date-picker
                  v-model="toDate"
                  type="datetime"
                  placeholder="Select datetime"
                  value-type="YYYY-MM-DD HH:mm:ss"
                ></date-picker>
              </div>
            </div>

            <button
              @click.prevent="changeDate"
              name="search"
              class="block p-2 ml-3 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >Search</button>
          </div>
        </div>
        <div class="min-[320px]:block sm:flex sm:my-2">
          <div class="min-[320px]:w-full sm:w-1/5 mr-3 text-gray-500">
            <label for>SKU</label>
          </div>
          <div class="min-[320px]:w-full form_search sm:w-4/5">
            <form v-on:submit.prevent>
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
                  v-model="SKU"
                  @keyup="searchSKU"
                  name="search"
                  class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Tìm sản phẩm bằng SKU"
                  required
                />
              </div>
            </form>
          </div>
        </div>
      </div>
      <div>
        <div class="min-[320px]:block sm:flex sm:my-2">
          <div class="min-[320px]:w-full sm:w-3/12 mr-3 text-gray-500">
            <label for>Khách hàng</label>
          </div>
          <div class="min-[320px]:w-full form_search sm:w-9/12">
            <form v-on:submit.prevent>
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
                  v-model="customer"
                  @keyup="searchCustomer"
                  class="block w-full p-2 pl-5 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Tìmkhách hàng bằng tên hoặc sđt"
                  required
                />
              </div>
            </form>
          </div>
        </div>
        <div class="min-[320px]:block sm:flex my-3">
          <div class="min-[320px]:w-full sm:w-3/12 mr-3 text-gray-500">
            <label for>Phương thức TT</label>
          </div>
          <div class="min-[320px]:w-full sm:w-9/12">
            <select
              id="countries"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
              <option selected>Tất cả</option>
              <option value="US">Còn hàng</option>
              <option value="CA">Hết hàng</option>
            </select>
          </div>
        </div>
        <div class="min-[320px]:block sm:flex my-3">
          <div class="min-[320px]:w-full sm:w-3/12 mr-3 text-gray-500">
            <label for>Trạng thái TT</label>
          </div>
          <div class="min-[320px]:w-full sm:w-9/12">
            <select
              v-model="filter"
              @change="Filter"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
              <option :value="null">Tình trạng</option>
              <option :value="1">Đã thanh toán</option>
              <option :value="0">Chưa thanh toán</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="p-2 rounded-lg col-md-12">
      <div class="panel panel-default">
        <div class="panel-body relative overflow-x-auto shadow-md sm:rounded-lg">
          <div>
            <div
              class="grid grid-cols-5 gap-4 text-xs text-white uppercase bg-gray-600 dark:bg-gray-700 px-3 py-4 dark:text-gray-400"
            >
              <div>
                <p>Mã đơn hàng</p>
              </div>
              <div>
                <p>Khách hàng</p>
              </div>
              <div>
                <p>SDT</p>
              </div>
              <div>
                <p>Thời gian tạo</p>
              </div>
              <div>
                <p>Trạng thái</p>
              </div>
            </div>

            <div class="cursor-pointer" v-for="(order, index) in orders.data" :key="index">
              <div
                data-toggle="collapse"
                :data-target="`#demo${order.id}`"
                class="accordion-toggle grid grid-cols-5 gap-4 text-sm px-3 py-3 dark:text-gray-400"
              >
                <div>
                  <a>
                    <font-awesome-icon :icon="['fas', 'chevron-down']" class="mr-2" />
                    {{ order.order_number }}
                  </a>
                </div>
                <div>
                  <p>{{ order.customer.name }}</p>
                </div>
                <div>
                  <p>{{ order.customer.phone_number }}</p>
                </div>
                <div>
                  <p>{{ formatTimeDayMonthyear(order.created_at) }}</p>
                </div>
                <div>
                  <p>{{ order.status }}</p>
                </div>
              </div>
              <div
                class="grid grid-cols-1 gap-4 bg-gray-300 p-3 border rounded-lg accordian-body collapse"
                :id="`demo${order.id}`"
              >
                <div class="my-3 rounded-lg border">
                  <div class="title_information p-2">
                    <h3>Thông tin khách hàng</h3>
                  </div>
                  <div class="grid grid-cols-4 gap-4 bg-white py-3 px-3">
                    <div class="block">
                      <p class="text-gray-500">Địa chỉ</p>

                      <div class="item_information p-2 bg-gray-100 rounded-lg">
                        <p
                          class="text-gray-600"
                        >{{ order.address +','+order.wards+','+order.district+','+order.city }}</p>
                      </div>
                    </div>
                    <div class="block">
                      <p class="text-gray-500">Số nhà/ Địa chỉ cụ thể</p>
                      <div class="item_information p-2 bg-gray-100 rounded-lg">
                        <p class="text-gray-600">{{ order.address }}</p>
                      </div>
                    </div>
                    <div class="block">
                      <p class="text-gray-500">Ghi chú</p>
                      <div class="item_information p-2 bg-gray-100 rounded-lg">
                        <p class="text-gray-600">{{ order.notes }}</p>
                      </div>
                    </div>
                    <div class="block">
                      <p class="text-gray-500">Hình thức thanh toán</p>
                      <div class="item_information p-2 bg-gray-100 rounded-lg">
                        <p class="text-gray-600" v-if="order.payment">{{ order.payment.name }}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <table
                  class="table table-striped w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg"
                >
                  <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                  >
                    <tr class="info">
                      <th>Sản phẩm</th>
                      <th>SL</th>
                      <th>Giá trước chiết khấu</th>
                      <th>Chiết khấu</th>
                      <th>Giá sau chiết khấu</th>
                      <th>Tổng cộng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(item, index) in order.order_items"
                      :key="index"
                      class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                      <td
                        class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >
                        <img src="/img/xop.png" alt />
                        <div class="ml-3">
                          <h4>{{ item.product.name }}</h4>
                          <p class="text-gray-500">SKU: {{ item.product.SKU }}</p>
                        </div>
                      </td>
                      <td class="px-6 py-4">{{ item.quantity }}</td>
                      <td class="px-6 py-4">{{ formatPrice(item.price) }} đ</td>
                      <td class="px-6 py-4">- {{ item.discount }}%</td>
                      <td class="px-6 py-4">{{ formatPrice(item.price_sale) }} đ</td>
                      <td class="px-6 py-4">{{ formatPrice(item.total_price) }} đ</td>
                    </tr>

                    <tr
                      class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                      <td
                        class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >
                        Công tiền
                        hàng
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">{{ formatPrice(order.grand_total) }} đ</td>
                    </tr>
                    <tr
                      class="a bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                      <td
                        class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >Chiết khấu</td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">
                        <input
                          type="number"
                          :max="100"
                          :min="0"
                          :disabled="(order.status =='pending' || order.payment_status ===0) ? false: true"
                          @blur="updateOrder(order)"
                          v-on:keyup.enter="updateOrder(order)"
                          :value="`${order.discount}`"
                          :ref="`discount${order.id}`"
                          class="w-3/4 rounded-lg border border-gray-300"
                          placeholder="0%"
                        />
                        <span>%</span>
                      </td>
                    </tr>
                    <tr
                      class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                      <td
                        class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >Phí ship</td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4">
                        <input
                          type="number"
                          :ref="`shipping_fee${order.id}`"
                          :disabled="order.status =='pending' || order.payment_status ==0 ? false: true"
                          @blur="updateOrder(order)"
                          v-on:keyup.enter="updateOrder(order)"
                          :value="order.shipping_fee"
                          class="w-3/4 rounded-lg border border-gray-300"
                          placeholder="30,000 đ"
                        />
                        <span>đ</span>
                      </td>
                    </tr>
                    <tr
                      class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                      <td
                        class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >
                        Khách phải
                        trả
                      </td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4"></td>
                      <td class="px-6 py-4 text-red-700">{{ formatPrice(order.last_price) }} đ</td>
                    </tr>
                  </tbody>
                </table>
                <div
                  v-if="status =='decline' ||status =='refund'"
                  class="bg-gray-100 w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg"
                >
                  <label
                    for="message"
                    class="block px-3 mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Lý do</label>
                  <!-- <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Không đúng yêu cầu"></textarea> -->
                  <div
                    class="w-full bg-white rounded-b p-2.5"
                    style="height:100px"
                  >{{ order.reason }}</div>
                </div>
                <div class="flex justify-between">
                  <button
                    v-if="status =='pending' || status=='packing'"
                    class="border text-red-700 rounded-lg bg-gray-100 px-3 py-2"
                    data-toggle="modal"
                    data-target="#exampleModalDecline"
                    @click="openDecline(order)"
                  >Hủy đơn</button>
                  <button
                    v-if=" status=='shipping' ||status=='completed'"
                    class="border rounded-lg bg-gray-100 px-3 py-2"
                    data-toggle="modal"
                    data-target="#exampleModalRefund"
                    @click="openRefund(order)"
                  >Hoàn đơn</button>

                  <button
                    v-if="status =='decline'"
                    @click="orderChangePending(order)"
                    class="border border-gray-800 bg-gray-100 px-3 py-2 text-gray-900 text-sm rounded-md"
                  >Làm mới đơn hàng</button>
                  <div class="flex">
                    <select
                      v-if="status =='pending' || status=='packing' ||status=='shipping' ||status=='completed'"
                      id="countries"
                      @change="orderChangePayment(order,$event)"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-4.5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                      <option
                        :value="0"
                        :selected="order.payment_status == 0 ? true : false"
                      >Chưa thanh toán</option>

                      <option
                        :value="1"
                        :selected="order.payment_status == 1 ? true : false"
                      >Đã thanh toán</option>
                    </select>
                    <button
                      v-if="status =='pending'"
                      @click="orderChangePacking(order)"
                      class="px-3 py-2 ml-3 text-white border rounded-lg bg-primary"
                    >Đóng gói hàng</button>
                    <button
                      v-if="status =='packing'"
                      @click="orderChangeShipping(order)"
                      class="px-3 py-2 ml-3 text-white border rounded-lg bg-primary"
                    >Bắt đầu giao hàng</button>
                    <button
                      v-if="status =='shipping'"
                      @click="orderChangeCompleted(order)"
                      class="px-3 py-2 ml-3 text-white border rounded-lg bg-primary"
                    >Hoàn thành đơn hàng</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <Pagination :links="orders.links" />
      </div>
    </div>
  </div>
</template>
  
<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import OrderLayout from "@/Pages/Order/Index";
import Pagination from "@/Components/Pagination.vue";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import ModalDecline from "@/Pages/Order/ModalDecline";
import ModelRefund from "@/Pages/Order/ModelRefund";
export default {
  layout: [Layout, OrderLayout],
  components: {
    Link,
    Alert,
    Head,
    Pagination,
    DatePicker,
    ModalDecline,
    ModelRefund
  },
  props: {
    orders: Object,
    errors: Object,
    payment_status: String,
    status: String,
    from: String,
    to: String
  },
  data() {
    return {
      filter: this.payment_status,
      term: null,
      customer: null,
      fromDate: this.from,
      toDate: this.to,
      SKU: null,
      form: this.$inertia.form({
        id: null,
        notes: null,
        order_number: null
      })
    };
  },
  mounted: function() {},
  methods: {
    openDecline(order) {
      Bus.$emit("OpenModalDecline", order);
    },
    openRefund(order) {
      Bus.$emit("OpenModalRefund", order);
    },
    search() {
      this.$inertia.get(
        this.route(`orders.${this.status}`),
        { term: this.term },
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    },
    searchCustomer() {
      this.$inertia.get(
        this.route(`orders.${this.status}`),
        { customer: this.customer },
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    },
    searchSKU() {
      this.$inertia.get(
        this.route(`orders.${this.status}`),
        { SKU: this.SKU },
        {
          preserveState: true,
          preserveScroll: true
        }
      );
    },
    Filter(event) {
      if (event.target.value == "") {
        this.$inertia.get(
          this.route(`orders.${this.status}`),
          {},
          {
            preserveScroll: true
          }
        );
      } else {
        this.filter = event.target.value;
        let query = {
          payment_status: event.target.value
        };
        this.$inertia.get(this.route(`orders.${this.status}`), query, {
          preserveScroll: true
        });
      }
    },
    changeDate() {
      let query = {
        from: this.fromDate,
        to: this.toDate
      };
      this.$inertia.get(this.route(`orders.${this.status}`), query, {
        preserveScroll: true
      });
    },
    updateOrder(order) {
      let query = {
        discount: this.$refs[`discount${order.id}`][0].value,
        order_id: order.id,
        grand_total: order.grand_total,
        shipping_fee: this.$refs[`shipping_fee${order.id}`][0].value
      };
      // console.log(query);
      if (
        parseInt(this.$refs[`discount${order.id}`][0].value) < 0 ||
        this.$refs[`discount${order.id}`][0].value >= 100
      ) {
        this.$swal("Error, Discount không được nhỏ hơn 0 hoặc lớn hơn 100 .", {
          icon: "error"
        });
      } else {
        axios
          .post("/admin/orders/updateOrder", query)
          .then(response => {
            let index = this.orders.data.findIndex(
              element => element.id == response.data.id
            );

            if (index !== -1) {
              this.orders.data.splice(index, 1, response.data);
            }
            this.$swal("Success! ", {
              icon: "success"
            });
          })
          .catch(error => {
            console.log(error.response.status);
            let array = [];
            if (error.response.status == 404) {
              array = error.response.data;
            } else {
              $.each(error.response.data.errors, function(key, value) {
                array.push(value[0]);
              });
            }
            this.$swal("Error," + array, {
              icon: "error"
            });
          });
      }
    },
    orderChangePayment(order, event) {
      let query = {
        payment_status: event.target.value,
        id: order.id
      };
      this.$swal({
        title: "Bán có muốn?",
        text: `Chuyển trạng thái thanh toán của đơn hàng ${order.order_number} !`,
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(wilChange => {
        if (wilChange) {
          this.$inertia.post(route("orders.orderChangePayment"), query, {
            preserveState: false,
            preserveScroll: true
          });
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },
    orderChangePacking(order) {
      let query = {
        status: "packing"
      };
      this.$swal({
        title: "Bán có muốn?",
        text: `Chuyển trạng thái đơn hàng ${order.order_number} sang đóng gói!`,
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(wilChange => {
        if (wilChange) {
          this.$inertia.post(
            route("orders.orderChangeStatus", order.id),
            query,
            {
              preserveState: true,
              preserveScroll: true
            }
          );
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },
    orderChangeShipping(order) {
      let query = {
        status: "shipping"
      };
      this.$swal({
        title: "Bán có muốn?",
        text: `Chuyển trạng thái đơn hàng ${order.order_number} sang bắt đầu vận chuyển!`,
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(wilChange => {
        if (wilChange) {
          this.$inertia.post(
            route("orders.orderChangeStatus", order.id),
            query,
            {
              preserveState: true,
              preserveScroll: true
            }
          );
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },
    orderChangeCompleted(order) {
      let query = {
        status: "completed"
      };
      this.$swal({
        title: "Bán có muốn?",
        text: `Chuyển trạng thái đơn hàng ${order.order_number} sang bắt Hoàn thành đơn hàng!`,
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(wilChange => {
        if (wilChange) {
          this.$inertia.post(
            route("orders.orderChangeStatus", order.id),
            query,
            {
              preserveState: true,
              preserveScroll: true
            }
          );
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },
    orderChangePending(order) {
      let query = {
        status: "pending"
      };
      this.$swal({
        title: "Bán có muốn?",
        text: `Làm mới đơn hàng ${order.order_number} !`,
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(wilChange => {
        if (wilChange) {
          this.$inertia.post(
            route("orders.orderChangeStatus", order.id),
            query,
            {
              preserveState: true,
              preserveScroll: true
            }
          );
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

.title_information {
  background-color: #f3f4f6;
}

.item_information {
  height: 100px;
}

.collapse {
  visibility: inherit;
}
</style>