(self.webpackChunk=self.webpackChunk||[]).push([[708],{9193:()=>{!function(t,e,a){"use strict";t.fn.hideseek=function(e){e=t.extend({list:".hideseek-data",nodata:"",attribute:"text",matches:!1,highlight:!1,ignore:"",headers:"",navigation:!1,ignore_accents:!1,hidden_mode:!1,min_chars:1},e);return this.each((function(){var a=t(this);a.opts=[],t.map(["list","nodata","attribute","matches","highlight","ignore","headers","navigation","ignore_accents","hidden_mode","min_chars"],(function(t,s){a.opts[t]=a.data(t)||e[t]})),a.opts.headers&&(a.opts.ignore+=a.opts.ignore?", "+a.opts.headers:a.opts.headers);var s=t(a.opts.list);a.opts.navigation&&a.attr("autocomplete","off"),a.opts.hidden_mode&&s.children().hide(),a.keyup((function(e){if(-1==[38,40,13].indexOf(e.keyCode)&&(8==e.keyCode||a.val().length>=a.opts.min_chars)){var n=a.val().toLowerCase();s.children(a.opts.ignore.trim()?":not("+a.opts.ignore+")":"").removeClass("selected").each((function(){var e=("text"!=a.opts.attribute?t(this).attr(a.opts.attribute)||"":t(this).text()).toLowerCase();-1==e.removeAccents(a.opts.ignore_accents).indexOf(n)||n===(!!a.opts.hidden_mode&&"")?t(this).hide():(i(t(this)),a.opts.matches&&null!==n.match(new RegExp(Object.keys(a.opts.matches)[0]))&&(null!==e.match(new RegExp(Object.values(a.opts.matches)[0]))?i(t(this)):t(this).hide())),a.trigger("_after_each")})),a.opts.nodata&&(s.find(".no-results").remove(),s.children(':not([style*="display: none"])').length||(s.children().first().clone().removeHighlight().addClass("no-results").show().prependTo(a.opts.list).text(a.opts.nodata),a.trigger("_after_nodata"))),a.opts.headers&&t(a.opts.headers,s).each((function(){t(this).nextUntil(a.opts.headers).not('[style*="display: none"],'+a.opts.ignore).length?t(this).show():t(this).hide()})),a.trigger("_after")}function i(t){a.opts.highlight?t.removeHighlight().highlight(n).show():t.show()}function r(t){return t.children(".selected:visible")}var o;a.opts.navigation&&(38==e.keyCode?r(s).length?((o=s,r(o).prevAll(":visible:first")).addClass("selected"),r(s).last().removeClass("selected")):s.children(":visible").last().addClass("selected"):40==e.keyCode?r(s).length?(function(t){return r(t).nextAll(":visible:first")}(s).addClass("selected"),r(s).first().removeClass("selected")):s.children(":visible").first().addClass("selected"):13==e.keyCode&&(r(s).find("a").length?document.location=r(s).find("a").attr("href"):a.val(r(s).text())))}))}))},t(document).ready((function(){t('[data-toggle="hideseek"]').hideseek()}))}(jQuery),jQuery.fn.highlight=function(t){function e(t,a){var s=0;if(3==t.nodeType){var n=t.data.removeAccents(!0).toUpperCase().indexOf(a);if(n>=0){var i=document.createElement("mark");i.className="highlight";var r=t.splitText(n);r.splitText(a.length);var o=r.cloneNode(!0);i.appendChild(o),r.parentNode.replaceChild(i,r),s=1}}else if(1==t.nodeType&&t.childNodes&&!/(script|style)/i.test(t.tagName))for(var l=0;l<t.childNodes.length;++l)l+=e(t.childNodes[l],a);return s}return this.length&&t&&t.length?this.each((function(){e(this,t.toUpperCase())})):this},jQuery.fn.removeHighlight=function(){return this.find("mark.highlight").each((function(){with(this.parentNode.firstChild.nodeName,this.parentNode)replaceChild(this.firstChild,this),normalize()})).end()},String.prototype.removeAccents=function(t){return t?this.replace(/[áàãâä]/gi,"a").replace(/[éè¨ê]/gi,"e").replace(/[íìïî]/gi,"i").replace(/[óòöôõ]/gi,"o").replace(/[úùüû]/gi,"u").replace(/[ç]/gi,"c").replace(/[ñ]/gi,"n"):this}},739:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),n=a.n(s)()((function(t){return t[1]}));n.push([t.id,".nav-menu[data-v-1b443399]{height:60px!important}.logo[data-v-1b443399]{background:#222d32!important;height:60px}",""]);const i=n},5264:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),n=a.n(s)()((function(t){return t[1]}));n.push([t.id,".wrapper.fixed_layout .main-header{position:fixed;width:100%}.wrapper.fixed_layout .content-wrapper{padding-top:50px}.wrapper.fixed_layout .main-sidebar{height:100vh;position:fixed}@media (max-width:767px){.wrapper.hide_logo .main-header .logo{display:none}}.logo-lg,.logo-mini{text-align:left}.logo-lg img,.logo-mini img{padding:.4em!important}.logo-lg img{display:-webkit-inline-box;width:25%}.user-panel{height:4em}hr.visible-xs-block{background-color:rgba(0,0,0,.17);border-color:transparent;height:1px;width:100%}",""]);const i=n},996:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),n=a.n(s)()((function(t){return t[1]}));n.push([t.id,".sidebar-menu>li>a{padding:12px 15px}.sidebar-menu li.active>a>.fa-angle-left,.sidebar-menu li.active>a>.pull-right-container>.fa-angle-left{animation-duration:.2s;animation-fill-mode:forwards;animation-name:rotate}.treeview-title{z-index:1}@keyframes rotate{0%{transform:rotate(0deg)}to{transform:rotate(-90deg)}}",""]);const i=n},7085:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),n=a.n(s)()((function(t){return t[1]}));n.push([t.id,".user-panel .image img{border-radius:50%}#searchForm{padding-left:0;padding-right:0}#searchContainer{height:100%;padding-bottom:0}#search{float:right;width:80%}#search-btn{width:20%}",""]);const i=n},7788:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),n=a.n(s)()((function(t){return t[1]}));n.push([t.id,".user-menu[data-v-d4c71fd2]{margin-bottom:.4rem}.user-menu a[data-v-d4c71fd2]{color:#3b82f6!important}.icon_user[data-v-d4c71fd2]{background:hsla(34,3%,60%,.438);border-radius:50%;padding:.5rem}",""]);const i=n},1519:t=>{"use strict";t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var a=t(e);return e[2]?"@media ".concat(e[2]," {").concat(a,"}"):a})).join("")},e.i=function(t,a,s){"string"==typeof t&&(t=[[null,t,""]]);var n={};if(s)for(var i=0;i<this.length;i++){var r=this[i][0];null!=r&&(n[r]=!0)}for(var o=0;o<t.length;o++){var l=[].concat(t[o]);s&&n[l[0]]||(a&&(l[2]?l[2]="".concat(a," and ").concat(l[2]):l[2]=a),e.push(l))}},e}},3379:(t,e,a)=>{"use strict";var s,n=function(){return void 0===s&&(s=Boolean(window&&document&&document.all&&!window.atob)),s},i=function(){var t={};return function(e){if(void 0===t[e]){var a=document.querySelector(e);if(window.HTMLIFrameElement&&a instanceof window.HTMLIFrameElement)try{a=a.contentDocument.head}catch(t){a=null}t[e]=a}return t[e]}}(),r=[];function o(t){for(var e=-1,a=0;a<r.length;a++)if(r[a].identifier===t){e=a;break}return e}function l(t,e){for(var a={},s=[],n=0;n<t.length;n++){var i=t[n],l=e.base?i[0]+e.base:i[0],c=a[l]||0,u="".concat(l," ").concat(c);a[l]=c+1;var d=o(u),h={css:i[1],media:i[2],sourceMap:i[3]};-1!==d?(r[d].references++,r[d].updater(h)):r.push({identifier:u,updater:g(h,e),references:1}),s.push(u)}return s}function c(t){var e=document.createElement("style"),s=t.attributes||{};if(void 0===s.nonce){var n=a.nc;n&&(s.nonce=n)}if(Object.keys(s).forEach((function(t){e.setAttribute(t,s[t])})),"function"==typeof t.insert)t.insert(e);else{var r=i(t.insert||"head");if(!r)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");r.appendChild(e)}return e}var u,d=(u=[],function(t,e){return u[t]=e,u.filter(Boolean).join("\n")});function h(t,e,a,s){var n=a?"":s.media?"@media ".concat(s.media," {").concat(s.css,"}"):s.css;if(t.styleSheet)t.styleSheet.cssText=d(e,n);else{var i=document.createTextNode(n),r=t.childNodes;r[e]&&t.removeChild(r[e]),r.length?t.insertBefore(i,r[e]):t.appendChild(i)}}function f(t,e,a){var s=a.css,n=a.media,i=a.sourceMap;if(n?t.setAttribute("media",n):t.removeAttribute("media"),i&&"undefined"!=typeof btoa&&(s+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i))))," */")),t.styleSheet)t.styleSheet.cssText=s;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(s))}}var p=null,v=0;function g(t,e){var a,s,n;if(e.singleton){var i=v++;a=p||(p=c(e)),s=h.bind(null,a,i,!1),n=h.bind(null,a,i,!0)}else a=c(e),s=f.bind(null,a,e),n=function(){!function(t){if(null===t.parentNode)return!1;t.parentNode.removeChild(t)}(a)};return s(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;s(t=e)}else n()}}t.exports=function(t,e){(e=e||{}).singleton||"boolean"==typeof e.singleton||(e.singleton=n());var a=l(t=t||[],e);return function(t){if(t=t||[],"[object Array]"===Object.prototype.toString.call(t)){for(var s=0;s<a.length;s++){var n=o(a[s]);r[n].references--}for(var i=l(t,e),c=0;c<a.length;c++){var u=o(a[c]);0===r[u].references&&(r[u].updater(),r.splice(u,1))}a=i}}}},8489:(t,e,a)=>{"use strict";a.d(e,{Z:()=>T});const s={data:function(){return{year:(new Date).getFullYear()}}};var n=a(1900);const i=(0,n.Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("footer",{staticClass:"main-footer"},[a("strong",[t._v("Copyright © "+t._s(t.year)+"\n  "),a("a",{attrs:{href:"javascript:;"}}),t._v(".")]),t._v(" All rights reserved.\n")])}),[],!1,null,null,null).exports;var r=a(6454);const o={components:{Link:r.rU},methods:{logout:function(){this.$inertia.post(route("logout"))}}};var l=a(3379),c=a.n(l),u=a(7788),d={insert:"head",singleton:!1};c()(u.Z,d);u.Z.locals;const h=(0,n.Z)(o,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ul",{staticClass:"nav navbar-nav flex flex-row"},[a("li",{staticClass:" user user-menu"},[a("a",{staticClass:"bg-blue-200 text-sm hover:bg-blue-400 text-blue-500 px-3 py-2 rounded-lg",attrs:{href:""}},[a("font-awesome-icon",{attrs:{icon:["fas","eye"]}}),t._v("\n        Xem cửa hàng\n  ")],1)]),t._v(" "),a("li",{staticClass:"dropdown user user-menu ml-3"},[a("a",{staticClass:"dropdown-toggle text-sm",attrs:{href:"javascript:;","data-toggle":"dropdown"}},[a("img",{staticClass:"user-image",attrs:{src:t.$page.props.auth.user.avatar,alt:"User Image"}}),t._v(" "),a("span",{staticClass:"hidden-xs  text-black font-semibold "},[t._v(t._s(t.$page.props.auth.user.name))])]),t._v(" "),a("ul",{staticClass:"dropdown-menu"},[a("li",{staticClass:"user-header",staticStyle:{height:"auto","min-height":"85px","padding-bottom":"15px"}},[a("p",[a("span",[t._v(t._s(t.$page.props.auth.user.name))]),t._v(" "),t._l(t.$page.props.auth.user.roles,(function(e){return a("small",{key:e},[t._v(t._s(e))])}))],2)]),t._v(" "),a("li",{staticClass:"user-footer"},[a("a",{staticClass:"btn btn-default btn-flat btn-block",on:{click:function(e){return t.logout()}}},[t._v("Logout")])])])])])}),[],!1,null,"d4c71fd2",null).exports,f={components:{UserMenu:h}};var p=a(739),v={insert:"head",singleton:!1};c()(p.Z,v);p.Z.locals;const g=(0,n.Z)(f,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("header",{staticClass:"main-header bg-white"},[t._m(0),t._v(" "),a("nav",{staticClass:"navbar navbar-static-top bg-white nav-manu",staticStyle:{height:"60px"},attrs:{role:"navigation"}},[t._m(1),t._v(" "),a("div",{staticClass:"navbar-custom-menu"},[a("UserMenu")],1)])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("span",{staticClass:"logo-mini"},[e("a",{attrs:{href:"/"}},[e("img",{staticClass:"img-responsive center-block logo bg-[#222d32]",attrs:{src:"/img/logo_cartonshop.png",alt:"Logo"}})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{staticClass:"sidebar-toggle",staticStyle:{color:"#000"},attrs:{href:"javascript:;","data-toggle":"offcanvas",role:"button"}},[a("span",{staticClass:"sr-only"},[t._v("Toggle navigation")])])}],!1,null,"1b443399",null).exports;const m={components:{Link:r.rU},mounted:function(){}};var _=a(996),C={insert:"head",singleton:!1};c()(_.Z,C);_.Z.locals;const b=(0,n.Z)(m,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ul",{staticClass:"sidebar-menu"},[a("li",{class:["CartonShop/Dashboard"===t.$page.component?"active":""],attrs:{tag:"li"}},[a("Link",{attrs:{href:t.route("dashboard")}},[a("i",{staticClass:"fa fa-desktop"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Tổng Quan")])])],1),t._v(" "),a("li",{staticClass:"treeview"},[t._m(0),t._v(" "),a("ul",{staticClass:"treeview-menu"},[a("li",{class:["OrderManagement/OrderWait"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("orders.pending")}},[a("i",{staticClass:"fa fa-table"}),t._v(" Đơn hàng\n        ")])],1),t._v(" "),a("li",{class:["Shipping/Index"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("shipping-fee.index")}},[a("i",{staticClass:"fa fa-check-circle"}),t._v(" Phí ship\n        ")])],1)])]),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"header"},[t._v("User managerment")]):t._e(),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"treeview"},[t._m(1),t._v(" "),a("ul",{staticClass:"treeview-menu"},[a("li",{class:["Admin/Permission"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("permissions.index")}},[a("i",{staticClass:"fa fa-shield"}),t._v(" Permissions\n        ")])],1),t._v(" "),a("li",{class:["Admin/Roles"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("roles.index")}},[a("i",{staticClass:"fa fa-check-circle"}),t._v(" Roles\n        ")])],1),t._v(" "),a("li",{class:["Admin/User"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("users.index")}},[a("i",{staticClass:"fa fa-users"}),t._v(" Users\n        ")])],1)])]):t._e(),t._v(" "),a("li",{staticClass:"treeview"},[t._m(2),t._v(" "),a("ul",{staticClass:"treeview-menu"},[a("li",[a("Link",{attrs:{href:t.route("warehouse.index")}},[a("i",{staticClass:"fa fa-file-word-o"}),t._v(" Kho hàng\n        ")])],1),t._v(" "),a("li",{class:["CategoryProduct/Index"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("categories.index")}},[a("i",{staticClass:"fa fa-file-picture-o"}),t._v(" Danh mục sản phẩm\n        ")])],1),t._v(" "),a("li",{class:["AttributeCategory/Index"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("attributes.index")}},[a("i",{staticClass:"fa fa-file-picture-o"}),t._v(" Thuộc tính\n        ")])],1),t._v(" "),a("li",[a("Link",{attrs:{href:t.route("sales.index")}},[a("i",{staticClass:"fa fa-file-pdf-o"}),t._v(" Chương trình sales\n        ")])],1)])]),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"pageli",class:["Payment/PaymentManagement"===t.$page.component?"active":""],attrs:{tag:"li"}},[a("Link",{attrs:{href:t.route("payment.index")}},[a("i",{staticClass:"fa fa-check-circle"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Quản lý thanh toán")])])],1):t._e(),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"treeview"},[a("a",{attrs:{href:"#"}},[a("font-awesome-icon",{attrs:{icon:["fab","blogger-b"]}}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("Bài viết")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"})],1),t._v(" "),t.hasAnyPermission(["users-manager"])?a("ul",{staticClass:"treeview-menu"},[a("li",{class:["AttributeCategory/Index"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("tag.index")}},[a("font-awesome-icon",{attrs:{icon:["fas","tag"]}}),t._v("Tag\n        ")],1)],1),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",[a("Link",{attrs:{href:t.route("post.index")}},[t._v("Bài viết")])],1):t._e()]):t._e()]):t._e(),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"treeview"},[t._m(3),t._v(" "),a("ul",{staticClass:"treeview-menu"},[a("li",[a("Link",{attrs:{href:t.route("home.index")}},[a("i",{staticClass:"fa fa-shield"}),t._v(" Trang chủ\n        ")])],1),t._v(" "),a("li",{class:["Setting/AboutUs"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("about-us.index")}},[a("i",{staticClass:"fa fa-users"}),t._v(" Về chúng tôi\n        ")])],1)])]):t._e(),t._v(" "),a("li",{staticClass:"pageli",attrs:{tag:"li"}},[a("Link",{attrs:{href:t.route("customers.index")}},[a("i",{staticClass:"fa fa-book"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Dữ liệu khách hàng")])])],1),t._v(" "),a("li",{staticClass:"pageli",attrs:{tag:"li"}},[a("Link",{attrs:{href:t.route("setting.index")}},[a("i",{staticClass:"fa fa-hdd-o"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Cài đặt thông tin chung")])])],1),t._v(" "),a("li",{staticClass:"header"},[t._v("PAGES")]),t._v(" "),t._m(4),t._v(" "),t._m(5)])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"#"}},[a("i",{staticClass:"fa fa-table"}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("Quản lý đơn hàng")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"},[a("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"#"}},[a("i",{staticClass:"fa fa-list"}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("User managerment")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"},[a("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"#"}},[a("i",{staticClass:"fa fa-folder-o"}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("Sản phẩm")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"},[a("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"#"}},[a("i",{staticClass:"fa fa-list"}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("Trang")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"},[a("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("li",{staticClass:"pageli",attrs:{tag:"li"}},[a("a",[a("i",{staticClass:"fa fa-circle-o text-yellow"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Login")])])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("li",{staticClass:"pageli",attrs:{tag:"li"}},[a("a",[a("i",{staticClass:"fa fa-circle-o text-red"}),t._v(" "),a("span",{staticClass:"page"},[t._v("404")])])])}],!1,null,null,null).exports;const x={components:{Menu:b},mounted:function(){$('[data-toggle="hideseek"]').off().hideseek()}};var y=a(7085),w={insert:"head",singleton:!1};c()(y.Z,w);y.Z.locals;const k=(0,n.Z)(x,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("aside",{staticClass:"main-sidebar"},[a("section",{staticClass:"sidebar"},[a("div",{staticClass:"user-panel mt-8"},[a("div",{staticClass:"pull-left image"},[t.$page.props.auth.user?a("img",{attrs:{src:t.$page.props.auth.user.avatar}}):t._e()]),t._v(" "),a("div",{staticClass:"pull-left info"},[a("div",[t.$page.props.auth.user?a("p",{staticClass:"white"},[t._v(t._s(t.$page.props.auth.user.name))]):t._e()]),t._v(" "),t._m(0)])]),t._v(" "),a("form",{staticClass:"sidebar-form",attrs:{id:"searchForm"},on:{submit:function(t){t.preventDefault()}}},[t._m(1)]),t._v(" "),a("Menu")],1)])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"javascript:;"}},[a("i",{staticClass:"fa fa-circle text-success"}),t._v(" Online\n        ")])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"input-group",attrs:{id:"searchContainer"}},[a("span",{staticClass:"input-group-btn"},[a("input",{staticClass:"search form-control",attrs:{type:"text",name:"search",id:"search","data-toggle":"hideseek",laceholder:"Search Menus","data-list":".sidebar-menu"}}),t._v(" "),a("button",{staticClass:"btn btn-flat",attrs:{type:"submit",name:"search",id:"search-btn"}},[a("i",{staticClass:"fa fa-search"})])])])}],!1,null,null,null).exports,E=!0,L=!0;a(9193);const S={components:{DashFooter:i,Header:g,Menu:b,SiderBar:k,UserMenu:h},data:function(){return{classes:{fixed_layout:E,hide_logo:L}}}};var Z=a(5264),A={insert:"head",singleton:!1};c()(Z.Z,A);Z.Z.locals;const T=(0,n.Z)(S,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{class:["wrapper",t.classes]},[a("Header"),t._v(" "),a("SiderBar"),t._v(" "),a("div",{staticClass:"content-wrapper"},[t._t("default")],2),t._v(" "),a("dash-footer")],1)}),[],!1,null,null,null).exports},708:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>i});var s=a(6454);const n={layout:a(8489).Z,components:{Link:s.rU}};const i=(0,a(1900).Z)(n,(function(){var t=this,e=t.$createElement;return(t._self._c||e)("div",[t._v("Hello")])}),[],!1,null,null,null).exports},1900:(t,e,a)=>{"use strict";function s(t,e,a,s,n,i,r,o){var l,c="function"==typeof t?t.options:t;if(e&&(c.render=e,c.staticRenderFns=a,c._compiled=!0),s&&(c.functional=!0),i&&(c._scopeId="data-v-"+i),r?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(r)},c._ssrRegister=l):n&&(l=o?function(){n.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:n),l)if(c.functional){c._injectStyles=l;var u=c.render;c.render=function(t,e){return l.call(e),u(t,e)}}else{var d=c.beforeCreate;c.beforeCreate=d?[].concat(d,l):[l]}return{exports:t,options:c}}a.d(e,{Z:()=>s})}}]);