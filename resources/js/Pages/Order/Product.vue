<template>
  <div>
    <div class="min-[320px]:block">
      <label for>Tìm kiếm sản phẩm</label>
      <input type="text" v-model="search"
        class="min-[320px]:w-full min-[320px]:ml-0 border text-sm border-gray-300 sm:ml-3 md:ml-3 lg:ml-3 sm:w-3/12 md:w-3/12 lg:w-3/12 rounded-lg"
        placeholder="Tìm kiếm sản phẩm bằng SKU hoặc tên sản phẩm" />
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border my-5 overflow-y-auto " style="height:70vh">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              <input id="default-checkbox" type="checkbox"     v-model="selectAll"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            </th>
            <th scope="col" class="px-6 py-3">
              <div class="flex items-center">
                Hình ảnh

              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              <div class="flex items-center">
                Mã SKU
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true"
                    fill="currentColor" viewBox="0 0 320 512">
                    <path
                      d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                  </svg></a>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              <div class="flex items-center">
                Tên sản phẩm
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true"
                    fill="currentColor" viewBox="0 0 320 512">
                    <path
                      d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                  </svg></a>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              <div class="flex items-center">
                Giá trước chiết khấu
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true"
                    fill="currentColor" viewBox="0 0 320 512">
                    <path
                      d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                  </svg></a>
              </div>
            </th>
           
         
            <th scope="col" class="px-6 py-3">
              <div class="flex items-center">
                Tình trạng
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true"
                    fill="currentColor" viewBox="0 0 320 512">
                    <path
                      d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                  </svg></a>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              <div class="flex items-center">
                Số lượng
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true"
                    fill="currentColor" viewBox="0 0 320 512">
                    <path
                      d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                  </svg></a>
              </div>
            </th>

          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="(product, index) in searchProducts"
            :key="index">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <input id="default-checkbox" type="checkbox" v-model="selected" :value="product.id"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
            </th>
            <td class="px-6 py-4">
              <img v-if="product.first_image" :src="product.first_image.image" width="50px" alt />
            </td>
            <td class="px-6 py-4">{{ product.SKU }}</td>
            <td class="px-6 py-4">{{ product.name }}</td>
            <td class="px-6 py-4">{{ product.cost }}đ</td>
            <!-- <td class="px-6 py-4">0%</td>
            <td class="px-6 py-4">5,000 đ</td>-->
            <td class="px-6 py-4">{{ product.status == 1 ? 'Còn hàng' : "Hêt hàng" }}</td>
            <!-- <td class="px-6 py-4">
              <div class="custom-number-input h-10 w-32">
                <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Counter Input
                </label>
                <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                  <button data-action="decrement"
                    class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                    <span class="m-auto text-2xl font-thin">−</span>
                  </button>
                  <input type="number" min="1" 
                    class=" focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                    name="custom-input-number" value="0">
                  <button data-action="increment"
                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                  </button>
                </div>
              </div>
            </td> -->

            <td lass="px-6 py-4">
              <div class="buttons_added ">
                <input class="minus is-form" type="button" value="-" >
                <input aria-label="quantity" :ref="`quantity${product.id}`" class="input-qty" max="100" min="0" name="" type="number" >
                <input class="plus is-form" type="button" value="+">
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="text-end">
      <button :disabled="selected.length > 0 ? false : true" class="text-white text-base px-3 py-2 bg-primary rounded-lg"
        @click="addToCart()">Thêm vào giỏ hàng</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: {
    products: Array,
    provinces: Array
  },
  data() {
    return {
      search: null,
      sortBy: "SKU",
      sortDirection: "asc",
      // sort: this.sortBy,
      // sortDirection: this.sort_Direction,
      selected: [],

    };
  },
  computed: {
    selectAll: {
      get: function () {
        return this.products ? this.selected.length == this.products : false;
      },
      set: function (value) {
        var selected = [];

        if (value) {
          this.products.forEach(function (product) {
            selected.push(product.id);
          });
        }

        this.selected = selected;
      }
    },
    sortedProducts: function () {
      return this.products == null
        ? []
        : this.products.sort((p1, p2) => {
          let modifier = 1;
          if (this.sortDirection === "desc") modifier = -1;
          if (p1[this.sortBy] < p2[this.sortBy]) return -1 * modifier;
          if (p1[this.sortBy] > p2[this.sortBy]) return 1 * modifier;
          return 0;
        });
    },
    searchProducts: function () {
      if (this.search != null) {
        return this.products.filter(product => {
          return (
            product.SKU.toLowerCase().includes(this.search.toLowerCase()) ||
            product.name.toLowerCase().includes(this.search.toLowerCase())
          );
        });
      } else {
        return this.products;
      }
      // return this.products.filter(product => {
      //   return (
      //     this.products.SKU.toLowerCase().includes(this.search.toLowerCase()) ||
      //     this.products.name.toLowerCase().includes(this.search.toLowerCase())
      //   );
      // });
    }
  },
  mounted: function () {
 
        $('input.input-qty').each(function() {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function() {
            if ($(this).hasClass('minus')) {
            if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
            var x = Number($this.val()) + 1
            if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
        })
   },
  methods: {
    sort: function (s) {
      if (s === this.sortBy) {
        this.sortDirection = this.sortDirection === "asc" ? "desc" : "asc";
      }
      this.sortBy = s;
    },
    addToCart() {
      let query = {
        ids: this.selected,
        quantities: []

      };
      console.log(this.$refs['quantity1'][0].value)
      let quantities = [];
      var _this = this;
      this.selected.forEach(function (post) {
        console.log(post)
        query.quantities.push({ product_id: post, quantity: _this.$refs[`quantity${post}`][0].value })

      });
      console.log(query);


      this.$swal({
        title: "Are you sure?",
        text: "Add to product to cart!",
        icon: "success",
        buttons: true,
        dangerMode: true
      }).then(willSuccess => {
        if (willSuccess) {
          this.$inertia.post(
            this.route("cart.addProductCart", query, {
              preserveState: false,
              preserveScroll: true
            })
          );
          this.selected=[]
        } else {
          this.$swal("Action cancelled!");
        }
      });
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

.input-qty {
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

.input-qty::-webkit-outer-spin-button,
.input-qty::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>