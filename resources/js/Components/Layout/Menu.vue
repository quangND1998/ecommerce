<template>
  <ul class="sidebar-menu">
    <!-- <li class="header">TOOLS</li> -->
    <li tag="li" :class="[$page.component === 'CartonShop/Dashboard' ? 'active' : '']">
      <Link :href="route('dashboard')">
        <i class="fa fa-desktop"></i>
        <span class="page">Tổng Quan</span>
      </Link>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-table"></i>
        <span class="treeview-title">Quản lý đơn hàng</span>
        <span class="pull-right-container pull-right">
          <i class="fa fa-angle-left fa-fw"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li :class="[$page.component === 'OrderManagement/OrderWait' ? 'active' : '']">
          <Link :href="route('orders.pending')">
            <i class="fa fa-table"></i> Đơn hàng
          </Link>
        </li>
        <li :class="[$page.component === 'Shipping/Index' ? 'active' : '']">
          <Link :href="route('shipping-fee.index')">
            <i class="fa fa-check-circle"></i> Phí ship
          </Link>
        </li>
      </ul>
    </li>

    <li class="header" v-if="hasAnyPermission(['users-manager'])">User managerment</li>
    <li class="treeview" v-if="hasAnyPermission(['users-manager'])">
      <a href="#">
        <i class="fa fa-list"></i>
        <span class="treeview-title">User managerment</span>
        <span class="pull-right-container pull-right">
          <i class="fa fa-angle-left fa-fw"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li :class="[$page.component === 'Admin/Permission' ? 'active' : '']">
          <Link :href="route('permissions.index')">
            <i class="fa fa-shield"></i> Permissions
          </Link>
        </li>
        <li :class="[$page.component === 'Admin/Roles' ? 'active' : '']">
          <Link :href="route('roles.index')">
            <i class="fa fa-check-circle"></i> Roles
          </Link>
        </li>
        <li :class="[$page.component === 'Admin/User' ? 'active' : '']">
          <Link :href="route('users.index')">
            <i class="fa fa-users"></i> Users
          </Link>
        </li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-folder-o"></i>
        <span class="treeview-title">Sản phẩm</span>
        <span class="pull-right-container pull-right">
          <i class="fa fa-angle-left fa-fw"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <Link :href="route('warehouse.index')">
            <i class="fa fa-file-word-o"></i> Kho hàng
          </Link>
        </li>
        <li :class="[$page.component === 'CategoryProduct/Index' ? 'active' : '']">
          <Link :href="route('categories.index')">
            <i class="fa fa-file-picture-o"></i> Danh mục sản phẩm
          </Link>
        </li>
        <li :class="[$page.component === 'AttributeCategory/Index' ? 'active' : '']">
          <Link :href="route('attributes.index')">
            <i class="fa fa-file-picture-o"></i> Thuộc tính
          </Link>
        </li>

        <!-- <li :class="[$page.component === 'AttributeCategory/Index' ? 'active' : '']">
          <Link :href="route('product')">
            <i class="fa fa-file-picture-o"></i> product
          </Link>
        </li>-->

        <li>
          <Link :href="route('sales.index')">
            <i class="fa fa-file-pdf-o"></i> Chương trình sales
          </Link>
         
        </li>
      </ul>
    </li>

    <li
      v-if="hasAnyPermission(['users-manager'])"
      tag="li"
      class="pageli"
      :class="[$page.component === 'Payment/PaymentManagement' ? 'active' : '']"
    >
      <Link :href="route('payment.index')">
        <i class="fa fa-check-circle"></i>
        <span class="page">Quản lý thanh toán</span>
      </Link>
    </li>

    <li class="treeview" v-if="hasAnyPermission(['users-manager'])">
      <a href="#">
        <font-awesome-icon :icon="['fab', 'blogger-b']" />
        <span class="treeview-title">Bài viết</span>
        <span class="pull-right-container pull-right">
          <!-- <i class="fa fa-angle-left fa-fw"></i> -->
        </span>
      </a>
      <ul class="treeview-menu" v-if="hasAnyPermission(['users-manager'])">
        <li :class="[$page.component === 'AttributeCategory/Index' ? 'active' : '']">
          <Link :href="route('tag.index')">
            <font-awesome-icon :icon="['fas', 'tag']" />Tag
          </Link>
        </li>

        <li v-if="hasAnyPermission(['users-manager'])">
          <Link :href="route('post.index')">Bài viết</Link>
        </li>
      </ul>
    </li>

    <li class="treeview" v-if="hasAnyPermission(['users-manager'])">
      <a href="#">
        <i class="fa fa-list"></i>
        <span class="treeview-title">Trang</span>
        <span class="pull-right-container pull-right">
          <i class="fa fa-angle-left fa-fw"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <Link :href="route('home.index')">
            <i class="fa fa-shield"></i> Trang chủ
          </Link>
        </li>

        <li :class="[$page.component === 'Setting/AboutUs' ? 'active' : '']">
          <Link :href="route('about-us.index')">
            <i class="fa fa-users"></i> Về chúng tôi
          </Link>
        </li>
      </ul>
    </li>

    <li tag="li" class="pageli">
      <Link :href="route('customers.index')">
        <i class="fa fa-book"></i>
        <span class="page">Dữ liệu khách hàng</span>
      </Link>
    </li>
    <li tag="li" class="pageli">
      <Link :href="route('setting.index')">
        <i class="fa fa-hdd-o"></i>
        <span class="page">Cài đặt thông tin chung</span>
      </Link>
    </li>

    <li class="header">PAGES</li>
    <li tag="li" class="pageli">
      <a>
        <i class="fa fa-circle-o text-yellow"></i>
        <span class="page">Login</span>
      </a>
    </li>
    <li tag="li" class="pageli">
      <a>
        <i class="fa fa-circle-o text-red"></i>
        <span class="page">404</span>
      </a>
    </li>
  </ul>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link
  },
  mounted() {}
};
</script>
<style>
/* override default */
.sidebar-menu > li > a {
  padding: 12px 15px 12px 15px;
}

.sidebar-menu li.active > a > .fa-angle-left,
.sidebar-menu li.active > a > .pull-right-container > .fa-angle-left {
  animation-name: rotate;
  animation-duration: 0.2s;
  animation-fill-mode: forwards;
}

.treeview-title {
  z-index: 1;
}

@keyframes rotate {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(-90deg);
  }
}
</style>
