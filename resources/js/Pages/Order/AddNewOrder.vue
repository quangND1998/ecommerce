<template>
  <section class="content">
    <Head title="Quản lý đơn hàng"></Head>
    <!-- Modal -->
    <!-- {{ wards }} -->
    <div>
      <div class="min-[320px]:m-0 sm:m-2 md:m-4 lg:m-8">
        <div class="min-[320px]:p-2 sm:p-2 md:p-2 lg:p-4 min-[320px]:mt-3 sm:mt-3 md:mt-0 lg:mt-0">
          <div class="min-[320px]:flex sm:flex md:flex lg:flex">
            <div class="mt-2">
              <button class="py-2 px-3 border rounded">
                <font-awesome-icon :icon="['fas', 'chevron-left']" />
              </button>
            </div>
            <div class="ml-3">
              <p class="text-sm">Trở về đơn hàng</p>
              <h2
                class="min-[320px]:text-xl sm:text-2xl font-semibold lg:text-2xl flex mr-2"
              >Tạo đơn hàng mới</h2>
            </div>
          </div>
          <div class="bg-white rounded-lg p-3 my-3">
            <Product :products="products" />
          </div>
          <div class="my-4">
            <div class="min-[320px]:block sm:block md:block lg:grid lg:grid-cols-3 lg:gap-4">
              <div class="col-span-2 bg-white rounded-lg p-3">
                <h2 class="text-2xl font-semibold">Thông tin giao hàng</h2>
                <div class="flex">
                  <div class="form-group w-1/2" :class="errors.name ? 'has-error' : ''">
                    <input
                      type="text"
                      v-model="form.name"
                      class="mr-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Họ và tên"
                      required
                    />
                    <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
                  </div>
                  <div class="form-group w-1/2" :class="errors.phone_number ? 'has-error' : ''">
                    <input
                      type="text"
                      v-model="form.phone_number"
                      class="ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Số điện thoại"
                      required
                    />
                    <div class="text-red-500" v-if="errors.phone_number">{{ errors.phone_number }}</div>
                  </div>
                </div>
                <div class="my-2 grid gap-6 mb-6 md:grid-cols-3">
                  <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    id="city"
                    v-model="form.city"
                    @change="onChangeCity($event)"
                  >
                    <option :value="null">Chọn tỉnh thành</option>
                    <option
                      v-for="(city, index) in provinces"
                      :value="city.Name"
                      :key="index"
                    >{{ city.Name }}</option>
                  </select>
                  <div class="text-red-500" v-if="errors.city">{{ errors.city }}</div>

                  <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    id="district"
                    v-model="form.district"
                    @change="onChangeDistrict($event)"
                  >
                    <option :value="null">Chọn quận huyện</option>
                    <option
                      v-for="(district, index) in districts.Districts"
                      :value="district.Name"
                      :key="index"
                    >
                      {{
                      district.Name }}
                    </option>
                  </select>
                  <div class="text-red-500" v-if="errors.district">{{ errors.district }}</div>

                  <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    v-model="form.wards"
                    id="wards"
                  >
                    <option :value="null">Chọn phường xã</option>
                    <option
                      v-for="(ward, index) in wards.Wards"
                      :value="ward.Name"
                      :key="index"
                    >{{ ward.Name }}</option>
                  </select>
                  <div class="text-red-500" v-if="errors.wards">{{ errors.wards }}</div>
                </div>
                <div class="my-2">
                  <input
                    type="text"
                    v-model="form.address"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Số nhà, địa chỉ cụ thể"
                    required
                  />
                  <div class="text-red-500" v-if="errors.address">{{ errors.address }}</div>
                </div>
                <div class="my-2">
                  <textarea
                    id="message"
                    rows="4"
                    v-model="form.notes"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ghi chú về đơn hàng, thời gian hoặc thời điểm giao hàng..."
                  ></textarea>
                </div>

                <div class="border rounded-lg">
                  <div class="p-2 bg-gray-200">
                    <h2 class="text-2xl font-semibold">Phương thức thanh toán</h2>
                  </div>
                  <div class="text-red-500" v-if="errors.payment_method">{{ errors.payment_method }}</div>
                  <div
                    class="min-[320px]:pl-1 lg:pl-5"
                    :class="[errors.payment_method ? 'border-red-600' : '']"
                  >
                    <div v-for="(payment,index) in payments" :key="index" class="flex my-4">
                      <input
                        checked
                        id="default-radio-2"
                        v-model="form.payment_method"
                        type="radio"
                        :value="payment.id"
                        name="default-radio"
                        class="mt-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      />
                      <img
                        :src="payment.thumb"
                        class="ml-3 min-[320px]:w-1/5 min-[320px]:h-1/5 sm:w-1/12 sm:h-1/12"
                        alt
                      />
                      <p class="mt-2 text-base ml-2">{{ payment.name }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-white rounded-lg p-3">
                <div class="flex justify-between">
                  <div>
                    <font-awesome-icon :icon="['fas', 'cart-shopping']" class="mt-1" />
                    <span class="text-xl font-semibold ml-2">Giỏ hàng</span>
                  </div>
                  <button v-if="cart" class="flex text-red-600 mx-3 text-sm" @click="DeleteCart()">
                    <font-awesome-icon
                      :icon="['fas', 'trash']"
                      style="color: #d22839;"
                      class="mx-2 mt-1"
                    />Hủy đơn hàng
                  </button>
                </div>
                <hr />
                <div class="flex my-3">
                  <input
                    v-if="cart_selected"
                    id="default-checkbox"
                    type="checkbox"
                    v-model="selectAllCart"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  />
                  <div>
                    <button
                      v-if="cart_selected.length > 0"
                      class="flex text-red-600 mx-3 text-sm"
                      @click="DeleteCheckbox()"
                    >
                      <font-awesome-icon
                        :icon="['fas', 'trash']"
                        style="color: #d22839;"
                        class="mx-2 mt-1"
                      />Xóa
                      <span>({{ cart_selected.length }})</span> sản phẩm đã chọn
                    </button>
                  </div>
                </div>

                <hr />
                <div v-for="(item, index) in cart" :key="index" class="flex my-3">
                  <div class="flex">
                    <input
                      id="default-checkbox"
                      type="checkbox"
                      v-model="cart_selected"
                      :value="item.id"
                      class="icon_checkbox w-4 h-4 mt-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />
                    <img
                      v-if="item.attributes && item.attributes.length > 0 && item.attributes[0].image"
                      :src="item.attributes[0].image"
                      width="30px"
                      height="30px"
                      alt
                    />
                  </div>

                  <div class="block  w-full mx-4">
                    <div class="">
                      <h3>{{ item.name }}</h3>
                      <p class="text-red-700 text-base">{{ item.price }} đ</p>
                    </div>
                    
                    <div class="flex my-2 justify-between">
                      <div class="buttons_added">
                        <input
                          class="minus is-form"
                          type="button"
                          value="-"
                          @click="updateCart(item, -1)"
                        />
                        <input
                          aria-label="quantity"
                          class="input-qty_create"
                          :ref="`quantity${item.id}`"
                          @blur="updateCartInput(item)"
                          v-on:keyup.enter="updateCartInput(item)"
                          :value="item.quantity"
                          max="100"
                          min="0"
                          name
                          type="number"
                        />
                        <input
                          class="plus is-form"
                          type="button"
                          value="+"
                          @click="updateCart(item, 1)"
                        />
                        
                      </div>
                      <button
                          class="text-red-700 text-base justify-end mr-1"
                          @click="deleteItem(item)"
                        >
                          <font-awesome-icon :icon="['fas', 'trash']" />
                        </button>
                    </div>
                  </div>
                </div>

                <hr />
                <div class="mt-5 pt-5">
                  <hr />
                  <div class="flex justify-between my-2">
                    <p>Tạm tính:</p>
                    <h3
                      class="text-xl text-red-700 font-semibold"
                      v-if="total_price > 0"
                    >{{ formatPrice(total_price) }}</h3>
                  </div>
                  <div class="my-2">
                    <button
                      @click.prevent="save()"
                      class="uppercase min-[320px]:text-lg sm:text-xl md:text-xl lg:text-xl bg-primary text-white rounded-lg w-full py-2"
                    >
                      Tạo
                      đơn mới
                    </button>
                  </div>
                  <div class="text-center">
                    <h3 class="text-gray-500 text-sm">Lưu ý: Số tiền trên chưa bao gồm phí ship</h3>
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
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import Product from "@/Pages/Order/Product";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    Head,
    Product
  },
  props: {
    products: Array,
    errors: Object,
   
    cart: Array | Object,
    total_price: Number,
    payments: Array
  },
  data() {
    return {
      // districts: null,
      // wards: null,
      provinces:null,
      cart_selected: [],
      form: this.$inertia.form({
        name: null,
        payment_method: null,
        address: null,
        city: null,
        district: null,
        wards: null,
        phone_number: null,
        notes: null
      })
    };
  },
  mounted(){

  },
  computed: {
    selectAllCart: {
      get: function() {
        return this.cart ? this.cart_selected.length == this.cart : false;
      },
      set: function(value) {
        var selected = [];

        if (value) {
          for (const [key, value] of Object.entries(this.cart)) {
            selected.push(value.id);
          }
        }

        this.cart_selected = selected;
      }
    },
    districts() {
      if (this.form.city == null) {
        return [];
      } else {
        return this.provinces.find(pro => {
          return pro.Name == this.form.city;
        });
      }
    },
    wards() {
      console.log(this.form.city, this.form.district);
      if (this.form.city == null && this.form.district == null) {
        return [];
      } else if (this.form.city !== null && this.form.district == null) {
        return [];
      } else {
        let array = this.provinces.find(pro => {
          return pro.Name == this.form.city;
        });

        return array.Districts.find(district => {
          return district.Name == this.form.district;
        });
      }
    }
  },
  methods: {
    async getProvinces(){
      const response = await fetch('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json');
        const jsonData = await response.json();
      this.provinces =jsonData
      },
    onChangeCity(event) {
      this.form.district = null;
      this.form.wards = null;
    },
    onChangeDistrict(event) {
      // this.form.wards = null;
    },
    DeleteCart() {
      this.$swal({
        title: "Bạn có chắc?",
        text: "Hủy đơn hàng",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.$inertia.post(
            this.route(
              "cart.removeCart",
              {},
              {
                preserveState: false,
                preserveScroll: true
              }
            )
          );
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },
    DeleteCheckbox() {
      let query = {
        ids: this.cart_selected
      };
      this.$swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.$inertia.post(
            this.route("cart.deleteCarts", query, {
              preserveState: false,
              preserveScroll: true
            })
          );
          this.cart_selected = [];
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },
    save() {
      if (this.cart.length === 0) {
        this.$swal(
          "Error, Phải có sản phẩm trong giỏ hàng mới tạo đc đơn hàng.",
          {
            icon: "error"
          }
        );
      } else {
        this.$swal({
          title: "Bạn có chắc ?",
          text: "Tạo đơn hàng này!",
          icon: "warning",
          buttons: true,
          dangerMode: true
        }).then(willSave => {
          if (willSave) {
            this.form.post(route("orders.createOrder"), {
              preserveState: false,
              preserveScroll: true,
              onError: errors => {
                if (Object.keys(errors).length > 0) {
                }
              },
              onSuccess: page => {
                // $("#exampleModal").modal("hide")
                this.form.reset();
              }
            });
          } else {
            this.$swal("Action cancelled!");
          }
        });
      }
    },
    deleteItem(product) {
      let query = {
        product_id: product.id
      };
      this.$swal({
        title: "Are you sure?",
        text: "Remove product to cart!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willRemove => {
        if (willRemove) {
          this.$inertia.post(
            this.route("cart.removeItem", query, {
              preserveState: true,
              preserveScroll: true
            })
          );
        } else {
          this.$swal("Action cancelled!");
        }
      });
    },
    updateCart(product, value) {
      // quantity_cart:,
      this.$refs[`quantity${product.id}`][0].value =
        parseInt(this.$refs[`quantity${product.id}`][0].value) +
        parseInt(value);
      let query = {
        quantity_cart: this.$refs[`quantity${product.id}`][0].value,
        product_id: product.id
      };
      // this.$store.dispatch("stores/updateCart", query);
      if (
        this.$refs[`quantity${product.id}`][0].value == 0 ||
        this.$refs[`quantity${product.id}`][0].value < 0 ||
        query.quantity_cart == 0
      ) {
        this.$swal("Error, Some values are missing.", {
          icon: "error"
        });
      } else {
        axios
          .post("/admin/cart/updateCart", query)
          .then(response => {
            // console.log(response)
            this.total_price = response.data.total_price;
            // console.log(response.data.item);

            this.cart[product.id] = response.data.item;
          })
          .catch(error => {
          
          });
      }
    },
    updateCartInput(product) {
      let query = {
        quantity_cart: this.$refs[`quantity${product.id}`][0].value,
        product_id: product.id
      };
      // this.$store.dispatch("stores/updateCart", query);
      console.log(query);
      if (
        parseInt(this.$refs[`quantity${product.id}`][0].value) == 0 ||
        this.$refs[`quantity${product.id}`][0].value < 0
      ) {
        this.$swal("Error, Số lượng không được nhỏ hơn hoặc bằng 0 .", {
          icon: "error"
        });
      } else {
        axios
          .post("/admin/cart/updateCart", query)
          .then(response => {
            // console.log(response)
            this.total_price = response.data.total_price;
            // console.log(response.data.item);

            this.cart[product.id] = response.data.item;
          })
          .catch(error => {});
      }
    }
  }
};
</script>
  
<style scoped >
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

.icon_giam {
  width: 32px;
  height: 32px;
}

/*  */
.buttons_added {
  opacity: 1;
  display: inline-block;
  display: -ms-inline-flexbox;
  display: inline-flex;
  white-space: nowrap;
  vertical-align: top;
}

.is-form {
  overflow: hidden;
  position: relative;
  background-color: #f9f9f9;
  height: 2.2rem;
  width: 1.9rem;
  padding: 0;
  text-shadow: 1px 1px 1px #fff;
  border: 1px solid #ddd;
}

.is-form:focus,
.input-text:focus {
  outline: none;
}

.is-form.minus {
  border-radius: 4px 0 0 4px;
}

.is-form.plus {
  border-radius: 0 4px 4px 0;
}

.input-qty_create {
  background-color: #fff;
  height: 2.2rem;
  text-align: center;
  font-size: 1rem;
  display: inline-block;
  vertical-align: top;
  margin: 0;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  border-left: 0;
  border-right: 0;
  padding: 0;
  width: 35px;
}

.input-qty_create::-webkit-outer-spin-button,
.input-qty_create::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>