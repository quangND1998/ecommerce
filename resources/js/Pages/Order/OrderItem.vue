<template>
    <div>
        <tr v-for="(order, index) in orders.data" :key="`${index}order.id`">
        <td colspan="12" class="hiddenRow">
            <div class="accordian-body collapse" :id="`demo${order.id}`">
                <div class="my-3 rounded-lg border">
                    <div class="title_information p-2">
                        <h3>Thông tin khách hàng</h3>
                    </div>
                    <div class="grid grid-cols-4 gap-4 m-3">
                        <div class="block">
                            <p class="text-gray-500">Địa chỉ</p>
                            <div class="item_information p-2 bg-gray-100 rounded-lg">
                                <p class="text-gray-600">
                                    {{ order.customer.address }}
                                </p>
                            </div>
                        </div>
                        <div class="block">
                            <p class="text-gray-500">Số nhà/ Địa chỉ cụ thể</p>
                            <div class="item_information p-2 bg-gray-100 rounded-lg">
                                <p class="text-gray-600">{{ order.specific_address }}</p>
                            </div>
                        </div>
                        <div class="block">
                            <p class="text-gray-500">Ghi chú</p>
                            <div class="item_information p-2 bg-gray-100 rounded-lg">
                                <p class="text-gray-600">{{ order.notes }}</p>
                            </div>
                        </div>
                        <div class="block">
                            <p class="text-gray-500">Hình thức thanh toán</p>
                            <div class="item_information p-2 bg-gray-100 rounded-lg">
                                <p class="text-gray-600">{{ order.payment_method }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="info">
                            <th>Sản phẩm</th>
                            <th>SL</th>
                            <th>Giá trước chiết khấu</th>
                            <th>Chiết khấu</th>
                            <th>Giá sau chiết khấu</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(item, index) in order.order_items" :key="index" data-toggle="collapse"
                            class="accordion-toggle bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            data-target="demo10">
                            <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img src="/img/xop.png" alt="" />
                                <div class="ml-3">
                                    <h4>
                                        {{ item.product.name }}
                                    </h4>
                                    <p class="text-gray-500">SKU: {{ item.product.SKU }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4"> {{ item.quantity }}</td>
                            <td class="px-6 py-4">{{ formatPrice(item.price) }}đ</td>
                            <td class="px-6 py-4">{{ item.sale == null ? 0 : item.sale }} %</td>
                            <td class="px-6 py-4">{{ formatPrice(item.price_sale) }}</td>
                        </tr>


                        <tr data-toggle="collapse"
                            class="accordion-toggle bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            data-target="#demo10">
                            <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Công tiền hàng
                            </td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4">{{ formatPrice(order.grand_total) }} đ</td>
                        </tr>
                        <tr data-toggle="collapse"
                            class="accordion-toggle bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            data-target="#demo10">
                            <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Chiết khấu
                            </td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4">
                                <input type="text" :value="order.discount" class="w-3/4 rounded-lg border border-gray-300"
                                    placeholder="0%" />

                            </td>
                        </tr>
                        <tr data-toggle="collapse"
                            class="accordion-toggle bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            data-target="#demo10">
                            <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Phí ship
                            </td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4">
                                <input type="text" :value="order.shipping_fee"
                                    class="w-3/4 rounded-lg border border-gray-300" placeholder="30,000 đ" />
                            </td>
                        </tr>
                        <tr data-toggle="collapse" class="accordion-toggle" data-target="#demo10">
                            <td class="px-6 flex py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Khách phải trả
                            </td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4">{{ formatPrice(order.last_price) }} đ</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-between">
                    <button class="border rounded-lg bg-gray-100 px-3 py-2">
                        Hủy đơn
                    </button>
                    <div class="flex">
                        <button class="px-3 py-2 border rounded-lg bg-white">Chưa thanh toán</button>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-4.5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Chưa thanh toán</option>

                            <option value="CA">Đã thanh toán</option>
                        </select>
                        <button class="px-3 py-2 ml-3 text-white border rounded-lg bg-primary">
                            Đóng gói hàng
                        </button>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    </div>
</template>

<script>
export default {
    props:{
        orders:Object
    }
}
</script>

<style></style>