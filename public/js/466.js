(self.webpackChunk=self.webpackChunk||[]).push([[466,9899,7808,1824],{9193:()=>{!function(t,e,a){"use strict";t.fn.hideseek=function(e){e=t.extend({list:".hideseek-data",nodata:"",attribute:"text",matches:!1,highlight:!1,ignore:"",headers:"",navigation:!1,ignore_accents:!1,hidden_mode:!1,min_chars:1},e);return this.each((function(){var a=t(this);a.opts=[],t.map(["list","nodata","attribute","matches","highlight","ignore","headers","navigation","ignore_accents","hidden_mode","min_chars"],(function(t,s){a.opts[t]=a.data(t)||e[t]})),a.opts.headers&&(a.opts.ignore+=a.opts.ignore?", "+a.opts.headers:a.opts.headers);var s=t(a.opts.list);a.opts.navigation&&a.attr("autocomplete","off"),a.opts.hidden_mode&&s.children().hide(),a.keyup((function(e){if(-1==[38,40,13].indexOf(e.keyCode)&&(8==e.keyCode||a.val().length>=a.opts.min_chars)){var r=a.val().toLowerCase();s.children(a.opts.ignore.trim()?":not("+a.opts.ignore+")":"").removeClass("selected").each((function(){var e=("text"!=a.opts.attribute?t(this).attr(a.opts.attribute)||"":t(this).text()).toLowerCase();-1==e.removeAccents(a.opts.ignore_accents).indexOf(r)||r===(!!a.opts.hidden_mode&&"")?t(this).hide():(i(t(this)),a.opts.matches&&null!==r.match(new RegExp(Object.keys(a.opts.matches)[0]))&&(null!==e.match(new RegExp(Object.values(a.opts.matches)[0]))?i(t(this)):t(this).hide())),a.trigger("_after_each")})),a.opts.nodata&&(s.find(".no-results").remove(),s.children(':not([style*="display: none"])').length||(s.children().first().clone().removeHighlight().addClass("no-results").show().prependTo(a.opts.list).text(a.opts.nodata),a.trigger("_after_nodata"))),a.opts.headers&&t(a.opts.headers,s).each((function(){t(this).nextUntil(a.opts.headers).not('[style*="display: none"],'+a.opts.ignore).length?t(this).show():t(this).hide()})),a.trigger("_after")}function i(t){a.opts.highlight?t.removeHighlight().highlight(r).show():t.show()}function n(t){return t.children(".selected:visible")}var o;a.opts.navigation&&(38==e.keyCode?n(s).length?((o=s,n(o).prevAll(":visible:first")).addClass("selected"),n(s).last().removeClass("selected")):s.children(":visible").last().addClass("selected"):40==e.keyCode?n(s).length?(function(t){return n(t).nextAll(":visible:first")}(s).addClass("selected"),n(s).first().removeClass("selected")):s.children(":visible").first().addClass("selected"):13==e.keyCode&&(n(s).find("a").length?document.location=n(s).find("a").attr("href"):a.val(n(s).text())))}))}))},t(document).ready((function(){t('[data-toggle="hideseek"]').hideseek()}))}(jQuery),jQuery.fn.highlight=function(t){function e(t,a){var s=0;if(3==t.nodeType){var r=t.data.removeAccents(!0).toUpperCase().indexOf(a);if(r>=0){var i=document.createElement("mark");i.className="highlight";var n=t.splitText(r);n.splitText(a.length);var o=n.cloneNode(!0);i.appendChild(o),n.parentNode.replaceChild(i,n),s=1}}else if(1==t.nodeType&&t.childNodes&&!/(script|style)/i.test(t.tagName))for(var l=0;l<t.childNodes.length;++l)l+=e(t.childNodes[l],a);return s}return this.length&&t&&t.length?this.each((function(){e(this,t.toUpperCase())})):this},jQuery.fn.removeHighlight=function(){return this.find("mark.highlight").each((function(){with(this.parentNode.firstChild.nodeName,this.parentNode)replaceChild(this.firstChild,this),normalize()})).end()},String.prototype.removeAccents=function(t){return t?this.replace(/[áàãâä]/gi,"a").replace(/[éè¨ê]/gi,"e").replace(/[íìïî]/gi,"i").replace(/[óòöôõ]/gi,"o").replace(/[úùüû]/gi,"u").replace(/[ç]/gi,"c").replace(/[ñ]/gi,"n"):this}},739:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),r=a.n(s)()((function(t){return t[1]}));r.push([t.id,".nav-menu[data-v-1b443399]{height:60px!important}.logo[data-v-1b443399]{background:#222d32!important;height:60px}",""]);const i=r},5264:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),r=a.n(s)()((function(t){return t[1]}));r.push([t.id,".wrapper.fixed_layout .main-header{position:fixed;width:100%}.wrapper.fixed_layout .content-wrapper{padding-top:50px}.wrapper.fixed_layout .main-sidebar{height:100vh;position:fixed}@media (max-width:767px){.wrapper.hide_logo .main-header .logo{display:none}}.logo-lg,.logo-mini{text-align:left}.logo-lg img,.logo-mini img{padding:.4em!important}.logo-lg img{display:-webkit-inline-box;width:25%}.user-panel{height:4em}hr.visible-xs-block{background-color:rgba(0,0,0,.17);border-color:transparent;height:1px;width:100%}",""]);const i=r},996:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),r=a.n(s)()((function(t){return t[1]}));r.push([t.id,".sidebar-menu>li>a{padding:12px 15px}.sidebar-menu li.active>a>.fa-angle-left,.sidebar-menu li.active>a>.pull-right-container>.fa-angle-left{animation-duration:.2s;animation-fill-mode:forwards;animation-name:rotate}.treeview-title{z-index:1}@keyframes rotate{0%{transform:rotate(0deg)}to{transform:rotate(-90deg)}}",""]);const i=r},7085:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),r=a.n(s)()((function(t){return t[1]}));r.push([t.id,".user-panel .image img{border-radius:50%}#searchForm{padding-left:0;padding-right:0}#searchContainer{height:100%;padding-bottom:0}#search{float:right;width:80%}#search-btn{width:20%}",""]);const i=r},7788:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),r=a.n(s)()((function(t){return t[1]}));r.push([t.id,".user-menu[data-v-d4c71fd2]{margin-bottom:.4rem}.user-menu a[data-v-d4c71fd2]{color:#3b82f6!important}.icon_user[data-v-d4c71fd2]{background:hsla(34,3%,60%,.438);border-radius:50%;padding:.5rem}",""]);const i=r},1410:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});var s=a(1519),r=a.n(s)()((function(t){return t[1]}));r.push([t.id,".list_icon_crud[data-v-3d1c164c]{box-shadow:0 7px 29px 0 hsla(240,5%,41%,.2);display:inline-grid;right:-40px;top:20px;z-index:111}.btn_crud[data-v-3d1c164c]{font-size:20px}",""]);const i=r},1519:t=>{"use strict";t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var a=t(e);return e[2]?"@media ".concat(e[2]," {").concat(a,"}"):a})).join("")},e.i=function(t,a,s){"string"==typeof t&&(t=[[null,t,""]]);var r={};if(s)for(var i=0;i<this.length;i++){var n=this[i][0];null!=n&&(r[n]=!0)}for(var o=0;o<t.length;o++){var l=[].concat(t[o]);s&&r[l[0]]||(a&&(l[2]?l[2]="".concat(a," and ").concat(l[2]):l[2]=a),e.push(l))}},e}},3379:(t,e,a)=>{"use strict";var s,r=function(){return void 0===s&&(s=Boolean(window&&document&&document.all&&!window.atob)),s},i=function(){var t={};return function(e){if(void 0===t[e]){var a=document.querySelector(e);if(window.HTMLIFrameElement&&a instanceof window.HTMLIFrameElement)try{a=a.contentDocument.head}catch(t){a=null}t[e]=a}return t[e]}}(),n=[];function o(t){for(var e=-1,a=0;a<n.length;a++)if(n[a].identifier===t){e=a;break}return e}function l(t,e){for(var a={},s=[],r=0;r<t.length;r++){var i=t[r],l=e.base?i[0]+e.base:i[0],c=a[l]||0,d="".concat(l," ").concat(c);a[l]=c+1;var u=o(d),p={css:i[1],media:i[2],sourceMap:i[3]};-1!==u?(n[u].references++,n[u].updater(p)):n.push({identifier:d,updater:g(p,e),references:1}),s.push(d)}return s}function c(t){var e=document.createElement("style"),s=t.attributes||{};if(void 0===s.nonce){var r=a.nc;r&&(s.nonce=r)}if(Object.keys(s).forEach((function(t){e.setAttribute(t,s[t])})),"function"==typeof t.insert)t.insert(e);else{var n=i(t.insert||"head");if(!n)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");n.appendChild(e)}return e}var d,u=(d=[],function(t,e){return d[t]=e,d.filter(Boolean).join("\n")});function p(t,e,a,s){var r=a?"":s.media?"@media ".concat(s.media," {").concat(s.css,"}"):s.css;if(t.styleSheet)t.styleSheet.cssText=u(e,r);else{var i=document.createTextNode(r),n=t.childNodes;n[e]&&t.removeChild(n[e]),n.length?t.insertBefore(i,n[e]):t.appendChild(i)}}function f(t,e,a){var s=a.css,r=a.media,i=a.sourceMap;if(r?t.setAttribute("media",r):t.removeAttribute("media"),i&&"undefined"!=typeof btoa&&(s+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i))))," */")),t.styleSheet)t.styleSheet.cssText=s;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(s))}}var h=null,v=0;function g(t,e){var a,s,r;if(e.singleton){var i=v++;a=h||(h=c(e)),s=p.bind(null,a,i,!1),r=p.bind(null,a,i,!0)}else a=c(e),s=f.bind(null,a,e),r=function(){!function(t){if(null===t.parentNode)return!1;t.parentNode.removeChild(t)}(a)};return s(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;s(t=e)}else r()}}t.exports=function(t,e){(e=e||{}).singleton||"boolean"==typeof e.singleton||(e.singleton=r());var a=l(t=t||[],e);return function(t){if(t=t||[],"[object Array]"===Object.prototype.toString.call(t)){for(var s=0;s<a.length;s++){var r=o(a[s]);n[r].references--}for(var i=l(t,e),c=0;c<a.length;c++){var d=o(a[c]);0===n[d].references&&(n[d].updater(),n.splice(d,1))}a=i}}}},4013:(t,e,a)=>{"use strict";a.d(e,{Z:()=>r});const s={name:"Alert",props:{dismissible:{type:Boolean,default:!0}}};const r=(0,a(1900).Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.$page.props.flash.warning||Object.keys(t.$page.props.errors).length>0?a("div",{class:["alert","alert-error",{"alert-dismissible":t.dismissible}]},[t.dismissible?a("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-hidden":"true"}},[t._v("×")]):t._e(),t._v(" "),a("h4",[Object.keys(t.$page.props.errors).length>0?a("i",{staticClass:"fa fa-warning"}):t._e(),t._v(" "),Object.keys(t.$page.props.errors).length>0?a("span",[t._v("There are "+t._s(Object.keys(t.$page.props.errors).length)+" form errors.")]):t._e(),t._v(" "),t.$page.props.flash.warning?a("i",{staticClass:"fa fa-warning"}):t._e(),t._v(" "),t.$page.props.flash.warning?a("span",[t._v(t._s(t.$page.props.flash.warning))]):t._e()]),t._v(" "),a("span",[t._t("default")],2)]):t.$page.props.flash.success?a("div",{class:["alert","alert-success",{"alert-dismissible":t.dismissible}]},[t.dismissible?a("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-hidden":"true"}},[t._v("×")]):t._e(),t._v(" "),a("h4",[a("i",{staticClass:"fa fa-check"}),t._v(" "),a("span",[t._v(t._s(t.$page.props.flash.success))])]),t._v(" "),a("span",[t._t("default")],2)]):t._e()}),[],!1,null,null,null).exports},3357:(t,e,a)=>{"use strict";a.d(e,{Z:()=>r});const s={inheritAttrs:!1,props:{id:{type:String,default:function(){return"text-input-".concat(this._uid)}},type:{type:String,default:"text"},value:String,label:String,errors:{type:Array,default:function(){return[]}}},methods:{focus:function(){this.$refs.input.focus()},select:function(){this.$refs.input.select()},setSelectionRange:function(t,e){this.$refs.input.setSelectionRange(t,e)}}};const r=(0,a(1900).Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[t.label?a("label",{staticClass:"form-label",attrs:{for:t.id}},[t._v(t._s(t.label)+":")]):t._e(),t._v(" "),a("input",t._b({ref:"input",staticClass:"form-control text-sm rounded-lg",class:{error:t.errors.length},attrs:{id:t.id,type:t.type},domProps:{value:t.value},on:{input:function(e){return t.$emit("input",e.target.value)}}},"input",t.$attrs,!1)),t._v(" "),t.errors.length?a("div",{staticClass:"form-error text-red-500",attrs:{for:t.id}},[t._v(t._s(t.errors))]):t._e()])}),[],!1,null,null,null).exports},8489:(t,e,a)=>{"use strict";a.d(e,{Z:()=>Z});const s={data:function(){return{year:(new Date).getFullYear()}}};var r=a(1900);const i=(0,r.Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("footer",{staticClass:"main-footer"},[a("strong",[t._v("Copyright © "+t._s(t.year)+"\n  "),a("a",{attrs:{href:"javascript:;"}}),t._v(".")]),t._v(" All rights reserved.\n")])}),[],!1,null,null,null).exports;var n=a(6454);const o={components:{Link:n.rU},methods:{logout:function(){this.$inertia.post(route("logout"))}}};var l=a(3379),c=a.n(l),d=a(7788),u={insert:"head",singleton:!1};c()(d.Z,u);d.Z.locals;const p=(0,r.Z)(o,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ul",{staticClass:"nav navbar-nav flex flex-row"},[a("li",{staticClass:" user user-menu"},[a("a",{staticClass:"bg-blue-200 text-sm hover:bg-blue-400 text-blue-500 px-3 py-2 rounded-lg",attrs:{href:""}},[a("font-awesome-icon",{attrs:{icon:["fas","eye"]}}),t._v("\n        Xem cửa hàng\n  ")],1)]),t._v(" "),a("li",{staticClass:"dropdown user user-menu ml-3"},[a("a",{staticClass:"dropdown-toggle text-sm",attrs:{href:"javascript:;","data-toggle":"dropdown"}},[a("img",{staticClass:"user-image",attrs:{src:t.$page.props.auth.user.avatar,alt:"User Image"}}),t._v(" "),a("span",{staticClass:"hidden-xs  text-black font-semibold "},[t._v(t._s(t.$page.props.auth.user.name))])]),t._v(" "),a("ul",{staticClass:"dropdown-menu"},[a("li",{staticClass:"user-header",staticStyle:{height:"auto","min-height":"85px","padding-bottom":"15px"}},[a("p",[a("span",[t._v(t._s(t.$page.props.auth.user.name))]),t._v(" "),t._l(t.$page.props.auth.user.roles,(function(e){return a("small",{key:e},[t._v(t._s(e))])}))],2)]),t._v(" "),a("li",{staticClass:"user-footer"},[a("a",{staticClass:"btn btn-default btn-flat btn-block",on:{click:function(e){return t.logout()}}},[t._v("Logout")])])])])])}),[],!1,null,"d4c71fd2",null).exports,f={components:{UserMenu:p}};var h=a(739),v={insert:"head",singleton:!1};c()(h.Z,v);h.Z.locals;const g=(0,r.Z)(f,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("header",{staticClass:"main-header bg-white"},[t._m(0),t._v(" "),a("nav",{staticClass:"navbar navbar-static-top bg-white nav-manu",staticStyle:{height:"60px"},attrs:{role:"navigation"}},[t._m(1),t._v(" "),a("div",{staticClass:"navbar-custom-menu"},[a("UserMenu")],1)])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("span",{staticClass:"logo-mini"},[e("a",{attrs:{href:"/"}},[e("img",{staticClass:"img-responsive center-block logo bg-[#222d32]",attrs:{src:"/img/logo_cartonshop.png",alt:"Logo"}})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{staticClass:"sidebar-toggle",staticStyle:{color:"#000"},attrs:{href:"javascript:;","data-toggle":"offcanvas",role:"button"}},[a("span",{staticClass:"sr-only"},[t._v("Toggle navigation")])])}],!1,null,"1b443399",null).exports;const m={components:{Link:n.rU},mounted:function(){}};var _=a(996),b={insert:"head",singleton:!1};c()(_.Z,b);_.Z.locals;const C=(0,r.Z)(m,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ul",{staticClass:"sidebar-menu"},[a("li",{class:["CartonShop/Dashboard"===t.$page.component?"active":""],attrs:{tag:"li"}},[a("Link",{attrs:{href:t.route("dashboard")}},[a("i",{staticClass:"fa fa-desktop"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Tổng Quan")])])],1),t._v(" "),a("li",{staticClass:"treeview"},[t._m(0),t._v(" "),a("ul",{staticClass:"treeview-menu"},[a("li",{class:["OrderManagement/OrderWait"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("orders.pending")}},[a("i",{staticClass:"fa fa-table"}),t._v(" Đơn hàng\n        ")])],1),t._v(" "),a("li",{class:["Shipping/Index"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("shipping-fee.index")}},[a("i",{staticClass:"fa fa-check-circle"}),t._v(" Phí ship\n        ")])],1)])]),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"header"},[t._v("User managerment")]):t._e(),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"treeview"},[t._m(1),t._v(" "),a("ul",{staticClass:"treeview-menu"},[a("li",{class:["Admin/Permission"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("permissions.index")}},[a("i",{staticClass:"fa fa-shield"}),t._v(" Permissions\n        ")])],1),t._v(" "),a("li",{class:["Admin/Roles"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("roles.index")}},[a("i",{staticClass:"fa fa-check-circle"}),t._v(" Roles\n        ")])],1),t._v(" "),a("li",{class:["Admin/User"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("users.index")}},[a("i",{staticClass:"fa fa-users"}),t._v(" Users\n        ")])],1)])]):t._e(),t._v(" "),a("li",{staticClass:"treeview"},[t._m(2),t._v(" "),a("ul",{staticClass:"treeview-menu"},[a("li",[a("Link",{attrs:{href:t.route("warehouse.index")}},[a("i",{staticClass:"fa fa-file-word-o"}),t._v(" Kho hàng\n        ")])],1),t._v(" "),a("li",{class:["CategoryProduct/Index"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("categories.index")}},[a("i",{staticClass:"fa fa-file-picture-o"}),t._v(" Danh mục sản phẩm\n        ")])],1),t._v(" "),a("li",{class:["AttributeCategory/Index"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("attributes.index")}},[a("i",{staticClass:"fa fa-file-picture-o"}),t._v(" Thuộc tính\n        ")])],1),t._v(" "),a("li",[a("Link",{attrs:{href:t.route("sales.index")}},[a("i",{staticClass:"fa fa-file-pdf-o"}),t._v(" Chương trình sales\n        ")])],1)])]),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"pageli",class:["Payment/PaymentManagement"===t.$page.component?"active":""],attrs:{tag:"li"}},[a("Link",{attrs:{href:t.route("payment.index")}},[a("i",{staticClass:"fa fa-check-circle"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Quản lý thanh toán")])])],1):t._e(),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"treeview"},[a("a",{attrs:{href:"#"}},[a("font-awesome-icon",{attrs:{icon:["fab","blogger-b"]}}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("Bài viết")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"})],1),t._v(" "),t.hasAnyPermission(["users-manager"])?a("ul",{staticClass:"treeview-menu"},[a("li",{class:["AttributeCategory/Index"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("tag.index")}},[a("font-awesome-icon",{attrs:{icon:["fas","tag"]}}),t._v("Tag\n        ")],1)],1),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",[a("Link",{attrs:{href:t.route("post.index")}},[t._v("Bài viết")])],1):t._e()]):t._e()]):t._e(),t._v(" "),t.hasAnyPermission(["users-manager"])?a("li",{staticClass:"treeview"},[t._m(3),t._v(" "),a("ul",{staticClass:"treeview-menu"},[a("li",[a("Link",{attrs:{href:t.route("home.index")}},[a("i",{staticClass:"fa fa-shield"}),t._v(" Trang chủ\n        ")])],1),t._v(" "),a("li",{class:["Setting/AboutUs"===t.$page.component?"active":""]},[a("Link",{attrs:{href:t.route("about-us.index")}},[a("i",{staticClass:"fa fa-users"}),t._v(" Về chúng tôi\n        ")])],1)])]):t._e(),t._v(" "),a("li",{staticClass:"pageli",attrs:{tag:"li"}},[a("Link",{attrs:{href:t.route("customers.index")}},[a("i",{staticClass:"fa fa-book"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Dữ liệu khách hàng")])])],1),t._v(" "),a("li",{staticClass:"pageli",attrs:{tag:"li"}},[a("Link",{attrs:{href:t.route("setting.index")}},[a("i",{staticClass:"fa fa-hdd-o"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Cài đặt thông tin chung")])])],1),t._v(" "),a("li",{staticClass:"header"},[t._v("PAGES")]),t._v(" "),t._m(4),t._v(" "),t._m(5)])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"#"}},[a("i",{staticClass:"fa fa-table"}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("Quản lý đơn hàng")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"},[a("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"#"}},[a("i",{staticClass:"fa fa-list"}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("User managerment")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"},[a("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"#"}},[a("i",{staticClass:"fa fa-folder-o"}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("Sản phẩm")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"},[a("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"#"}},[a("i",{staticClass:"fa fa-list"}),t._v(" "),a("span",{staticClass:"treeview-title"},[t._v("Trang")]),t._v(" "),a("span",{staticClass:"pull-right-container pull-right"},[a("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("li",{staticClass:"pageli",attrs:{tag:"li"}},[a("a",[a("i",{staticClass:"fa fa-circle-o text-yellow"}),t._v(" "),a("span",{staticClass:"page"},[t._v("Login")])])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("li",{staticClass:"pageli",attrs:{tag:"li"}},[a("a",[a("i",{staticClass:"fa fa-circle-o text-red"}),t._v(" "),a("span",{staticClass:"page"},[t._v("404")])])])}],!1,null,null,null).exports;const x={components:{Menu:C},mounted:function(){$('[data-toggle="hideseek"]').off().hideseek()}};var y=a(7085),w={insert:"head",singleton:!1};c()(y.Z,w);y.Z.locals;const k=(0,r.Z)(x,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("aside",{staticClass:"main-sidebar"},[a("section",{staticClass:"sidebar"},[a("div",{staticClass:"user-panel mt-8"},[a("div",{staticClass:"pull-left image"},[t.$page.props.auth.user?a("img",{attrs:{src:t.$page.props.auth.user.avatar}}):t._e()]),t._v(" "),a("div",{staticClass:"pull-left info"},[a("div",[t.$page.props.auth.user?a("p",{staticClass:"white"},[t._v(t._s(t.$page.props.auth.user.name))]):t._e()]),t._v(" "),t._m(0)])]),t._v(" "),a("form",{staticClass:"sidebar-form",attrs:{id:"searchForm"},on:{submit:function(t){t.preventDefault()}}},[t._m(1)]),t._v(" "),a("Menu")],1)])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{attrs:{href:"javascript:;"}},[a("i",{staticClass:"fa fa-circle text-success"}),t._v(" Online\n        ")])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"input-group",attrs:{id:"searchContainer"}},[a("span",{staticClass:"input-group-btn"},[a("input",{staticClass:"search form-control",attrs:{type:"text",name:"search",id:"search","data-toggle":"hideseek",laceholder:"Search Menus","data-list":".sidebar-menu"}}),t._v(" "),a("button",{staticClass:"btn btn-flat",attrs:{type:"submit",name:"search",id:"search-btn"}},[a("i",{staticClass:"fa fa-search"})])])])}],!1,null,null,null).exports,L=!0,S=!0;a(9193);const M={components:{DashFooter:i,Header:g,Menu:C,SiderBar:k,UserMenu:p},data:function(){return{classes:{fixed_layout:L,hide_logo:S}}}};var E=a(5264),A={insert:"head",singleton:!1};c()(E.Z,A);E.Z.locals;const Z=(0,r.Z)(M,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{class:["wrapper",t.classes]},[a("Header"),t._v(" "),a("SiderBar"),t._v(" "),a("div",{staticClass:"content-wrapper"},[t._t("default")],2),t._v(" "),a("dash-footer")],1)}),[],!1,null,null,null).exports},9899:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>r});const s={};const r=(0,a(1900).Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"form_search w-1/4 mt-5"},[a("form",{on:{submit:function(t){t.preventDefault()}}},[a("div",{staticClass:"relative"},[a("div",{staticClass:"absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"},[a("svg",{staticClass:"w-5 h-5 text-sm text-gray-500 dark:text-gray-400",attrs:{"aria-hidden":"true",fill:"none",stroke:"currentColor",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"}},[a("path",{attrs:{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"}})])]),t._v(" "),a("input",{staticClass:"block w-full p-2 pl-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",attrs:{type:"search",id:"default-search",name:"search","data-toggle":"hideseek",laceholder:"Search Menus","data-list":".menu-category",placeholder:"Search",required:""}})])])])}),[],!1,null,null,null).exports},466:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>h});var s=a(6454),r=a(8489),i=a(4013),n=a(9899),o=a(1824),l=a(7808);const c={layout:r.Z,components:{Link:s.rU,Alert:i.Z,SearchCategory:n.default,Head:s.Fb,Header:o.default,OptionValue:l.default},props:{options:Array,errors:Object,product:Object},data:function(){return{editorData:"<p>Content of the editor.</p>",editorConfig:{},editMode:!1,images:[],form:this.$inertia.form({name:null,visual:null})}},methods:{add:function(){this.editMode=!1,this.form.reset()},save:function(){var t=this;this.editMode?this.form.put(route("product.option.update",this.form.id),{preserveState:!0,onError:function(e){Object.keys(e).length>0&&(t.editMode=!0)},onSuccess:function(e){$("#exampleModal").modal("hide"),t.form.reset()}}):this.form.post(route("product.option.store",this.product.id),{preserveState:!0,onError:function(e){Object.keys(e).length>0&&(t.editMode=!1)},onSuccess:function(e){$("#exampleModal").modal("hide"),t.form.reset()}})},edit:function(t){this.editMode=!0,this.form.id=t.id,this.form.name=t.name,this.form.visual=t.visual},Delete:function(t){var e=this;this.$swal({title:"Are you sure?",text:"Once deleted, you will not be able to recover this data!",icon:"warning",buttons:!0,dangerMode:!0}).then((function(a){a?e.$inertia.delete(route("product.option.destroy",t)):e.$swal("Action cancelled!")}))}}};var d=a(3379),u=a.n(d),p=a(1410),f={insert:"head",singleton:!1};u()(p.Z,f);p.Z.locals;const h=(0,a(1900).Z)(c,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("section",{staticClass:"content"},[a("Head",{attrs:{title:"Options"}}),t._v(" "),a("div",{staticClass:"modal fade",attrs:{id:"exampleModal",tabindex:"-1",role:"dialog","aria-labelledby":"exampleModalLabel","aria-hidden":"true"}},[a("div",{staticClass:"modal-dialog",attrs:{role:"document"}},[a("div",{staticClass:"modal-content rounded-lg"},[a("div",{staticClass:"modal-header"},[t.editMode?a("h5",{staticClass:"modal-title text-lg font-semibold",attrs:{id:"exampleModalLabel"}},[t._v("Sửa Option\n            ")]):a("h5",{staticClass:"modal-title text-lg font-semibold",attrs:{id:"exampleModalLabel"}},[t._v("Thêm Option")]),t._v(" "),t._m(0)]),t._v(" "),a("div",{staticClass:"modal-body"},[a("form",{on:{submit:function(e){return e.preventDefault(),t.save.apply(null,arguments)}}},[a("div",{staticClass:"form-group",class:t.errors.name?"has-error":""},[a("label",{staticClass:"col-form-label",attrs:{for:"recipient-name"}},[t._v("Tên option:")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.form.name,expression:"form.name"}],staticClass:"form-control text-sm rounded-lg",attrs:{type:"text",placeholder:"Tên danh mục",id:"recipient-name"},domProps:{value:t.form.name},on:{input:function(e){e.target.composing||t.$set(t.form,"name",e.target.value)}}}),t._v(" "),t.errors.name?a("div",{staticClass:"text-red-500"},[t._v(t._s(t.errors.name))]):t._e()]),t._v(" "),a("hr"),t._v(" "),a("div",{staticClass:"sm:col-span-3"},[a("div",{staticClass:"w-1/2 mr-2 h-12"},[a("label",{staticClass:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},[t._v("Chọn Lable")]),t._v(" "),a("select",{directives:[{name:"model",rawName:"v-model",value:t.form.visual,expression:"form.visual"}],staticClass:"bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mr-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",attrs:{id:"countries"},on:{change:function(e){var a=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.$set(t.form,"visual",e.target.multiple?a:a[0])}}},[a("option",{domProps:{value:null}},[t._v("Please select")]),t._v(" "),a("option",{attrs:{value:"text"}},[t._v("Text")]),t._v(" "),a("option",{attrs:{value:"color"}},[t._v("Color")]),t._v(" "),a("option",{attrs:{value:"image"}},[t._v("Image")])])])]),t._v(" "),a("div",{staticClass:"modal-footer"},[a("button",{staticClass:"inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out",attrs:{type:"button","data-dismiss":"modal"}},[t._v("Quay lại")]),t._v(" "),a("button",{staticClass:"inline-block px-6 py-2.5 bg-gray-800 text-white font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-primary-900 hover:shadow-lg bg-primary focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out",attrs:{type:"submit"},on:{click:function(e){return e.preventDefault(),t.save()}}},[t._v("\n                  Lưu\n                  lại\n                ")])])])])])])]),t._v(" "),a("div",[a("div",{staticClass:"m-8"},[a("div",{staticClass:"space-y-5"},[a("button",{staticClass:"px-2 py-2 text-sm text-white bg-primary rounded-lg border mx-1",attrs:{"data-toggle":"modal","data-target":"#exampleModal"},on:{click:function(e){return t.add()}}},[a("font-awesome-icon",{staticClass:"mr-2",attrs:{icon:["fas","plus"]}}),t._v("Thêm options\n          ")],1),t._v(" "),t._l(t.options,(function(e,s){return a("div",{key:s,staticClass:"relative w-full border border-gray-300 rounded-md p-4 flex"},[a("div",{staticClass:"absolute -top-3 left-3 px-0.5 bg-white flex items-center space-x-1"},[a("button",{on:{click:function(a){return t.Delete(e.id)}}},[a("svg",{staticClass:"h-4 w-4 text-red-400 hover:text-red-500 cursor-pointer",attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"}},[a("path",{attrs:{"fill-rule":"evenodd",d:"M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z","clip-rule":"evenodd"}})])]),t._v(" "),a("span",{staticClass:" rounded-md font-medium text-sm text-gray-700 flex items-center"},[t._v(t._s(e.name))])]),t._v(" "),a("div",{staticClass:"absolute -top-3 left-20 px-0.5 bg-white flex items-center space-x-1"},[a("button",{attrs:{"data-toggle":"modal","data-target":"#exampleModal"},on:{click:function(a){return t.edit(e)}}},[a("svg",{staticClass:"w-5 h-5 text-green-400 hover:text-green-500 cursor-pointer",attrs:{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"}},[a("path",{attrs:{"stroke-linecap":"round","stroke-linejoin":"round",d:"M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"}})])])]),t._v(" "),a("OptionValue",{attrs:{option_values:e.option_values,option:e,errors:t.errors}})],1)}))],2)])])],1)}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"modal","aria-label":"Close"}},[a("span",{attrs:{"aria-hidden":"true"}},[t._v("×")])])}],!1,null,"3d1c164c",null).exports},7808:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>i});var s=a(3357);const r={props:{option_values:Array,option:Object,errors:Object},components:{BreezeInput:s.Z},data:function(){return{form:this.$inertia.form({value:null,label:null})}},methods:{save:function(){var t=this;this.form.post(route("product.option.value.store",this.option.id),{preserveState:!0,onError:function(e){Object.keys(e).length>0&&(t.editMode=!1)},onSuccess:function(e){t.form.reset()}})}}};const i=(0,a(1900).Z)(r,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("div",{staticClass:"mb-3"},[t._l(t.option_values,(function(e,s){return a("div",{key:s,staticClass:"relative inline-flex border border-gray-300 rounded px-3 py-2 mr-1 group"},[a("button",{staticClass:"absolute inline-flex items-center justify-center top-0 right-0 w-3 h-3 rounded-full ring-1 ring-white bg-red-600 hover:bg-red-400 text-white opacity-0 group-hover:opacity-100 transition-opacity",attrs:{type:"button"}},[a("svg",{staticClass:"h-2.5 w-2.5",attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"}},[a("path",{attrs:{"fill-rule":"evenodd",d:"M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z","clip-rule":"evenodd"}})])]),t._v(" "),a("span",{staticClass:"text-sm font-sans pr-1 font-medium text-gray-400"},[t._v("\n                "+t._s(e.value)+"\n            ")])])})),t._v(" "),0==t.option_values.length?a("p",{staticClass:"text-sm text-gray-600"},[t._v("This option is ready to be used but has no value yet!")]):t._e()],2),t._v(" "),a("form",[a("div",{staticClass:"space-y-6 lg:flex lg:space-x-6 lg:space-y-0"},[a("div",{staticClass:"lg:flex-1"},[a("BreezeInput",{staticClass:"mt-6",attrs:{label:"Value",type:"text",placeholder:"Option value for "+t.option.name,errors:t.errors.value},model:{value:t.form.value,callback:function(e){t.$set(t.form,"value",e)},expression:"form.value"}})],1),t._v(" "),a("div",{staticClass:"lg:flex-1"},[a("BreezeInput",{staticClass:"mt-6",attrs:{label:"Label",type:"text",placeholder:"Option label for "+t.option.name},model:{value:t.form.label,callback:function(e){t.$set(t.form,"label",e)},expression:"form.label"}})],1),t._v(" "),a("div",{staticClass:"lg:flex lg:items-end"},[a("button",{staticClass:"inline-block px-6 py-2.5 bg-gray-800 text-white font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-primary-900 hover:shadow-lg bg-primary focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out",attrs:{type:"submit"},on:{click:function(e){return e.preventDefault(),t.save()}}},[t._v("\n              Lưu\n              lại\n            ")])])])])])}),[],!1,null,null,null).exports},1824:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>i});var s=a(6454);const r={props:{name:String,category:Object},components:{Link:s.rU}};const i=(0,a(1900).Z)(r,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"my-3 flex"},[a("Link",{staticClass:"px-3 mr-4 py-3 bg-white border rounded-lg",attrs:{href:t.route("warehouse.show",t.category.slug)}},[a("font-awesome-icon",{attrs:{icon:["fas","chevron-left"]}})],1),t._v(" "),a("div",{staticClass:"block"},[a("p",{staticClass:"text-gray-500 text-xs"},[t._v("Trở về kho hàng")]),t._v(" "),a("h2",{staticClass:"font-semibold text-3xl flex mr-2"},[t._v(t._s(t.name)+" ")])])],1)}),[],!1,null,null,null).exports},1900:(t,e,a)=>{"use strict";function s(t,e,a,s,r,i,n,o){var l,c="function"==typeof t?t.options:t;if(e&&(c.render=e,c.staticRenderFns=a,c._compiled=!0),s&&(c.functional=!0),i&&(c._scopeId="data-v-"+i),n?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),r&&r.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(n)},c._ssrRegister=l):r&&(l=o?function(){r.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:r),l)if(c.functional){c._injectStyles=l;var d=c.render;c.render=function(t,e){return l.call(e),d(t,e)}}else{var u=c.beforeCreate;c.beforeCreate=u?[].concat(u,l):[l]}return{exports:t,options:c}}a.d(e,{Z:()=>s})}}]);