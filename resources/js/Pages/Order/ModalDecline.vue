<template>
    <div class="modal fade" id="exampleModalDecline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="flex">
                        <img src="img/icon_delete.png" alt="">
                        <div class="ml-2">
                            <h3 class="text-black font-bold my-1 text-base">Bạn có muốn Hủy đơn hàng?</h3>
                            <p class="text-gray-500 text-sm">Đơn hàng sẽ được chuyển đến tab "Đơn hủy"</p>
                        </div>
                    </div>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="orderCancel"> 

                        <div  class="form-group" :class="errors.reason ? 'has-error' : ''">

                            <label for="message" class="  block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lý
                                do</label>
                            <textarea v-model="form.reason" id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tại sao khách muốn hủy đơn hàng?"></textarea>

                        </div>
                        <div class="text-red-500" v-if="errors.reason">{{ errors.reason }}</div>

                        <div class="modal-footer">
                            <button type="button"
                                class="inline-block px-3 py-2 border text-gray-700 font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                                data-dismiss="modal">Quay lại</button>
                            <button type="submit" @click.prevent="orderCancel()"
                                class="inline-block px-3 py-2 bg-red-700 text-white font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-red-500 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">Xác
                                nhận hủy đơn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        errors:Object
    },
    data() {
        return {
            
            form: this.$inertia.form({
                id: null,
           
                order_number: null,
                reason: null
            })
        };
    },
    mounted(){
        Bus.$on('OpenModalDecline', (order)=>{
            // console.log(order)
           
            this.form.id = order.id,
            this.form.order_number = order.order_number
        })
    },
    methods: {
  
        orderCancel() {
            this.form.post(route("orders.orderCancel", this.form.id), {
                preserveState: true,
                onError: errors => {
                    if (Object.keys(errors).length > 0) {
                        this.editMode = true;
                    }
                },
                onSuccess: page => {
                    $("#exampleModalDecline").modal("hide");
                    this.form.reset();
                }
            });
        }
    },
    beforeDestroy() {
      //do something before destroying vue instance
        Bus.$off('OpenModalDecline')
    }
}
</script>

<style></style>