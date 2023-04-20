<template>
    <section class="content">

        <Head title="Quản lý Tag "></Head>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-lg">
                    <div class="modal-header">
                        <h5 v-if="editMode" class="modal-title text-lg font-semibold" id="exampleModalLabel">
                            Sửa
                            Tag
                        </h5>
                        <h5 v-else class="modal-title text-lg font-semibold" id="exampleModalLabel">Thêm Tag</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="save">
                            <div class="form-group" :class="errors.name ? 'has-error' : ''">
                                <label for="recipient-name" class="col-form-label">Tên Tag:</label>
                                <input type="text" v-model="form.name" class="form-control text-sm rounded-lg"
                                    placeholder="Tên danh mục" id="recipient-name" />
                                <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                                    data-dismiss="modal" @click="form.reset()">Quay lại</button>
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
            <div class="m-8 bg-white">
                <div class="p-4">
                    <h2 class="font-semibold text-3xl flex mr-2">Quản lý bài viết</h2>
                    <div class="my-3">
                        <div class="flex justify-between">
                            <div class="flex"></div>
                            <div class>
                                <button class="bg-primary px-3 py-2 rounded-lg text-white" data-toggle="modal"
                                    data-target="#exampleModal" @click="add()">
                                    <font-awesome-icon :icon="['fas', 'plus']" class="mr-2" />Thêm Tag
                                </button>
                            </div>
                        </div>
                        <div class="my-4">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">Tên Tag</div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <div class="flex items-center">Slug</div>
                                            </th>

                                            <th scope="col" class="px-6 py-3"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(tag, index) in tags" :key="index">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ tag.name }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ tag.slug }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                <div class="dropdown">
                                                    <button type="button" id="exampleModal" data-toggle="dropdown"
                                                        class="btn_crud" aria-haspopup="true" aria-expanded="false"
                                                        @click="edit(tag)">
                                                        <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" />
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a aria-labelledby="exampleModal" data-toggle="modal"
                                                            data-target="#exampleModal"
                                                            class="dropdown-item text-sm py-2 cursor-pointer">Chỉnh sửa</a>

                                                        <a class="dropdown-item text-sm py-2 cursor-pointer text-red-600"
                                                            @click="Delete(tag.id)">Xóa</a>
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
    </section>
</template>
  
<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";

export default {
    layout: Layout,
    components: {
        Link,
        Alert,
        Head
    },
    props: {
        tags: Array,
        errors: Object
    },
    data() {
        return {
            editMode: false,
            form: this.$inertia.form({
                name: null
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
                this.form.put(route("tag.update", this.form.id), {
                    preserveState: true,
                    onError: errors => {
                        if (Object.keys(errors).length > 0) {
                            this.editMode = true;
                        }
                        $("#exampleModal").modal("toggle");
                    },
                    onSuccess: page => {
                        // $("#exampleModal").modal("hide");
                        $("#exampleModal").modal("toggle");
                        this.form.reset();
                    }
                });
            } else {
                this.form.post(route("tag.store"), {
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
            this.form.category_product_id = data.category_product_id;
        },

        Delete(id) {
            this.$swal({
                title: "Are you sure?",
                text: "Once deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then(willDelete => {
                if (willDelete) {
                    this.$inertia.delete(route("tag.destroy", id));
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

.tag_sale {
    width: fit-content;
}
</style>