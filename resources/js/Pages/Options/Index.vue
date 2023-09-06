<template>
  <section class="content">

    <Head title="Options"></Head>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-lg">
          <div class="modal-header">
            <h5 v-if="editMode" class="modal-title text-lg font-semibold" id="exampleModalLabel">Sửa Option
            </h5>
            <h5 v-else class="modal-title text-lg font-semibold" id="exampleModalLabel">Thêm Option</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="save">
              <div class="form-group" :class="errors.name ? 'has-error' : ''">
                <label for="recipient-name" class="col-form-label">Tên option:</label>
                <input type="text" v-model="form.name" class="form-control text-sm rounded-lg" placeholder="Tên danh mục"
                  id="recipient-name" />
                <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
              </div>

              <hr />

              <div class="sm:col-span-3">
                <div class="w-1/2 mr-2 h-12">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chọn Lable</label>
                  <select id="countries" v-model="form.visual"
                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mr-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option :value="null">Please select</option>
                    <option value="text">Text</option>
                    <option value="color">Color</option>
                    <option value="image">Image</option>


                  </select>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button"
                  class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                  data-dismiss="modal">Quay lại</button>
                <button @click.prevent="save()" type="submit"
                  class="inline-block px-6 py-2.5 bg-gray-800 text-white font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-primary-900 hover:shadow-lg bg-primary focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">
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
      <div class="m-8">
        <div class="space-y-5">
          <button class="px-2 py-2 text-sm text-white bg-primary rounded-lg border mx-1" data-toggle="modal"
            data-target="#exampleModal" @click="add()">
            <font-awesome-icon :icon="['fas', 'plus']" class="mr-2" />Thêm options
          </button>
          <div v-for="(option, index) in options" :key="index"
            class="relative w-full border border-gray-300 rounded-md p-4 flex">
            <div class="absolute -top-3 left-3 px-0.5 bg-white flex items-center space-x-1">
              <button  @click="Delete(option.id)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-400 hover:text-red-500 cursor-pointer"
                  viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
                </svg>
              </button>
              <span class=" rounded-md font-medium text-sm text-gray-700 flex items-center">{{ option.name }}</span>
            </div>


           
            <div class="absolute -top-3 left-20 px-0.5 bg-white flex items-center space-x-1">
              <button data-toggle="modal"
            data-target="#exampleModal" @click="edit(option)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-400 hover:text-green-500 cursor-pointer">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
</svg>

              </button>
            
            </div>
            <OptionValue :option_values="option.option_values" :option="option" :errors="errors" :key="option.id"/>
          </div>

        </div>
      </div>
    </div>
    <VariantManager :product="product" :errors="errors" />
  </section>
</template>
    
<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
import Header from "@/Pages/Product/Header";
import OptionValue from '@/Pages/Options/Value'
import VariantManager from '@/Pages/Options/VariantManager'
export default {
  layout: Layout,
  components: {
    Link,
    Alert,
    SearchCategory,
    Head,
    Header,
    OptionValue,
    VariantManager

  },
  props: {
    options: Array,
    errors: Object,
    product: Object
  },
  data() {
    return {
      editorData: "<p>Content of the editor.</p>",
      editorConfig: {
        // The configuration of the editor.
      },
      editMode: false,
      images: [],
      form: this.$inertia.form({
        name: null,
        visual: null,

      })
    };
  },
  methods: {
    add() {
      this.editMode = false;
      this.form.reset();
    },
    save() {
      if (this.editMode) {
        this.form.put(route("product.option.update", this.form.id), {
          preserveState: true,
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
        this.form.post(route("product.option.store",this.product.id), {
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
      this.form.visual= data.visual
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
          this.$inertia.delete(route("product.option.destroy", id));
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
</style>