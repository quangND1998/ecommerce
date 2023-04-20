<template>
  <ul class="nav navbar-nav flex flex-row">
    <li class=" user user-menu">
      <a href="" class="bg-blue-200 text-sm hover:bg-blue-400 text-blue-500 px-3 py-2 rounded-lg" >
        <font-awesome-icon :icon="['fas', 'eye']" />
        Xem cửa hàng
  </a>
</li>
<li class="dropdown user user-menu ml-3">
  <a href="javascript:;" class="dropdown-toggle text-sm" data-toggle="dropdown">
    <!-- The user image in the navbar-->
    <!-- /<font-awesome-icon :icon="['far', 'user']" class="icon_user" /> -->
    <img :src="$page.props.auth.user.avatar" class="user-image" alt="User Image" />
    <!-- hidden-xs hides the username on small devices so only the image appears. -->
    <!-- <div class="block"> -->
      <span class="hidden-xs  text-black font-semibold ">{{$page.props.auth.user.name}}</span>
      <!-- <span class="text-gray-500 text-sm">admin@gmail.com</span> -->
    <!-- </div> -->
    
  </a>
  <!-- Account Info and Menu -->
  <ul class="dropdown-menu">
    <li class="user-header" style="height:auto;min-height:85px;padding-bottom:15px;">
      <p>
        <span>{{$page.props.auth.user.name}}</span>
        <small v-for="role in $page.props.auth.user.roles" :key="role">{{role}}</small>
      </p>
    </li>
    <li class="user-footer">
      <!-- <Link :href="route('logout')" method="post" class="btn btn-default btn-flat btn-block">
        <i class="fa fa-sign-out"></i>
        <span>Logout</span>
      </Link>-->
      <a class="btn btn-default btn-flat btn-block" @click="logout()">Logout</a>
    </li>
  </ul>
</li>
  </ul>
  
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link
  },
  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    }
  }
};
</script>
<style scoped>
.user-menu{
  margin-bottom:0.4rem;
 
}
.user-menu a{
  color:#3B82F6 !important;
}
.icon_user{
  border-radius: 50%;
    background: rgba(156, 153, 149, 0.438);
    padding: 0.5rem;
}
</style>