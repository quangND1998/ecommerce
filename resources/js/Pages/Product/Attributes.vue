<template>
  <section class="content">
    <Head title="Thêm sản phẩm"></Head>
    <!-- Modal -->
    <div>
      <div class="m-8">
        <form>
          <div class="p-4">
            <Header name="Thuộc tính" :category="category"></Header>

            <div>
              <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                  <div>
                    <h3 class="font-medium text-lg">
                      Mẫu mã cho sản phẩm:
                      <strong>{{ product.name }}</strong>
                    </h3>
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                      <div class="mb-6 form-group">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Chọn thuộc tính
                        </label>
                        <select
                          class="block mb-2 font-medium form-control text-sm rounded-lg"
                          v-model="attribute"
                          @change="selectAttribute(attribute)"
                        >
                          <option :value="null"> Chọn thuộc tính</option>
                          <option
                            v-for="(attribute, index) in attributes"
                            :key="index"
                            :value="attribute.id"
                          >{{ attribute.name }}</option>
                        </select>
                        <!-- <div v-if="errors.name" class="text-rose-600">{{ errors.name }}</div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div v-if="valueSelected">
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4">
                      <div class="mb-6 form-group" :class="errors.status ? 'has-error' : ''">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Chọn Giá Trị
                        </label>
                        <select
                          v-model="form.value_id"
                          class="block mb-2 font-medium form-control text-sm rounded-lg"
                        >
                          <option :value="null">Chọn giá trị</option>
                          <option
                            v-for="(value,index) in attributeValues"
                            :value="value.id"
                            :key="index"
                          >{{ value.value }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="my-3 justify-end text-end">
                <button class="px-3 py-2 rounded-lg bg-primary" @click.prevent="save">Lưu lại</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div>
      <div class="flex flex-col">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
              <tr>
                <th scope="col" class="px-6 py-4 text-sm font-semibold">ID</th>

                <th scope="col" class="px-6 py-4 text-sm font-semibold">Value</th>

                <th scope="col" class="px-6 py-4 text-sm font-semibold"></th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(pa, index) in product.attributes"
                :key="index"
                class="border-b dark:border-neutral-500"
              >
                <td class="whitespace-nowrap px-6 py-4">{{ index + 1 }}</td>

                <td class="whitespace-nowrap px-6 py-4">
                  <span
                    class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded"
                  >
                    {{
                    pa.value
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
                      <!-- <a
                            class="dropdown-item text-sm py-2 cursor-pointer"
                            data-toggle="modal"
                            data-target="#exampleModal"
                            @click="edit(cate)"
                      >Chỉnh sửa</a>-->

                      <!-- <a
                            class="dropdown-item text-sm py-2 cursor-pointer text-red-600"
                            @click="Delete(cate.id)"
                      >Xóa</a>-->
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</template>
  
<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import Header from "@/Pages/Product/Header";
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    Head,
    Header
  },
  props: {
    attributes: Array,
    errors: Object,
    product: Object,
    category: Object
  },
  data() {
    return {
      
      attribute: null,
      valueSelected: false,
      attributeValues: [],
      // value: {},
      // currentValue: null,
      form: this.$inertia.form({
        value_id: null
        // value: null
      })
    };
  },
  mounted: function() {},
  methods: {
    // selectAttribute(attribute) {
    //   this.currentValue = attribute.value;
    // },
    save() {
      console.log(this.form.value_id )
      if (this.form.value_id === null) {
        this.$swal("Error, Some values are missing.", {
          icon: "error"
        });
      } else {
        // this.form.post(route("product.saveAttribute", this.product.id), {
        //   preserveState: true,
        //   onError: errors => {
        //     if (Object.keys(errors).length > 0) {
        //     }
        //   },
        //   onSuccess: page => {
        //     this.form.reset();
        //   }
        // });
      }
    },
    selectAttribute(attribute) {
      // console.log(attribute);
      if (attribute === null) {
        this.valueSelected = false;
        this.$swal("Error, Chọn 1 danh mục thuộc tính", {
          icon: "error"
        });
      } else {
        // console.log(attribute);
        this.form.reset()
        let _this = this;

        axios
          .post("/admin/attributes/values", {
            id: attribute
          })
          .then(function(response) {
             _this.attributeValues = response.data;
          })
          .catch(function(error) {
            console.log(error);
          });
        this.valueSelected = true;
      }
    }
    // loadAttributes() {
    //   let _this = this;
    //   axios
    //     .get("/admin/products/attributes/load")
    //     .then(function(response) {
    //       _this.attributes = response.data;
    //     })
    //     .catch(function(error) {
    //       console.log(error);
    //     });
    // }
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
</style>