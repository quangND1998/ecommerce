<template>
    <section class="content">

        <Head title="Thêm sản phẩm"></Head>
        <!-- Modal -->
        <div>
            <div class="m-8">
                <form>
                    <div class="p-4">
                        <Header name="Update sản phẩm" :category="category" />
                        <div>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="col-span-2">
                                    <div>
                                        <h3 class="font-semibold text-lg">Thông tin sản phẩm</h3>
                                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                            <div class="mb-6 form-group" :class="errors.name ? 'has-error' : ''">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Tên
                                                    sản phẩm
                                                </label>
                                                <input v-model="form.name" :class="errors.name ? 'has-error' : ''"
                                                    class="block mb-2 font-medium form-control text-sm rounded-lg" />
                                                <div v-if="errors.name" class="text-rose-600">{{ errors.name }}</div>
                                            </div>
                                            <div class="mb-6 form-group" :class="errors.description ? 'has-error' : ''">
                                                <label for
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Mô
                                                    tả
                                                    sản phẩm
                                                </label>

                                                <ckeditor v-model="form.description" :config="editorConfig"></ckeditor>
                                                <div v-if="errors.name" class="text-rose-600">{{ errors.description }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                
                                       
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg">Định giá</h3>
                                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                        <div class="mb-6 form-group" :class="errors.cost ? 'has-error' : ''">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Giá
                                                bán
                                            </label>
                                            <input v-model="form.cost" type="number"
                                                class="block mb-2 font-medium form-control text-sm rounded-lg" />
                                            <div v-if="errors.cost" class="text-rose-600">{{ errors.cost }}</div>
                                        </div>
                                        <div class="mb-6 form-group" :class="errors.price ? 'has-error' : ''">
                                            <label for
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Giá
                                                gốc</label>
                                            <input v-model="form.price" type="number"
                                                class="block mb-2 font-medium form-control text-sm rounded-lg" />
                                            <div v-if="errors.price" class="text-rose-600">{{ errors.price }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-lg">Số lượng</h3>
                                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                            <div class="mb-6 form-group" :class="errors.status ? 'has-error' : ''">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Tình
                                                    trạng
                                                </label>
                                                <select v-model="form.status" id="countries"
                                                    class="block mb-2 font-medium form-control text-sm rounded-lg">
                                                    <option :value="1">Còn hàng</option>
                                                    <option :value="0">Hết hàng</option>
                                                    <div v-if="errors.status" class="text-rose-600">{{ errors.status }}
                                                    </div>
                                                </select>
                                            </div>
                                            <div class="mb-6 form-group" :class="errors.auto_sold ? 'has-error' : ''">
                                                <label for
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Số
                                                    lượng đã bán
                                                </label>
                                                <select v-model="form.auto_sold" id="countries"
                                                    class="block mb-2 font-medium form-control text-sm rounded-lg">
                                                    <option :value="1">Auto</option>
                                                    <option :value="0">Nhập</option>
                                                </select>
                                                <div v-if="errors.auto_sold" class="text-rose-600">{{ errors.auto_sold }}
                                                </div>
                                            </div>
                                            <div class="mb-6 form-group" :class="errors.quantity_sold ? 'has-error' : ''"
                                                v-if="form.auto_sold == false">
                                                <label for
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Nhập
                                                    Số
                                                    lượng đã bán
                                                </label>
                                                <input v-model="form.quantity_sold" type="number" required min="0"
                                                    class="block mb-2 font-medium form-control text-sm rounded-lg" />
                                                <div v-if="errors.quantity_sold" class="text-rose-600">
                                                    {{
                                                        errors.quantity_sold }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-lg">Danh mục sản phẩm</h3>
                                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                            <div class="mb-6 form-group" :class="errors.category_id ? 'has-error' : ''">
                                                <!-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Giá
                                                    bán
                                                </label> -->
                                                <select v-model="form.category_id" id="countries"
                                                    class="block mb-2 font-medium form-control text-sm rounded-lg">
                                                    <option :value="null">Danh mục sản phẩm</option>
                                                    <option v-for="(category, index) in categories" :key="index"
                                                        :value="category.id">{{ category.name }}</option>
                                                </select>
                                                <div v-if="errors.category_id" class="text-rose-600">
                                                    {{ errors.category_id
                                                    }}
                                                </div>
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
        categories: Array,
        errors: Object,
        product: Object,
        category: Object,
        attributes: Array
    },
    data() {
        return {
            editorData: "<p>Content of the editor.</p>",
            editorConfig: {
                // The configuration of the editor.
            },
            images: [],
            form: this.$inertia.form({
                name: this.product.name,
                description: this.product.description,
                SKU: this.product.SKU,
                status: this.product.status,
                auto_sold: this.product.auto_sold,
                quantity_sold: this.product.quantity_sold,
                category_id: this.product.category_id,
                price: this.product.price,
                cost: this.product.cost,
                arrayValues: this.multipleSelect(this.product.values),
                // images:  this.product.status,
            })
        };
    },
    mounted: function () {
        $(".list_icon_crud").hide();
        $(".item_crud").click(function (e) {
            $(".list_icon_crud").hide();
            e.preventDefault();
            //   $(this).next(".list_icon_crud").css("display","inline-grid");
            $(this)
                .next(".list_icon_crud")
                .slideToggle();
        });
    },
    methods: {
        save() {
         
                    this.form.post(route("warehouse.update", this.product.id), {
                        preserveState: true,
                        onError: errors => {
                            if (Object.keys(errors).length > 0) {
                            }
                        },
                        onSuccess: page => {
                            this.form.reset();
                        }
                    });
                
        },
        onFileChange(e) {
            const files = e.target.files;
            this.images = [];
            if (files.length > 0) {
                for (var i = 0; i < files.length; i++) {
                    console.log(files[i]);
                    this.images.push({
                        name: files[i].name,
                        image: URL.createObjectURL(files[i])
                    });
                }
            } else {
                this.images = [];
            }
        },
        multipleSelect(data) {
            let object = Object.assign({}, data);
            console.log(typeof object);
            // // // let first = Object.assign({}, object[0]);
            let array = [];
            $.each(object, function(key, value) {
                array.push(value.id);
            });
            console.log(array)
            return array;
        },
        findValue(){
            
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