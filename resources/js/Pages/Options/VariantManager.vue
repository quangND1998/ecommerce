<template>
  <div class="mx-5 mt-10 sm:-mx-0">
    <div name="header">
      <div class="ml-4 mt-2">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Variants</h3>
      </div>
    </div>
    <form @submit.prevent="save">

      <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-5">
        <div class="relative max-h-96 overflow-auto">
          <table class="min-w-full">
            <thead>
              <tr>
                <th
                  class="pl-6 pr-2 py-3 sticky top-0 z-10 border-b text-white bg-gray-600 dark:bg-gray-700 px-3  dark:text-gray-400 backdrop-blur backdrop-filter text-left text-xs font-medium uppercase tracking-wider">
                  Variant</th>
                <th
                  class="pl-6 pr-2 py-3 sticky top-0 z-10 border-b text-white bg-gray-600 dark:bg-gray-700 px-3  dark:text-gray-400 backdrop-blur backdrop-filter text-left text-xs font-medium uppercase tracking-wider">
                  Price</th>
                <th
                  class="pl-6 pr-2 py-3 sticky top-0 z-10 border-b text-white bg-gray-600 dark:bg-gray-700 px-3  dark:text-gray-400 backdrop-blur backdrop-filter text-left text-xs font-medium uppercase tracking-wider">
                  Stock</th>
                <th
                  class="pl-6 pr-2 py-3 sticky top-0 z-10 border-b text-white bg-gray-600 dark:bg-gray-700 px-3  dark:text-gray-400 backdrop-blur backdrop-filter text-left text-xs font-medium uppercase tracking-wider">
                  SKU</th>
                <th
                  class="pl-6 pr-2 py-3 sticky top-0 z-10 border-b text-white bg-gray-600 dark:bg-gray-700 px-3  dark:text-gray-400 backdrop-blur backdrop-filter text-left text-xs font-medium uppercase tracking-wider">
                  Barcode</th>
                <th
                  class="pl-6 pr-2 py-3 sticky top-0 z-10 border-b text-white bg-gray-600 dark:bg-gray-700 px-3  dark:text-gray-400 backdrop-blur backdrop-filter text-left text-xs font-medium uppercase tracking-wider">
                  Action</th>
              </tr>
            </thead>

            <tr v-for="(sku, index) in  product.skus " :key="index">
              <td class="pl-6 pr-2 py-4 border-b border-gray-200 whitespace-nowrap text-sm text-gray-900 font-medium">
                <div class="flex">
                  <p v-for="(variant, variant_index) in sku.variants" :key="variant_index"
                    :class="[!variant_index == 0 ? 'ml-2 pl-2 border-l border-gray-200' : '']">
                    {{
                      variant.option_value.value }}
                  </p>
                  <!-- @foreach($sku->variants as $variant)
                                                
                    @endforeach-->
                </div>
              </td>
              <td class="px-2 py-4 border-b border-gray-200 whitespace-nowrap text-sm text-gray-500">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm"></span>
                  </div>
                  <input v-model="form.skus[index].price" type="number" @change="save()" @click="$event.target.select();"
                    @keyup.enter=" $event.target.blur()" class="form-control text-sm rounded-lg" placeholder="đ 0" />
                </div>
                <!-- <div class="text-red-500" v-if="errors.skus.index.price">{{errors.skus.index.price}}</div> -->
              </td>
              <td class="px-2 py-4 border-b border-gray-200 whitespace-nowrap text-sm text-gray-500">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                <input v-model="form.skus[index].stock" @input="saveDebounce" type="number" class="block w-28 sm:text-sm shadow-none"
                  @click="$event.target.select();" @keyup.enter=" $event.target.blur()" placeholder="0" />

                <div class="text-red-500"></div>
              </td>
              <td class="pl-2 pr-6 py-4 border-b border-gray-200 whitespace-nowrap text-sm font-medium text-gray-900">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKU</label>
                <input type="text" v-model="form.skus[index].name"  @input="saveDebounce" class="block w-40 sm:text-sm shadow-none "
                  :class="errors[`skus.${index}.name`] ? 'border-red-500' : ''" placeholder="SKU"
                  @click="$event.target.select();" @keyup.enter=" $event.target.blur()" />

                <div class="text-red-500" v-if="errors[`skus.${index}.name`]">{{ errors[`skus.${index}.name`] }}</div>
              </td>
              <td class="pl-2 pr-6 py-4 border-b border-gray-200 whitespace-nowrap text-sm font-medium text-gray-900">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barcode</label>
                <input type="text" v-model="form.skus[index].barcode" @click="$event.target.select();"
                  @keyup.enter=" $event.target.blur()" class="block w-40 sm:text-sm shadow-none" placeholder="Barcode" />
                <div class="text-red-500" v-if="errors[`skus.${index}.barcode`]">{{ errors[`skus.${index}.barcode`] }}</div>
              </td>
              <td class="pl-2 pr-6 py-4 border-b border-gray-200 whitespace-nowrap text-sm font-medium text-gray-900">
                <button @click="Delete(sku.id)">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-400 hover:text-red-500 cursor-pointer"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd" />
                  </svg>
                </button>
              </td>
            </tr>
          </table>
        </div>
      </div>

    </form>
  </div>
</template>

<script>
export default {
  props: {
    product: Object,
    errors: Object
  },
  data() {
    return {
      form: this.$inertia.form({
        skus: []
      })
    };
  },
  created() {
    this.product.skus.forEach(element => {
      this.form.skus.push({
        id: element.id,
        price: element.price,
        stock: element.stock,
        name: element.name,
        barcode: element.barcode
      });
    });
  },
  methods: {
    save() {
      this.form.post(route("product.variant.store"), {
        preserveState: true,
        preserveScroll: true,
        onError: errors => { },
        onSuccess: page => { }
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
          this.$inertia.delete(route("product.sku.delete", id));
        } else {
          this.$swal("Action cancelled!");
        }

      });
    },
    saveDebounce: _.debounce(function (e) {
      this.form.post(route("product.variant.store"), {
        preserveState: false,
        preserveScroll: true,
        onError: errors => { },
        onSuccess: page => { }
      });
    }, 500)
  }
};
</script>

<style></style>