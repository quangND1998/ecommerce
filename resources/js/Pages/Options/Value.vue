<template>
    <div>
        <div class="mb-3">
            <div v-for="(option_value, index) in option_values" :key="index"
                class="relative inline-flex border border-gray-300 rounded px-3 py-2 mr-1 group">
                <button type="button" @click="Delete(option_value.id)"
                    class="absolute inline-flex items-center justify-center top-0 right-0 w-3 h-3 rounded-full ring-1 ring-white bg-red-600 hover:bg-red-400 text-white opacity-0 group-hover:opacity-100 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2.5 w-2.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- <button type="button" @click="edit(option_value)"
                    class="absolute inline-flex items-center justify-center top-0 right-3 w-3 h-3 rounded-full ring-1 ring-white bg-green-600 hover:bg-green-400 text-white opacity-0 group-hover:opacity-100 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2.5 w-2.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                            clip-rule="evenodd" />
                    </svg>
                </button> -->
                <span class="text-sm font-sans pr-1 font-medium text-gray-400">
                    {{ option_value.value }}
                </span>
            </div>
            <p v-if="option_values.length == 0" class="text-sm text-gray-600">This option is ready to be used but has no
                value yet!</p>
        </div>
        <form>
            <div class="space-y-6 lg:flex lg:space-x-6 lg:space-y-0">
                <div class="lg:flex-1">

                    <BreezeInput v-model="form.value" class="mt-6" label="Value" type="text"
                        :placeholder="`Option value for ${option.name}`"  />
                        <div   v-if="errors.value" class="form-error text-red-500">{{ errors.value }}</div>
                    <!-- <div v-if="errors.value" class="form-error text-red-500">{{ errors.value }}</div> -->
                    <!-- <x-label value="{{ __('Value') }}" />
                <x-input wire:model.defer="optionValue.value" type="text" class="mt-1 block w-full sm:text-sm" placeholder="{{ __('Option value for ') . $option->name }}" />
                <x-input-error for="optionValue.value" class="mt-2" /> -->
                </div>
                <div class="lg:flex-1">

                    <BreezeInput v-model="form.label" class="mt-6" label="Label" type="text"
                        :placeholder="`Option label for ${option.name}`" />
                    <!-- <x-label value="{{ __('Label') }}" />
                <x-input wire:model.defer="optionValue.label" type="text" class="mt-1 block w-full sm:text-sm" placeholder="{{ __('Option label for ') . $option->name }}" />
                <x-input-error for="optionValue.label" class="mt-2" /> -->
                </div>
                <div class="lg:flex lg:items-end">
                    <button @click.prevent="save()" type="submit"
                        class="inline-block px-6 py-2.5 bg-gray-800 text-white font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-primary-900 hover:shadow-lg bg-primary focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">
                        Lưu
                        lại
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import BreezeInput from "@/Components/Input";
export default {
    props: {
        option_values: Array,
        option: Object,
        errors: Object
    },
    components: {
        BreezeInput
    },
    data() {
        return {
            editMode: false,
            form: this.$inertia.form({
                id:null,
                value: null,
                label: null
            })
        }
    },
    methods: {
        save() {
            if (this.editMode) {
                this.form.put(route("product.option.value.update", this.form.id), {
                    preserveState: true,
                    onError: errors => {
                        if (Object.keys(errors).length > 0) {
                            this.editMode = true;
                        }
                    },
                    onSuccess: page => {
                        this.editMode =false;
                        this.form.reset();
                    }
                });
            } else {
                this.form.post(route("product.option.value.store", this.option.id), {
                    preserveState: true,
                    onError: errors => {
                        if (Object.keys(errors).length > 0) {
                            this.editMode = false;
                        }
                    },
                    onSuccess: page => {
                        this.editMode =false;
                        this.form.reset();
                    }
                });
            }
        },
        edit(data) {
            this.editMode = true;
            this.form.id = data.id;
            this.form.value = data.value;
            this.form.label = data.label
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
                    this.$inertia.delete(route("product.option.value.destroy", id));
                } else {
                    this.$swal("Action cancelled!");
                }

            });
        }
    }
}
</script>

<style></style>