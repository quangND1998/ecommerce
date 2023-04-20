<template>
  <div class="my-3 flex">
    <Link
      :href="route('warehouse.show', category.slug)"
      class="px-3 mr-4 py-3 bg-white border rounded-lg"
    >
      <font-awesome-icon :icon="['fas', 'chevron-left']" />
    </Link>
    <div class="block">
      <p class="text-gray-500 text-xs">Trở về kho hàng</p>
      <h2 class="font-semibold text-3xl flex mr-2">{{ name }} </h2>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  props: {
    name: String,
    category: Object
  },
  components: {
    Link
  }
};
</script>

<style>
</style>