"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[1996],{7870:(e,t,r)=>{r.d(t,{Z:()=>n});var s=r(1519),o=r.n(s)()((function(e){return e[1]}));o.push([e.id,".show-password[data-v-6ee4531c]{cursor:pointer;font-size:22px;position:absolute;right:20px;top:50%;transform:translateY(-50%)}.form-floating-label[data-v-6ee4531c],.password-hidden[data-v-6ee4531c]{position:relative}.span-hidden[data-v-6ee4531c]{position:absolute;right:20px;top:30%;transition:auto}",""]);const n=o},1519:e=>{e.exports=function(e){var t=[];return t.toString=function(){return this.map((function(t){var r=e(t);return t[2]?"@media ".concat(t[2]," {").concat(r,"}"):r})).join("")},t.i=function(e,r,s){"string"==typeof e&&(e=[[null,e,""]]);var o={};if(s)for(var n=0;n<this.length;n++){var a=this[n][0];null!=a&&(o[a]=!0)}for(var i=0;i<e.length;i++){var l=[].concat(e[i]);s&&o[l[0]]||(r&&(l[2]?l[2]="".concat(r," and ").concat(l[2]):l[2]=r),t.push(l))}},t}},3379:(e,t,r)=>{var s,o=function(){return void 0===s&&(s=Boolean(window&&document&&document.all&&!window.atob)),s},n=function(){var e={};return function(t){if(void 0===e[t]){var r=document.querySelector(t);if(window.HTMLIFrameElement&&r instanceof window.HTMLIFrameElement)try{r=r.contentDocument.head}catch(e){r=null}e[t]=r}return e[t]}}(),a=[];function i(e){for(var t=-1,r=0;r<a.length;r++)if(a[r].identifier===e){t=r;break}return t}function l(e,t){for(var r={},s=[],o=0;o<e.length;o++){var n=e[o],l=t.base?n[0]+t.base:n[0],c=r[l]||0,d="".concat(l," ").concat(c);r[l]=c+1;var u=i(d),p={css:n[1],media:n[2],sourceMap:n[3]};-1!==u?(a[u].references++,a[u].updater(p)):a.push({identifier:d,updater:h(p,t),references:1}),s.push(d)}return s}function c(e){var t=document.createElement("style"),s=e.attributes||{};if(void 0===s.nonce){var o=r.nc;o&&(s.nonce=o)}if(Object.keys(s).forEach((function(e){t.setAttribute(e,s[e])})),"function"==typeof e.insert)e.insert(t);else{var a=n(e.insert||"head");if(!a)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");a.appendChild(t)}return t}var d,u=(d=[],function(e,t){return d[e]=t,d.filter(Boolean).join("\n")});function p(e,t,r,s){var o=r?"":s.media?"@media ".concat(s.media," {").concat(s.css,"}"):s.css;if(e.styleSheet)e.styleSheet.cssText=u(t,o);else{var n=document.createTextNode(o),a=e.childNodes;a[t]&&e.removeChild(a[t]),a.length?e.insertBefore(n,a[t]):e.appendChild(n)}}function f(e,t,r){var s=r.css,o=r.media,n=r.sourceMap;if(o?e.setAttribute("media",o):e.removeAttribute("media"),n&&"undefined"!=typeof btoa&&(s+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(n))))," */")),e.styleSheet)e.styleSheet.cssText=s;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(s))}}var m=null,v=0;function h(e,t){var r,s,o;if(t.singleton){var n=v++;r=m||(m=c(t)),s=p.bind(null,r,n,!1),o=p.bind(null,r,n,!0)}else r=c(t),s=f.bind(null,r,t),o=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(r)};return s(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;s(e=t)}else o()}}e.exports=function(e,t){(t=t||{}).singleton||"boolean"==typeof t.singleton||(t.singleton=o());var r=l(e=e||[],t);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var s=0;s<r.length;s++){var o=i(r[s]);a[o].references--}for(var n=l(e,t),c=0;c<r.length;c++){var d=i(r[c]);0===a[d].references&&(a[d].updater(),a.splice(d,1))}r=n}}}},6578:(e,t,r)=>{r.d(t,{Z:()=>o});const s={props:{loading:Boolean,type:{type:String,default:"submit"}}};const o=(0,r(1900).Z)(s,(function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("button",{staticClass:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150",attrs:{type:e.type,disabled:e.loading}},[e.loading?r("div",{staticClass:"btn-spinner mr-2"}):e._e(),e._v(" "),e._t("default")],2)}),[],!1,null,null,null).exports},3357:(e,t,r)=>{r.d(t,{Z:()=>o});const s={inheritAttrs:!1,props:{id:{type:String,default:function(){return"text-input-".concat(this._uid)}},type:{type:String,default:"text"},value:String,label:String,errors:{type:Array,default:function(){return[]}}},methods:{focus:function(){this.$refs.input.focus()},select:function(){this.$refs.input.select()},setSelectionRange:function(e,t){this.$refs.input.setSelectionRange(e,t)}}};const o=(0,r(1900).Z)(s,(function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",[e.label?r("label",{staticClass:"form-label",attrs:{for:e.id}},[e._v(e._s(e.label)+":")]):e._e(),e._v(" "),r("input",e._b({ref:"input",staticClass:"form-control text-sm rounded-lg",class:{error:e.errors.length},attrs:{id:e.id,type:e.type},domProps:{value:e.value},on:{input:function(t){return e.$emit("input",t.target.value)}}},"input",e.$attrs,!1)),e._v(" "),e.errors.length?r("div",{staticClass:"form-error text-red-500",attrs:{for:e.id}},[e._v(e._s(e.errors))]):e._e()])}),[],!1,null,null,null).exports},2775:(e,t,r)=>{r.d(t,{Z:()=>o});const s={props:["value"]};const o=(0,r(1900).Z)(s,(function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("label",{staticClass:"block font-medium text-sm text-gray-700"},[e.value?r("span",[e._v(e._s(e.value))]):r("span",[e._t("default")],2)])}),[],!1,null,null,null).exports},455:(e,t,r)=>{r.d(t,{Z:()=>o});const s={computed:{errors:function(){return this.$page.props.errors},hasErrors:function(){return Object.keys(this.errors).length>0}}};const o=(0,r(1900).Z)(s,(function(){var e=this,t=e.$createElement,r=e._self._c||t;return e.hasErrors?r("div",[r("div",{staticClass:"font-medium text-red-600"},[e._v("Whoops! Something went wrong.")]),e._v(" "),r("ul",{staticClass:"mt-3 list-disc list-inside text-sm text-red-600"},e._l(e.errors,(function(t,s){return r("li",{key:s},[e._v(e._s(t))])})),0)]):e._e()}),[],!1,null,null,null).exports},7061:(e,t,r)=>{r.d(t,{Z:()=>a});var s=r(6454),o=r(1900);const n={components:{BreezeApplicationLogo:(0,o.Z)({},(function(){var e=this.$createElement,t=this._self._c||e;return t("svg",{attrs:{viewBox:"0 0 316 316",xmlns:"http://www.w3.org/2000/svg"}},[t("path",{attrs:{d:"M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z"}})])}),[],!1,null,null,null).exports,Link:s.rU}};const a=(0,o.Z)(n,(function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"min-h-screen  flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"},[r("div",{staticClass:"w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"},[e._t("default")],2)])}),[],!1,null,null,null).exports},1996:(e,t,r)=>{r.r(t),r.d(t,{default:()=>g});var s=r(6578),o=r(7061),n=r(3357);const a={emits:["update:checked"],props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},computed:{proxyChecked:{get:function(){return this.checked},set:function(e){this.$emit("update:checked",e)}}}};var i=r(1900);const l=(0,i.Z)(a,(function(){var e=this,t=e.$createElement;return(e._self._c||t)("input",{directives:[{name:"model",rawName:"v-model",value:e.proxyChecked,expression:"proxyChecked"}],staticClass:"rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50",attrs:{type:"checkbox"},domProps:{value:e.value,checked:Array.isArray(e.proxyChecked)?e._i(e.proxyChecked,e.value)>-1:e.proxyChecked},on:{change:function(t){var r=e.proxyChecked,s=t.target,o=!!s.checked;if(Array.isArray(r)){var n=e.value,a=e._i(r,n);s.checked?a<0&&(e.proxyChecked=r.concat([n])):a>-1&&(e.proxyChecked=r.slice(0,a).concat(r.slice(a+1)))}else e.proxyChecked=o}}})}),[],!1,null,null,null).exports;var c=r(2775),d=r(455),u=r(6454);const p={layout:o.Z,components:{BreezeButton:s.Z,BreezeInput:n.Z,BreezeCheckbox:l,BreezeLabel:c.Z,BreezeValidationErrors:d.Z,Link:u.rU},props:{canResetPassword:Boolean,status:String},remember:{data:["form"]},data:function(){return{passwordFieldType:"password",form:this.$inertia.form({email:null,password:null,remember:!1})}},methods:{submit:function(){var e=this;this.form.post(this.route("login"),{onFinish:function(){return e.form.reset("password")}})},switchVisibility:function(){this.passwordFieldType="password"===this.passwordFieldType?"text":"password"}}};var f=r(3379),m=r.n(f),v=r(7870),h={insert:"head",singleton:!1};m()(v.Z,h);v.Z.locals;const g=(0,i.Z)(p,(function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",[r("breeze-validation-errors",{staticClass:"mb-4"}),e._v(" "),e.status?r("div",{staticClass:"mb-4 font-medium text-sm text-green-600"},[e._v(e._s(e.status))]):e._e(),e._v(" "),r("form",{on:{submit:function(t){return t.preventDefault(),e.submit.apply(null,arguments)}}},[e._m(0),e._v(" "),r("h1",{staticClass:"text-center"},[e._v("Login")]),e._v(" "),r("div",[r("breeze-label",{attrs:{for:"email",value:"Email"}}),e._v(" "),r("input",{directives:[{name:"model",rawName:"v-model",value:e.form.email,expression:"form.email"}],staticClass:"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full",attrs:{id:"email",type:"email",required:"",autofocus:"",autocomplete:"username"},domProps:{value:e.form.email},on:{input:function(t){t.target.composing||e.$set(e.form,"email",t.target.value)}}})],1),e._v(" "),r("div",{staticClass:"mt-4"},[r("breeze-label",{attrs:{for:"password",value:"Password"}}),e._v(" "),r("div",{staticClass:"password-hidden"},["checkbox"===e.passwordFieldType?r("input",{directives:[{name:"model",rawName:"v-model",value:e.form.password,expression:"form.password"}],staticClass:"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full",attrs:{id:"password",required:"",autocomplete:"current-password",type:"checkbox"},domProps:{checked:Array.isArray(e.form.password)?e._i(e.form.password,null)>-1:e.form.password},on:{change:function(t){var r=e.form.password,s=t.target,o=!!s.checked;if(Array.isArray(r)){var n=e._i(r,null);s.checked?n<0&&e.$set(e.form,"password",r.concat([null])):n>-1&&e.$set(e.form,"password",r.slice(0,n).concat(r.slice(n+1)))}else e.$set(e.form,"password",o)}}}):"radio"===e.passwordFieldType?r("input",{directives:[{name:"model",rawName:"v-model",value:e.form.password,expression:"form.password"}],staticClass:"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full",attrs:{id:"password",required:"",autocomplete:"current-password",type:"radio"},domProps:{checked:e._q(e.form.password,null)},on:{change:function(t){return e.$set(e.form,"password",null)}}}):r("input",{directives:[{name:"model",rawName:"v-model",value:e.form.password,expression:"form.password"}],staticClass:"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full",attrs:{id:"password",required:"",autocomplete:"current-password",type:e.passwordFieldType},domProps:{value:e.form.password},on:{input:function(t){t.target.composing||e.$set(e.form,"password",t.target.value)}}}),e._v(" "),r("span",{staticClass:"span-hidden"},[r("i",{class:"password"==e.passwordFieldType?"fa fa-eye":"fa fa-eye-slash",on:{click:e.switchVisibility}})])])],1),e._v(" "),r("div",{staticClass:"block mt-4"},[r("div",{staticClass:"flex items-center"},[r("input",{directives:[{name:"model",rawName:"v-model",value:e.form.remember,expression:"form.remember"}],staticClass:"h-4 w-4 text-gray-700 border rounded mr-2",attrs:{type:"checkbox",id:"checkbox-example"},domProps:{checked:Array.isArray(e.form.remember)?e._i(e.form.remember,null)>-1:e.form.remember},on:{change:function(t){var r=e.form.remember,s=t.target,o=!!s.checked;if(Array.isArray(r)){var n=e._i(r,null);s.checked?n<0&&e.$set(e.form,"remember",r.concat([null])):n>-1&&e.$set(e.form,"remember",r.slice(0,n).concat(r.slice(n+1)))}else e.$set(e.form,"remember",o)}}}),e._v(" "),r("span",{staticClass:"ml-2 text-sm text-gray-600"},[e._v("Remember me")])])]),e._v(" "),r("div",{staticClass:"flex items-center justify-end mt-4"},[r("Link",{staticClass:"underline text-sm mr-3 text-gray-600 hover:text-gray-900 text-left link ml",attrs:{href:e.route("register")}},[e._v("Register ?")]),e._v(" "),e.canResetPassword?r("Link",{staticClass:"underline text-sm text-gray-600 hover:text-gray-900",attrs:{href:e.route("password.request")}},[e._v("Forgot your password?")]):e._e(),e._v(" "),r("breeze-button",{staticClass:"ml-4",class:{"opacity-25":e.form.processing},attrs:{loading:e.form.processing}},[e._v("Log in")])],1),e._v(" "),r("div",{staticClass:"col-md-12",staticStyle:{"padding-left":"65px"}})])],1)}),[function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticClass:"text-center mb-3"},[t("img",{staticClass:"image-logo",attrs:{src:"asset/img/HolomiaExpo.svg",alt:""}})])}],!1,null,"6ee4531c",null).exports},1900:(e,t,r)=>{function s(e,t,r,s,o,n,a,i){var l,c="function"==typeof e?e.options:e;if(t&&(c.render=t,c.staticRenderFns=r,c._compiled=!0),s&&(c.functional=!0),n&&(c._scopeId="data-v-"+n),a?(l=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(a)},c._ssrRegister=l):o&&(l=i?function(){o.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:o),l)if(c.functional){c._injectStyles=l;var d=c.render;c.render=function(e,t){return l.call(t),d(e,t)}}else{var u=c.beforeCreate;c.beforeCreate=u?[].concat(u,l):[l]}return{exports:e,options:c}}r.d(t,{Z:()=>s})}}]);