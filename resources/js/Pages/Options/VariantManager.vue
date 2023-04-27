<template>
    <div class="-mx-4 mt-5 sm:-mx-0">
        <!-- <x-slot name="header">
            <div class="ml-4 mt-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Variants</h3>
            </div>
        </x-slot> -->
        <div >
            <div class="space-y-6 -mx-4 -mt-6 sm:-mx-6">
                <div  class="relative max-h-96 overflow-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="relative">
                                <th
                                    class="pl-6 pr-2 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Variant
                                </th>
                                <th
                                    class="px-2 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th
                                    class="px-2 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Stock
                                </th>
                                <th
                                    class="pl-2 pr-6 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    SKU
                                </th>
                                <th
                                    class="pl-2 pr-6 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Barcode
                                </th>
                            </tr>
                        </thead>
                   
                        
                                <tr v-for="(sku,index) in product.skus" :key="index" >
                                    <td
                                        class="pl-6 pr-2 py-4 border-b border-gray-200 whitespace-nowrap text-sm text-gray-900 font-medium">
                                        <div class="flex">
                                            <p v-for="(variant,variant_index) in sku.variants" :key="variant_index" :class="[ !variant_index==0? 'ml-2 pl-2 border-l border-gray-200':'']">
                                                        {{variant.option_value.value }}
                                                    </p>
                                            <!-- @foreach($sku->variants as $variant)
                                                
                                                @endforeach -->
                                        </div>
                                    </td>
                                    <!-- <td class="px-2 py-4 border-b border-gray-200 whitespace-nowrap text-sm text-gray-500">

                                        <label for="message"
                                            class="  block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">

                                                </span>
                                            </div>
                                            <input v-model="form.skus[index].price" type="text" class="form-control text-sm rounded-lg"
                                                placeholder="Tên danh mục" />

                                        </div>
                                        <div class="text-red-500"></div>
                                    </td> -->
                                    <!-- <td class="px-2 py-4 border-b border-gray-200 whitespace-nowrap text-sm text-gray-500">
                                        <label for="message"
                                            class="  block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                                        <input  v-model="form.skus[index].stock" type="number" class="block w-28 sm:text-sm shadow-none"
                                            placeholder="Stock" />
                                        <div class="text-red-500"></div>
                                    </td>
                                    <td
                                        class="pl-2 pr-6 py-4 border-b border-gray-200 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <label for="message"
                                            class="  block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                        <input type="text" v-model="form.skus[index].name" class="block w-28 sm:text-sm shadow-none"
                                            placeholder="Stock" />
                                        <div class="text-red-500"></div>
                                    </td>
                                    <td
                                        class="pl-2 pr-6 py-4 border-b border-gray-200 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <label for="message"
                                            class="  block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                        <input type="number" v-model="form.skus[index].barcode"  class="block w-28 sm:text-sm shadow-none"
                                            placeholder="Stock" />
                                        <div class="text-red-500"></div>
                                    </td> -->
                                </tr>

                       
                 
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        product:Object
    },
    data(){
        return {
            form:this.$inertia.form({
                skus:[]
            })
        }
    }
}
</script>

<style></style>