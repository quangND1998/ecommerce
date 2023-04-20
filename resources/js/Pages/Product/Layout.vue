<template>
    <section class="content">

        <Head title="Kho hàng"></Head>
        <alert :dismissible="true"></alert>
        <!-- Modal -->
        <div>
            <div class="m-8 bg-white">
                <div class="p-4">
                    <h2 class="font-semibold text-3xl flex mr-2">Kho hàng <p class="text-gray-400">( {{ productCount }} )
                        </p>
                    </h2>
                    <div class="my-3">
                        <div class="flex">
                            <Link v-for="(cate, index) in parent_categories"
                                :class="{ 'text-blue-500': $page.url.includes(`/admin/warehouse/${cate.slug}`) }" :key="index"
                                :href="route('warehouse.show', cate.slug)" class="uppercase text-sm font-semibold mx-3 border px-3 py-2 rounded-lg ">{{
                                    cate.name }} </Link>
                        </div>

                        <div>
                            <slot />
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
        parent_categories: Array,
        productCount: Number,
        errors: Object,
        category: Object,
        sortBy:String,
        sort_Direction:String,
        status:String
    },
    data() {
        return {

        };
    },
    mounted: function () {

    },
    methods: {


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
}</style>
