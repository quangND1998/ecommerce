(self.webpackChunk=self.webpackChunk||[]).push([[3031,9899,1824],{9193:()=>{!function(t,e,s){"use strict";t.fn.hideseek=function(e){e=t.extend({list:".hideseek-data",nodata:"",attribute:"text",matches:!1,highlight:!1,ignore:"",headers:"",navigation:!1,ignore_accents:!1,hidden_mode:!1,min_chars:1},e);return this.each((function(){var s=t(this);s.opts=[],t.map(["list","nodata","attribute","matches","highlight","ignore","headers","navigation","ignore_accents","hidden_mode","min_chars"],(function(t,a){s.opts[t]=s.data(t)||e[t]})),s.opts.headers&&(s.opts.ignore+=s.opts.ignore?", "+s.opts.headers:s.opts.headers);var a=t(s.opts.list);s.opts.navigation&&s.attr("autocomplete","off"),s.opts.hidden_mode&&a.children().hide(),s.keyup((function(e){if(-1==[38,40,13].indexOf(e.keyCode)&&(8==e.keyCode||s.val().length>=s.opts.min_chars)){var r=s.val().toLowerCase();a.children(s.opts.ignore.trim()?":not("+s.opts.ignore+")":"").removeClass("selected").each((function(){var e=("text"!=s.opts.attribute?t(this).attr(s.opts.attribute)||"":t(this).text()).toLowerCase();-1==e.removeAccents(s.opts.ignore_accents).indexOf(r)||r===(!!s.opts.hidden_mode&&"")?t(this).hide():(i(t(this)),s.opts.matches&&null!==r.match(new RegExp(Object.keys(s.opts.matches)[0]))&&(null!==e.match(new RegExp(Object.values(s.opts.matches)[0]))?i(t(this)):t(this).hide())),s.trigger("_after_each")})),s.opts.nodata&&(a.find(".no-results").remove(),a.children(':not([style*="display: none"])').length||(a.children().first().clone().removeHighlight().addClass("no-results").show().prependTo(s.opts.list).text(s.opts.nodata),s.trigger("_after_nodata"))),s.opts.headers&&t(s.opts.headers,a).each((function(){t(this).nextUntil(s.opts.headers).not('[style*="display: none"],'+s.opts.ignore).length?t(this).show():t(this).hide()})),s.trigger("_after")}function i(t){s.opts.highlight?t.removeHighlight().highlight(r).show():t.show()}function n(t){return t.children(".selected:visible")}var o;s.opts.navigation&&(38==e.keyCode?n(a).length?((o=a,n(o).prevAll(":visible:first")).addClass("selected"),n(a).last().removeClass("selected")):a.children(":visible").last().addClass("selected"):40==e.keyCode?n(a).length?(function(t){return n(t).nextAll(":visible:first")}(a).addClass("selected"),n(a).first().removeClass("selected")):a.children(":visible").first().addClass("selected"):13==e.keyCode&&(n(a).find("a").length?document.location=n(a).find("a").attr("href"):s.val(n(a).text())))}))}))},t(document).ready((function(){t('[data-toggle="hideseek"]').hideseek()}))}(jQuery),jQuery.fn.highlight=function(t){function e(t,s){var a=0;if(3==t.nodeType){var r=t.data.removeAccents(!0).toUpperCase().indexOf(s);if(r>=0){var i=document.createElement("mark");i.className="highlight";var n=t.splitText(r);n.splitText(s.length);var o=n.cloneNode(!0);i.appendChild(o),n.parentNode.replaceChild(i,n),a=1}}else if(1==t.nodeType&&t.childNodes&&!/(script|style)/i.test(t.tagName))for(var l=0;l<t.childNodes.length;++l)l+=e(t.childNodes[l],s);return a}return this.length&&t&&t.length?this.each((function(){e(this,t.toUpperCase())})):this},jQuery.fn.removeHighlight=function(){return this.find("mark.highlight").each((function(){with(this.parentNode.firstChild.nodeName,this.parentNode)replaceChild(this.firstChild,this),normalize()})).end()},String.prototype.removeAccents=function(t){return t?this.replace(/[áàãâä]/gi,"a").replace(/[éè¨ê]/gi,"e").replace(/[íìïî]/gi,"i").replace(/[óòöôõ]/gi,"o").replace(/[úùüû]/gi,"u").replace(/[ç]/gi,"c").replace(/[ñ]/gi,"n"):this}},739:(t,e,s)=>{"use strict";s.d(e,{Z:()=>i});var a=s(1519),r=s.n(a)()((function(t){return t[1]}));r.push([t.id,".nav-menu[data-v-1b443399]{height:60px!important}.logo[data-v-1b443399]{background:#222d32!important;height:60px}",""]);const i=r},5264:(t,e,s)=>{"use strict";s.d(e,{Z:()=>i});var a=s(1519),r=s.n(a)()((function(t){return t[1]}));r.push([t.id,".wrapper.fixed_layout .main-header{position:fixed;width:100%}.wrapper.fixed_layout .content-wrapper{padding-top:50px}.wrapper.fixed_layout .main-sidebar{height:100vh;position:fixed}@media (max-width:767px){.wrapper.hide_logo .main-header .logo{display:none}}.logo-lg,.logo-mini{text-align:left}.logo-lg img,.logo-mini img{padding:.4em!important}.logo-lg img{display:-webkit-inline-box;width:25%}.user-panel{height:4em}hr.visible-xs-block{background-color:rgba(0,0,0,.17);border-color:transparent;height:1px;width:100%}",""]);const i=r},996:(t,e,s)=>{"use strict";s.d(e,{Z:()=>i});var a=s(1519),r=s.n(a)()((function(t){return t[1]}));r.push([t.id,".sidebar-menu>li>a{padding:12px 15px}.sidebar-menu li.active>a>.fa-angle-left,.sidebar-menu li.active>a>.pull-right-container>.fa-angle-left{animation-duration:.2s;animation-fill-mode:forwards;animation-name:rotate}.treeview-title{z-index:1}@keyframes rotate{0%{transform:rotate(0deg)}to{transform:rotate(-90deg)}}",""]);const i=r},7085:(t,e,s)=>{"use strict";s.d(e,{Z:()=>i});var a=s(1519),r=s.n(a)()((function(t){return t[1]}));r.push([t.id,".user-panel .image img{border-radius:50%}#searchForm{padding-left:0;padding-right:0}#searchContainer{height:100%;padding-bottom:0}#search{float:right;width:80%}#search-btn{width:20%}",""]);const i=r},7788:(t,e,s)=>{"use strict";s.d(e,{Z:()=>i});var a=s(1519),r=s.n(a)()((function(t){return t[1]}));r.push([t.id,".user-menu[data-v-d4c71fd2]{margin-bottom:.4rem}.user-menu a[data-v-d4c71fd2]{color:#3b82f6!important}.icon_user[data-v-d4c71fd2]{background:hsla(34,3%,60%,.438);border-radius:50%;padding:.5rem}",""]);const i=r},9507:(t,e,s)=>{"use strict";s.d(e,{Z:()=>i});var a=s(1519),r=s.n(a)()((function(t){return t[1]}));r.push([t.id,".list_icon_crud[data-v-58ec2cbf]{box-shadow:0 7px 29px 0 hsla(240,5%,41%,.2);display:inline-grid;right:-40px;top:20px;z-index:111}.btn_crud[data-v-58ec2cbf]{font-size:20px}",""]);const i=r},1519:t=>{"use strict";t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var s=t(e);return e[2]?"@media ".concat(e[2]," {").concat(s,"}"):s})).join("")},e.i=function(t,s,a){"string"==typeof t&&(t=[[null,t,""]]);var r={};if(a)for(var i=0;i<this.length;i++){var n=this[i][0];null!=n&&(r[n]=!0)}for(var o=0;o<t.length;o++){var l=[].concat(t[o]);a&&r[l[0]]||(s&&(l[2]?l[2]="".concat(s," and ").concat(l[2]):l[2]=s),e.push(l))}},e}},3379:(t,e,s)=>{"use strict";var a,r=function(){return void 0===a&&(a=Boolean(window&&document&&document.all&&!window.atob)),a},i=function(){var t={};return function(e){if(void 0===t[e]){var s=document.querySelector(e);if(window.HTMLIFrameElement&&s instanceof window.HTMLIFrameElement)try{s=s.contentDocument.head}catch(t){s=null}t[e]=s}return t[e]}}(),n=[];function o(t){for(var e=-1,s=0;s<n.length;s++)if(n[s].identifier===t){e=s;break}return e}function l(t,e){for(var s={},a=[],r=0;r<t.length;r++){var i=t[r],l=e.base?i[0]+e.base:i[0],c=s[l]||0,d="".concat(l," ").concat(c);s[l]=c+1;var u=o(d),p={css:i[1],media:i[2],sourceMap:i[3]};-1!==u?(n[u].references++,n[u].updater(p)):n.push({identifier:d,updater:h(p,e),references:1}),a.push(d)}return a}function c(t){var e=document.createElement("style"),a=t.attributes||{};if(void 0===a.nonce){var r=s.nc;r&&(a.nonce=r)}if(Object.keys(a).forEach((function(t){e.setAttribute(t,a[t])})),"function"==typeof t.insert)t.insert(e);else{var n=i(t.insert||"head");if(!n)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");n.appendChild(e)}return e}var d,u=(d=[],function(t,e){return d[t]=e,d.filter(Boolean).join("\n")});function p(t,e,s,a){var r=s?"":a.media?"@media ".concat(a.media," {").concat(a.css,"}"):a.css;if(t.styleSheet)t.styleSheet.cssText=u(e,r);else{var i=document.createTextNode(r),n=t.childNodes;n[e]&&t.removeChild(n[e]),n.length?t.insertBefore(i,n[e]):t.appendChild(i)}}function f(t,e,s){var a=s.css,r=s.media,i=s.sourceMap;if(r?t.setAttribute("media",r):t.removeAttribute("media"),i&&"undefined"!=typeof btoa&&(a+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i))))," */")),t.styleSheet)t.styleSheet.cssText=a;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(a))}}var m=null,v=0;function h(t,e){var s,a,r;if(e.singleton){var i=v++;s=m||(m=c(e)),a=p.bind(null,s,i,!1),r=p.bind(null,s,i,!0)}else s=c(e),a=f.bind(null,s,e),r=function(){!function(t){if(null===t.parentNode)return!1;t.parentNode.removeChild(t)}(s)};return a(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;a(t=e)}else r()}}t.exports=function(t,e){(e=e||{}).singleton||"boolean"==typeof e.singleton||(e.singleton=r());var s=l(t=t||[],e);return function(t){if(t=t||[],"[object Array]"===Object.prototype.toString.call(t)){for(var a=0;a<s.length;a++){var r=o(s[a]);n[r].references--}for(var i=l(t,e),c=0;c<s.length;c++){var d=o(s[c]);0===n[d].references&&(n[d].updater(),n.splice(d,1))}s=i}}}},4013:(t,e,s)=>{"use strict";s.d(e,{Z:()=>r});const a={name:"Alert",props:{dismissible:{type:Boolean,default:!0}}};const r=(0,s(1900).Z)(a,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return t.$page.props.flash.warning||Object.keys(t.$page.props.errors).length>0?s("div",{class:["alert","alert-error",{"alert-dismissible":t.dismissible}]},[t.dismissible?s("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-hidden":"true"}},[t._v("×")]):t._e(),t._v(" "),s("h4",[Object.keys(t.$page.props.errors).length>0?s("i",{staticClass:"fa fa-warning"}):t._e(),t._v(" "),Object.keys(t.$page.props.errors).length>0?s("span",[t._v("There are "+t._s(Object.keys(t.$page.props.errors).length)+" form errors.")]):t._e(),t._v(" "),t.$page.props.flash.warning?s("i",{staticClass:"fa fa-warning"}):t._e(),t._v(" "),t.$page.props.flash.warning?s("span",[t._v(t._s(t.$page.props.flash.warning))]):t._e()]),t._v(" "),s("span",[t._t("default")],2)]):t.$page.props.flash.success?s("div",{class:["alert","alert-success",{"alert-dismissible":t.dismissible}]},[t.dismissible?s("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-hidden":"true"}},[t._v("×")]):t._e(),t._v(" "),s("h4",[s("i",{staticClass:"fa fa-check"}),t._v(" "),s("span",[t._v(t._s(t.$page.props.flash.success))])]),t._v(" "),s("span",[t._t("default")],2)]):t._e()}),[],!1,null,null,null).exports},8489:(t,e,s)=>{"use strict";s.d(e,{Z:()=>Z});const a={data:function(){return{year:(new Date).getFullYear()}}};var r=s(1900);const i=(0,r.Z)(a,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("footer",{staticClass:"main-footer"},[s("strong",[t._v("Copyright © "+t._s(t.year)+"\n  "),s("a",{attrs:{href:"javascript:;"}}),t._v(".")]),t._v(" All rights reserved.\n")])}),[],!1,null,null,null).exports;var n=s(6454);const o={components:{Link:n.rU},methods:{logout:function(){this.$inertia.post(route("logout"))}}};var l=s(3379),c=s.n(l),d=s(7788),u={insert:"head",singleton:!1};c()(d.Z,u);d.Z.locals;const p=(0,r.Z)(o,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("ul",{staticClass:"nav navbar-nav flex flex-row"},[s("li",{staticClass:" user user-menu"},[s("a",{staticClass:"bg-blue-200 text-sm hover:bg-blue-400 text-blue-500 px-3 py-2 rounded-lg",attrs:{href:""}},[s("font-awesome-icon",{attrs:{icon:["fas","eye"]}}),t._v("\n        Xem cửa hàng\n  ")],1)]),t._v(" "),s("li",{staticClass:"dropdown user user-menu ml-3"},[s("a",{staticClass:"dropdown-toggle text-sm",attrs:{href:"javascript:;","data-toggle":"dropdown"}},[s("img",{staticClass:"user-image",attrs:{src:t.$page.props.auth.user.avatar,alt:"User Image"}}),t._v(" "),s("span",{staticClass:"hidden-xs  text-black font-semibold "},[t._v(t._s(t.$page.props.auth.user.name))])]),t._v(" "),s("ul",{staticClass:"dropdown-menu"},[s("li",{staticClass:"user-header",staticStyle:{height:"auto","min-height":"85px","padding-bottom":"15px"}},[s("p",[s("span",[t._v(t._s(t.$page.props.auth.user.name))]),t._v(" "),t._l(t.$page.props.auth.user.roles,(function(e){return s("small",{key:e},[t._v(t._s(e))])}))],2)]),t._v(" "),s("li",{staticClass:"user-footer"},[s("a",{staticClass:"btn btn-default btn-flat btn-block",on:{click:function(e){return t.logout()}}},[t._v("Logout")])])])])])}),[],!1,null,"d4c71fd2",null).exports,f={components:{UserMenu:p}};var m=s(739),v={insert:"head",singleton:!1};c()(m.Z,v);m.Z.locals;const h=(0,r.Z)(f,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("header",{staticClass:"main-header bg-white"},[t._m(0),t._v(" "),s("nav",{staticClass:"navbar navbar-static-top bg-white nav-manu",staticStyle:{height:"60px"},attrs:{role:"navigation"}},[t._m(1),t._v(" "),s("div",{staticClass:"navbar-custom-menu"},[s("UserMenu")],1)])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("span",{staticClass:"logo-mini"},[e("a",{attrs:{href:"/"}},[e("img",{staticClass:"img-responsive center-block logo bg-[#222d32]",attrs:{src:"/img/logo_cartonshop.png",alt:"Logo"}})])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("a",{staticClass:"sidebar-toggle",staticStyle:{color:"#000"},attrs:{href:"javascript:;","data-toggle":"offcanvas",role:"button"}},[s("span",{staticClass:"sr-only"},[t._v("Toggle navigation")])])}],!1,null,"1b443399",null).exports;const g={components:{Link:n.rU},mounted:function(){}};var _=s(996),b={insert:"head",singleton:!1};c()(_.Z,b);_.Z.locals;const C=(0,r.Z)(g,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("ul",{staticClass:"sidebar-menu"},[s("li",{class:["CartonShop/Dashboard"===t.$page.component?"active":""],attrs:{tag:"li"}},[s("Link",{attrs:{href:t.route("dashboard")}},[s("i",{staticClass:"fa fa-desktop"}),t._v(" "),s("span",{staticClass:"page"},[t._v("Tổng Quan")])])],1),t._v(" "),s("li",{staticClass:"treeview"},[t._m(0),t._v(" "),s("ul",{staticClass:"treeview-menu"},[s("li",{class:["OrderManagement/OrderWait"===t.$page.component?"active":""]},[s("Link",{attrs:{href:t.route("orders.pending")}},[s("i",{staticClass:"fa fa-table"}),t._v(" Đơn hàng\n        ")])],1),t._v(" "),s("li",{class:["Shipping/Index"===t.$page.component?"active":""]},[s("Link",{attrs:{href:t.route("shipping-fee.index")}},[s("i",{staticClass:"fa fa-check-circle"}),t._v(" Phí ship\n        ")])],1)])]),t._v(" "),t.hasAnyPermission(["users-manager"])?s("li",{staticClass:"header"},[t._v("User managerment")]):t._e(),t._v(" "),t.hasAnyPermission(["users-manager"])?s("li",{staticClass:"treeview"},[t._m(1),t._v(" "),s("ul",{staticClass:"treeview-menu"},[s("li",{class:["Admin/Permission"===t.$page.component?"active":""]},[s("Link",{attrs:{href:t.route("permissions.index")}},[s("i",{staticClass:"fa fa-shield"}),t._v(" Permissions\n        ")])],1),t._v(" "),s("li",{class:["Admin/Roles"===t.$page.component?"active":""]},[s("Link",{attrs:{href:t.route("roles.index")}},[s("i",{staticClass:"fa fa-check-circle"}),t._v(" Roles\n        ")])],1),t._v(" "),s("li",{class:["Admin/User"===t.$page.component?"active":""]},[s("Link",{attrs:{href:t.route("users.index")}},[s("i",{staticClass:"fa fa-users"}),t._v(" Users\n        ")])],1)])]):t._e(),t._v(" "),s("li",{staticClass:"treeview"},[t._m(2),t._v(" "),s("ul",{staticClass:"treeview-menu"},[s("li",[s("Link",{attrs:{href:t.route("warehouse.index")}},[s("i",{staticClass:"fa fa-file-word-o"}),t._v(" Kho hàng\n        ")])],1),t._v(" "),s("li",{class:["CategoryProduct/Index"===t.$page.component?"active":""]},[s("Link",{attrs:{href:t.route("categories.index")}},[s("i",{staticClass:"fa fa-file-picture-o"}),t._v(" Danh mục sản phẩm\n        ")])],1),t._v(" "),s("li",{class:["AttributeCategory/Index"===t.$page.component?"active":""]},[s("Link",{attrs:{href:t.route("attributes.index")}},[s("i",{staticClass:"fa fa-file-picture-o"}),t._v(" Thuộc tính\n        ")])],1),t._v(" "),s("li",[s("Link",{attrs:{href:t.route("sales.index")}},[s("i",{staticClass:"fa fa-file-pdf-o"}),t._v(" Chương trình sales\n        ")])],1)])]),t._v(" "),t.hasAnyPermission(["users-manager"])?s("li",{staticClass:"pageli",class:["Payment/PaymentManagement"===t.$page.component?"active":""],attrs:{tag:"li"}},[s("Link",{attrs:{href:t.route("payment.index")}},[s("i",{staticClass:"fa fa-check-circle"}),t._v(" "),s("span",{staticClass:"page"},[t._v("Quản lý thanh toán")])])],1):t._e(),t._v(" "),t.hasAnyPermission(["users-manager"])?s("li",{staticClass:"treeview"},[s("a",{attrs:{href:"#"}},[s("font-awesome-icon",{attrs:{icon:["fab","blogger-b"]}}),t._v(" "),s("span",{staticClass:"treeview-title"},[t._v("Bài viết")]),t._v(" "),s("span",{staticClass:"pull-right-container pull-right"})],1),t._v(" "),t.hasAnyPermission(["users-manager"])?s("ul",{staticClass:"treeview-menu"},[s("li",{class:["AttributeCategory/Index"===t.$page.component?"active":""]},[s("Link",{attrs:{href:t.route("tag.index")}},[s("font-awesome-icon",{attrs:{icon:["fas","tag"]}}),t._v("Tag\n        ")],1)],1),t._v(" "),t.hasAnyPermission(["users-manager"])?s("li",[s("Link",{attrs:{href:t.route("post.index")}},[t._v("Bài viết")])],1):t._e()]):t._e()]):t._e(),t._v(" "),t.hasAnyPermission(["users-manager"])?s("li",{staticClass:"treeview"},[t._m(3),t._v(" "),s("ul",{staticClass:"treeview-menu"},[s("li",[s("Link",{attrs:{href:t.route("home.index")}},[s("i",{staticClass:"fa fa-shield"}),t._v(" Trang chủ\n        ")])],1),t._v(" "),s("li",{class:["Setting/AboutUs"===t.$page.component?"active":""]},[s("Link",{attrs:{href:t.route("about-us.index")}},[s("i",{staticClass:"fa fa-users"}),t._v(" Về chúng tôi\n        ")])],1)])]):t._e(),t._v(" "),s("li",{staticClass:"pageli",attrs:{tag:"li"}},[s("Link",{attrs:{href:t.route("customers.index")}},[s("i",{staticClass:"fa fa-book"}),t._v(" "),s("span",{staticClass:"page"},[t._v("Dữ liệu khách hàng")])])],1),t._v(" "),s("li",{staticClass:"pageli",attrs:{tag:"li"}},[s("Link",{attrs:{href:t.route("setting.index")}},[s("i",{staticClass:"fa fa-hdd-o"}),t._v(" "),s("span",{staticClass:"page"},[t._v("Cài đặt thông tin chung")])])],1),t._v(" "),s("li",{staticClass:"header"},[t._v("PAGES")]),t._v(" "),t._m(4),t._v(" "),t._m(5)])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("a",{attrs:{href:"#"}},[s("i",{staticClass:"fa fa-table"}),t._v(" "),s("span",{staticClass:"treeview-title"},[t._v("Quản lý đơn hàng")]),t._v(" "),s("span",{staticClass:"pull-right-container pull-right"},[s("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("a",{attrs:{href:"#"}},[s("i",{staticClass:"fa fa-list"}),t._v(" "),s("span",{staticClass:"treeview-title"},[t._v("User managerment")]),t._v(" "),s("span",{staticClass:"pull-right-container pull-right"},[s("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("a",{attrs:{href:"#"}},[s("i",{staticClass:"fa fa-folder-o"}),t._v(" "),s("span",{staticClass:"treeview-title"},[t._v("Sản phẩm")]),t._v(" "),s("span",{staticClass:"pull-right-container pull-right"},[s("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("a",{attrs:{href:"#"}},[s("i",{staticClass:"fa fa-list"}),t._v(" "),s("span",{staticClass:"treeview-title"},[t._v("Trang")]),t._v(" "),s("span",{staticClass:"pull-right-container pull-right"},[s("i",{staticClass:"fa fa-angle-left fa-fw"})])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("li",{staticClass:"pageli",attrs:{tag:"li"}},[s("a",[s("i",{staticClass:"fa fa-circle-o text-yellow"}),t._v(" "),s("span",{staticClass:"page"},[t._v("Login")])])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("li",{staticClass:"pageli",attrs:{tag:"li"}},[s("a",[s("i",{staticClass:"fa fa-circle-o text-red"}),t._v(" "),s("span",{staticClass:"page"},[t._v("404")])])])}],!1,null,null,null).exports;const x={components:{Menu:C},mounted:function(){$('[data-toggle="hideseek"]').off().hideseek()}};var y=s(7085),w={insert:"head",singleton:!1};c()(y.Z,w);y.Z.locals;const k=(0,r.Z)(x,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("aside",{staticClass:"main-sidebar"},[s("section",{staticClass:"sidebar"},[s("div",{staticClass:"user-panel mt-8"},[s("div",{staticClass:"pull-left image"},[t.$page.props.auth.user?s("img",{attrs:{src:t.$page.props.auth.user.avatar}}):t._e()]),t._v(" "),s("div",{staticClass:"pull-left info"},[s("div",[t.$page.props.auth.user?s("p",{staticClass:"white"},[t._v(t._s(t.$page.props.auth.user.name))]):t._e()]),t._v(" "),t._m(0)])]),t._v(" "),s("form",{staticClass:"sidebar-form",attrs:{id:"searchForm"},on:{submit:function(t){t.preventDefault()}}},[t._m(1)]),t._v(" "),s("Menu")],1)])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("a",{attrs:{href:"javascript:;"}},[s("i",{staticClass:"fa fa-circle text-success"}),t._v(" Online\n        ")])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"input-group",attrs:{id:"searchContainer"}},[s("span",{staticClass:"input-group-btn"},[s("input",{staticClass:"search form-control",attrs:{type:"text",name:"search",id:"search","data-toggle":"hideseek",laceholder:"Search Menus","data-list":".sidebar-menu"}}),t._v(" "),s("button",{staticClass:"btn btn-flat",attrs:{type:"submit",name:"search",id:"search-btn"}},[s("i",{staticClass:"fa fa-search"})])])])}],!1,null,null,null).exports,S=!0,E=!0;s(9193);const L={components:{DashFooter:i,Header:h,Menu:C,SiderBar:k,UserMenu:p},data:function(){return{classes:{fixed_layout:S,hide_logo:E}}}};var j=s(5264),A={insert:"head",singleton:!1};c()(j.Z,A);j.Z.locals;const Z=(0,r.Z)(L,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{class:["wrapper",t.classes]},[s("Header"),t._v(" "),s("SiderBar"),t._v(" "),s("div",{staticClass:"content-wrapper"},[t._t("default")],2),t._v(" "),s("dash-footer")],1)}),[],!1,null,null,null).exports},9899:(t,e,s)=>{"use strict";s.r(e),s.d(e,{default:()=>r});const a={};const r=(0,s(1900).Z)(a,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"form_search w-1/4 mt-5"},[s("form",{on:{submit:function(t){t.preventDefault()}}},[s("div",{staticClass:"relative"},[s("div",{staticClass:"absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"},[s("svg",{staticClass:"w-5 h-5 text-sm text-gray-500 dark:text-gray-400",attrs:{"aria-hidden":"true",fill:"none",stroke:"currentColor",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"}},[s("path",{attrs:{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"}})])]),t._v(" "),s("input",{staticClass:"block w-full p-2 pl-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",attrs:{type:"search",id:"default-search",name:"search","data-toggle":"hideseek",laceholder:"Search Menus","data-list":".menu-category",placeholder:"Search",required:""}})])])])}),[],!1,null,null,null).exports},3031:(t,e,s)=>{"use strict";s.r(e),s.d(e,{default:()=>f});var a=s(6454),r=s(8489),i=s(4013),n=s(9899),o=s(1824);const l={layout:r.Z,components:{Link:a.rU,Alert:i.Z,SearchCategory:n.default,Head:a.Fb,Header:o.default},props:{categories:Array,errors:Object,category:Object},data:function(){return{editorData:"<p>Content of the editor.</p>",editorConfig:{},images:[],form:this.$inertia.form({name:null,description:null,SKU:null,status:!0,auto_sold:!0,quantity_sold:null,category_id:null,price:null,cost:null,images:null,arrayValues:[]})}},mounted:function(){$(".list_icon_crud").hide(),$(".item_crud").click((function(t){$(".list_icon_crud").hide(),t.preventDefault(),$(this).next(".list_icon_crud").slideToggle()}))},methods:{save:function(){var t=this;this.form.post(route("warehouse.store",this.form.id),{preserveState:!0,onError:function(t){Object.keys(t).length},onSuccess:function(e){t.form.reset()}})},onFileChange:function(t){var e=t.target.files;if(this.images=[],e.length>0)for(var s=0;s<e.length;s++)console.log(e[s]),this.images.push({name:e[s].name,image:URL.createObjectURL(e[s])});else this.images=[]}}};var c=s(3379),d=s.n(c),u=s(9507),p={insert:"head",singleton:!1};d()(u.Z,p);u.Z.locals;const f=(0,s(1900).Z)(l,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("section",{staticClass:"content"},[s("Head",{attrs:{title:"Thêm sản phẩm"}}),t._v(" "),s("div",[s("div",{staticClass:"m-8"},[s("form",[s("div",{staticClass:"p-4"},[s("Header",{attrs:{name:"Thêm sản phẩm mới",category:t.category}}),t._v(" "),s("div",[s("div",{staticClass:"grid grid-cols-3 gap-4"},[s("div",{staticClass:"col-span-2"},[s("div",[s("h3",{staticClass:"font-semibold text-lg"},[t._v("Thông tin sản phẩm")]),t._v(" "),s("div",{staticClass:"bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"},[s("div",{staticClass:"mb-6 form-group",class:t.errors.name?"has-error":""},[s("label",{staticClass:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},[t._v("\n                        Tên\n                        sản phẩm\n                      ")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.form.name,expression:"form.name"}],staticClass:"block mb-2 font-medium form-control text-sm rounded-lg",class:t.errors.name?"has-error":"",domProps:{value:t.form.name},on:{input:function(e){e.target.composing||t.$set(t.form,"name",e.target.value)}}}),t._v(" "),t.errors.name?s("div",{staticClass:"text-rose-600"},[t._v(t._s(t.errors.name))]):t._e()]),t._v(" "),s("div",{staticClass:"mb-6 form-group",class:t.errors.description?"has-error":""},[s("label",{staticClass:"block mb-2 text-sm font-medium text-gray-900 dark:text-white",attrs:{for:""}},[t._v("\n                        Mô\n                        tả\n                        sản phẩm\n                      ")]),t._v(" "),s("ckeditor",{attrs:{config:t.editorConfig},model:{value:t.form.description,callback:function(e){t.$set(t.form,"description",e)},expression:"form.description"}}),t._v(" "),t.errors.name?s("div",{staticClass:"text-rose-600"},[t._v(t._s(t.errors.description))]):t._e()],1)])]),t._v(" "),s("div",[s("h3",{staticClass:"font-semibold text-lg"},[t._v("Hình ảnh")]),t._v(" "),s("div",{staticClass:"bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"},[s("div",{staticClass:"text-center my-3",attrs:{"data-v-24fde35b":""}},[s("div",{staticClass:"flex items-center justify-center w-full",attrs:{"data-v-24fde35b":""}},[s("label",{staticClass:"flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600",attrs:{"data-v-24fde35b":"",for:"dropzone-file"}},[s("div",{staticClass:"flex flex-col items-center justify-center pt-2 pb-3",attrs:{"data-v-24fde35b":""}},[s("svg",{staticClass:"w-10 h-10 mb-3 text-gray-400",attrs:{"data-v-24fde35b":"","aria-hidden":"true",fill:"none",stroke:"currentColor",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"}},[s("path",{attrs:{"data-v-24fde35b":"","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"}})]),t._v(" "),t._m(0),t._v(" "),s("p",{staticClass:"text-xs text-gray-500 dark:text-gray-400",attrs:{"data-v-24fde35b":""}},[t._v("\n                              SVG, PNG,\n                              JPG\n                              or GIF (MAX. 40x40px)\n                            ")])]),t._v(" "),s("input",{staticClass:"hidden",attrs:{"data-v-24fde35b":"",id:"dropzone-file",type:"file",accept:"image/*",multiple:""},on:{input:function(e){t.form.images=e.target.files},change:t.onFileChange}}),t._v(" "),t.errors.images?s("div",{staticClass:"text-rose-600"},[t._v(t._s(t.errors.images))]):t._e()])])]),t._v(" "),s("div",{staticClass:"container mx-auto px-5 py-2 lg:px-32 lg:pt-12"},[s("div",{staticClass:"-m-1 flex flex-wrap md:-m-2"},t._l(t.images,(function(e,a){return s("div",{key:a,staticClass:"flex w-1/3 flex-wrap"},[s("div",{staticClass:"w-full p-1 md:p-2"},[s("font-awesome-icon",{attrs:{icon:["fas","delete-left"]}}),t._v(" "),s("img",{staticClass:"block h-50 w-50 rounded-lg object-cover object-center",attrs:{alt:"gallery",src:e.image}})],1)])})),0)])])])]),t._v(" "),s("div",[s("h3",{staticClass:"font-semibold text-lg"},[t._v("Định giá")]),t._v(" "),s("div",{staticClass:"bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"},[s("div",{staticClass:"mb-6 form-group",class:t.errors.cost?"has-error":""},[s("label",{staticClass:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},[t._v("\n                      Giá\n                      bán\n                    ")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.form.cost,expression:"form.cost"}],staticClass:"block mb-2 font-medium form-control text-sm rounded-lg",attrs:{type:"number"},domProps:{value:t.form.cost},on:{input:function(e){e.target.composing||t.$set(t.form,"cost",e.target.value)}}}),t._v(" "),t.errors.cost?s("div",{staticClass:"text-rose-600"},[t._v(t._s(t.errors.cost))]):t._e()]),t._v(" "),s("div",{staticClass:"mb-6 form-group",class:t.errors.price?"has-error":""},[s("label",{staticClass:"block mb-2 text-sm font-medium text-gray-900 dark:text-white",attrs:{for:""}},[t._v("Giá gốc")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.form.price,expression:"form.price"}],staticClass:"block mb-2 font-medium form-control text-sm rounded-lg",attrs:{type:"number"},domProps:{value:t.form.price},on:{input:function(e){e.target.composing||t.$set(t.form,"price",e.target.value)}}}),t._v(" "),t.errors.price?s("div",{staticClass:"text-rose-600"},[t._v(t._s(t.errors.price))]):t._e()])]),t._v(" "),s("div",[s("h3",{staticClass:"font-semibold text-lg"},[t._v("Số lượng")]),t._v(" "),s("div",{staticClass:"bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"},[s("div",{staticClass:"mb-6 form-group",class:t.errors.status?"has-error":""},[s("label",{staticClass:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},[t._v("\n                        Tình\n                        trạng\n                      ")]),t._v(" "),s("select",{directives:[{name:"model",rawName:"v-model",value:t.form.status,expression:"form.status"}],staticClass:"block mb-2 font-medium form-control text-sm rounded-lg",attrs:{id:"countries"},on:{change:function(e){var s=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.$set(t.form,"status",e.target.multiple?s:s[0])}}},[s("option",{domProps:{value:!0}},[t._v("Còn hàng")]),t._v(" "),s("option",{domProps:{value:!1}},[t._v("Hết hàng")]),t._v(" "),t.errors.status?s("div",{staticClass:"text-rose-600"},[t._v(t._s(t.errors.status))]):t._e()])]),t._v(" "),s("div",{staticClass:"mb-6 form-group",class:t.errors.auto_sold?"has-error":""},[s("label",{staticClass:"block mb-2 text-sm font-medium text-gray-900 dark:text-white",attrs:{for:""}},[t._v("\n                        Số\n                        lượng đã bán\n                      ")]),t._v(" "),s("select",{directives:[{name:"model",rawName:"v-model",value:t.form.auto_sold,expression:"form.auto_sold"}],staticClass:"block mb-2 font-medium form-control text-sm rounded-lg",attrs:{id:"countries"},on:{change:function(e){var s=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.$set(t.form,"auto_sold",e.target.multiple?s:s[0])}}},[s("option",{domProps:{value:!0}},[t._v("Auto")]),t._v(" "),s("option",{domProps:{value:!1}},[t._v("Nhập")])]),t._v(" "),t.errors.auto_sold?s("div",{staticClass:"text-rose-600"},[t._v(t._s(t.errors.auto_sold))]):t._e()]),t._v(" "),0==t.form.auto_sold?s("div",{staticClass:"mb-6 form-group",class:t.errors.quantity_sold?"has-error":""},[s("label",{staticClass:"block mb-2 text-sm font-medium text-gray-900 dark:text-white",attrs:{for:""}},[t._v("\n                        Nhập\n                        Số\n                        lượng đã bán\n                      ")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.form.quantity_sold,expression:"form.quantity_sold"}],staticClass:"block mb-2 font-medium form-control text-sm rounded-lg",attrs:{type:"number",required:"",min:"0"},domProps:{value:t.form.quantity_sold},on:{input:function(e){e.target.composing||t.$set(t.form,"quantity_sold",e.target.value)}}}),t._v(" "),t.errors.quantity_sold?s("div",{staticClass:"text-rose-600"},[t._v("\n                        "+t._s(t.errors.quantity_sold)+"\n                      ")]):t._e()]):t._e()])]),t._v(" "),s("div",[s("h3",{staticClass:"font-semibold text-lg"},[t._v("Danh mục sản phẩm")]),t._v(" "),s("div",{staticClass:"bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"},[s("div",{staticClass:"mb-6 form-group",class:t.errors.category_id?"has-error":""},[s("label",{staticClass:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},[t._v("\n                        Giá\n                        bán\n                      ")]),t._v(" "),s("select",{directives:[{name:"model",rawName:"v-model",value:t.form.category_id,expression:"form.category_id"}],staticClass:"block mb-2 font-medium form-control text-sm rounded-lg",attrs:{id:"countries"},on:{change:function(e){var s=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.$set(t.form,"category_id",e.target.multiple?s:s[0])}}},[s("option",{domProps:{value:null}},[t._v("Danh mục sản phẩm")]),t._v(" "),t._l(t.categories,(function(e,a){return s("option",{key:a,domProps:{value:e.id}},[t._v(t._s(e.name))])}))],2),t._v(" "),t.errors.category_id?s("div",{staticClass:"text-rose-600"},[t._v("\n                        "+t._s(t.errors.category_id)+"\n                      ")]):t._e()])])])])]),t._v(" "),s("div",{staticClass:"my-3 justify-end text-end"},[s("button",{staticClass:"px-3 py-2 rounded-lg bg-primary",on:{click:function(e){return e.preventDefault(),t.save.apply(null,arguments)}}},[t._v("Lưu lại")])])])],1)])])])],1)}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("p",{staticClass:"mb-2 text-sm text-gray-500 dark:text-gray-400",attrs:{"data-v-24fde35b":""}},[s("span",{staticClass:"font-semibold",attrs:{"data-v-24fde35b":""}},[t._v("\n                                Click to\n                                upload\n                              ")]),t._v(" or drag and drop\n                            ")])}],!1,null,"58ec2cbf",null).exports},1824:(t,e,s)=>{"use strict";s.r(e),s.d(e,{default:()=>i});var a=s(6454);const r={props:{name:String,category:Object},components:{Link:a.rU}};const i=(0,s(1900).Z)(r,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"my-3 flex"},[s("Link",{staticClass:"px-3 mr-4 py-3 bg-white border rounded-lg",attrs:{href:t.route("warehouse.show",t.category.slug)}},[s("font-awesome-icon",{attrs:{icon:["fas","chevron-left"]}})],1),t._v(" "),s("div",{staticClass:"block"},[s("p",{staticClass:"text-gray-500 text-xs"},[t._v("Trở về kho hàng")]),t._v(" "),s("h2",{staticClass:"font-semibold text-3xl flex mr-2"},[t._v(t._s(t.name)+" ")])])],1)}),[],!1,null,null,null).exports},1900:(t,e,s)=>{"use strict";function a(t,e,s,a,r,i,n,o){var l,c="function"==typeof t?t.options:t;if(e&&(c.render=e,c.staticRenderFns=s,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId="data-v-"+i),n?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),r&&r.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(n)},c._ssrRegister=l):r&&(l=o?function(){r.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:r),l)if(c.functional){c._injectStyles=l;var d=c.render;c.render=function(t,e){return l.call(e),d(t,e)}}else{var u=c.beforeCreate;c.beforeCreate=u?[].concat(u,l):[l]}return{exports:t,options:c}}s.d(e,{Z:()=>a})}}]);