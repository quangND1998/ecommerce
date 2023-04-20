<template>
  <header class="main-header bg-white">
    <span class="logo-mini">
      <a href="/">
        <img
          src="/img/logo_cartonshop.png"
          alt="Logo"
          class="img-responsive center-block logo bg-[#222d32]"
        />
      </a>
    </span>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top bg-white nav-manu" role="navigation" style="height:60px">
      <!-- Sidebar toggle button-->
      <a href="javascript:;" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="color:#000">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <UserMenu></UserMenu>
        
      </div>
    </nav>
  </header>
</template>

<script>
import UserMenu from "@/Components/Layout/UserMenu";

export default {
  components: {
    UserMenu
  }
};
</script>
<style scoped>
.nav-menu{
  height:60px !important;
}
.logo{
  background: #222d32 !important;
    height: 60px;
}
</style>