<template>
  <section class="content">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <form @submit.prevent="save">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <div
            v-for="(cate_attribute, index) in attributeCategories"
            :key="index"
            class="form-group"
          >
            <label for="recipient-name" class="col-form-label">{{ cate_attribute.name }}:</label>
            <select
              v-model="form.arrayAttribute[index]"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
              <option :value="null" checked>Chọn Danh mục thuộc tính</option>
              <option
                v-for="(attribute, index) in cate_attribute.attributes"
                :key="index"
                :value="attribute.id"
              >
                {{ attribute.value
                }}
              </option>
            </select>
          </div>
        </div>
        <button @click.prevent="save">Save</button>
      </form>
    </div>
  </section>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
export default {
  layout: Layout,
  components: {
    Link
  },
  props: {
    category: Object,
    attributeCategories: Array,
    categories: Array,
    errors: Object
  },
  computed: {},
  mounted() {
    // this.$store.commit(
    //   "stores/changeDataForm",
    //   this.attributeCategories.length
    // );
  },
  data() {
    return {
      form: this.$inertia.form({
        arrayAttribute: []
      })
    };
  },
  methods: {
    save() {
      console.log(this.form.arrayAttribute.length);
      if (
        this.form.arrayAttribute.includes(null) ||
        this.form.arrayAttribute.length == 0
      ) {
        this.$swal("Error, Some values are missing.", {
          icon: "error"
        });
      } else {
        console.log(this.form.arrayAttribute);
      }

      //   else {
      //     this.form.post(route("warehouse.save"), {
      //       preserveState: true,
      //       onError: errors => {
      //         if (Object.keys(errors).length > 0) {
      //         }
      //         $("#exampleModal").modal("toggle");
      //       },
      //       onSuccess: page => {
      //         // $("#exampleModal").modal("hide");
      //         $("#exampleModal").modal("toggle");
      //         this.form.reset();
      //       }
      //     });
      //   }
    }
  }
};
</script>
<style></style>