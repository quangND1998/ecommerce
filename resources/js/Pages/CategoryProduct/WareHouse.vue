<template>
    <section class="content">

        <Head title="Kho hàng"></Head>
        <!-- Modal -->
        <div>
            <div class="m-8 bg-white">
                <div class="p-4">
                    <h2 class="font-semibold text-3xl flex mr-2">Kho hàng <p class="text-gray-400">( 125 )</p>
                    </h2>
                    <div class="my-3">
                        <div class="flex">
                            <a href="" class="uppercase text-sm font-semibold px-3 py-2 border rounded-lg bg-gray-100  ">Hộp carton</a>
                            <a href="" class="uppercase text-sm font-semibold px-3 py-2 border rounded-lg ml-2 bg-gray-100 hover:bg-white">Xốp nổ</a>
                            <a href="" class="uppercase text-sm font-semibold px-3 py-2 border rounded-lg ml-2 bg-gray-100 hover:bg-white">Băng dính</a>
                        </div>
                        <div>
                            <!-- <TableProduct></TableProduct> -->
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
// import TableProduct from " @/Pages/CategoryProduct/TableProduct"
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
export default {
    layout: Layout,
    components: {
        Link,
        Alert,
        SearchCategory,
        Head,
        // TableProduct
    },
    props: {
        categories: Array,
        errors: Object
    },
    data() {
        return {

        };
    },
    mounted: function () {
        $(".list_icon_crud").hide();
        $(".item_crud").click(function (e) {
            $(".list_icon_crud").hide();
            e.preventDefault();
            //   $(this).next(".list_icon_crud").css("display","inline-grid");
            $(this).next(".list_icon_crud").slideToggle();
        })
    },
    methods: {


    }
};
</script>
  
<style scoped>.list_icon_crud {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

    right: -40px;
    top: 20px;
    z-index: 111;
    display: inline-grid;
}

.btn_crud{
    font-size: 20px;
}
</style>