<template>
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
            class="modal-title text-lg font-semibold"
            id="exampleModalLabel"
          >Import Excel</h5>
          <!-- <h5
            v-else
            class="modal-title text-lg font-semibold"
            id="exampleModalLabel"
          >Thêm danh mục sản phẩm</h5>-->

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="save">
            <div
              class="w-1/4 bg-gray-200 rounded-full dark:bg-gray-700 mb-8 ml-3"
              v-if="form.progress"
            >
              <div
                class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                :style="{ width: form.progress.percentage + '%' }"
              >{{ form.progress.percentage }}%</div>
            </div>
            <div>
              <div class="text-center my-3" :class="errors.file_sale ? 'border-red-500' : ''">
                <div class="flex items-center justify-center w-full">
                  <label
                    for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                  >
                    <div class="flex flex-col items-center justify-center pt-2 pb-3">
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
                        <span class="font-semibold">Click to upload</span> or drag and drop
                      </p>
                      <p class="text-xs text-gray-500 dark:text-gray-400">xlsx,csv,xls</p>
                    </div>
                    <input
                      id="dropzone-file"
                      @input="form.file_sale = $event.target.files[0]"
                      type="file"
                      class="hidden"
                      accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                    />
                    {{form.file_sale !==null ? form.file_sale.name:'' }}
                  </label>
                </div>
              </div>
              <div class="text-red-500" v-if="errors.file_sale">{{ errors.file_sale }}</div>
            </div>
            <hr />

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
</template>

<script>
export default {
  props: {
    errors: Object,
    sale: Object
  },
  data() {
    return {
      form: this.$inertia.form({
        file_sale: null
      })
    };
  },
  methods: {
    save() {
      console.log(this.form.file_sale);
      this.form.post(route("sales.import", this.sale.id), {
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
    }
  }
};
</script>

<style>
</style>