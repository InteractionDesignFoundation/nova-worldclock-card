!function(t){var e={};function n(r){if(e[r])return e[r].exports;var o=e[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:r})},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=0)}({"/QNb":function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("card",{staticClass:"h-auto max-w-xs"},[n("div",{staticClass:"px-3 py-3"},[n("div",{staticClass:"mt-2",attrs:{id:"app"}},[n("table",{staticClass:"table",attrs:{align:"center"}},[n("tr",[n("th",{staticClass:"tableHeader"},[t._v("City")]),t._v(" "),n("th",{staticClass:"tableHeader"},[t._v("Time")])]),t._v(" "),t._l(this.times,function(e,r){return n("tr",[n("td",{staticClass:"timezoneRow"},[n("div",[t._v(t._s(e.name))]),t._v(" "),t.card.timezoneDescriptions.hasOwnProperty(r)?n("div",{staticClass:"text-xs text-grey"},[t._v("\n                            "+t._s(t.card.timezoneDescriptions[r])+"\n                        ")]):t._e()]),t._v(" "),n("td",{staticClass:"timezoneRow"},[n("time",[t._v(t._s(e.time))]),t._v(" "),e.night?n("span",{staticClass:"night"},[t._v("🌙")]):t._e(),t._v(" "),e.night?t._e():n("span",{staticClass:"day"},[t._v("☀️")])])])})],2)])])])},staticRenderFns:[]}},0:function(t,e,n){t.exports=n("v8wI")},"FZ+f":function(t,e){t.exports=function(t){var e=[];return e.toString=function(){return this.map(function(e){var n=function(t,e){var n=t[1]||"",r=t[3];if(!r)return n;if(e&&"function"==typeof btoa){var o=(i=r,"/*# sourceMappingURL=data:application/json;charset=utf-8;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(i))))+" */"),s=r.sources.map(function(t){return"/*# sourceURL="+r.sourceRoot+t+" */"});return[n].concat(s).concat([o]).join("\n")}var i;return[n].join("\n")}(e,t);return e[2]?"@media "+e[2]+"{"+n+"}":n}).join("")},e.i=function(t,n){"string"==typeof t&&(t=[[null,t,""]]);for(var r={},o=0;o<this.length;o++){var s=this[o][0];"number"==typeof s&&(r[s]=!0)}for(o=0;o<t.length;o++){var i=t[o];"number"==typeof i[0]&&r[i[0]]||(n&&!i[2]?i[2]=n:n&&(i[2]="("+i[2]+") and ("+n+")"),e.push(i))}},e}},HJcB:function(t,e,n){(t.exports=n("FZ+f")(!1)).push([t.i,".day[data-v-3228ef9d]{color:transparent;text-shadow:0 0 0 #f4b21f}.night[data-v-3228ef9d]{color:transparent;text-shadow:0 0 0 #020202}.timezoneRow[data-v-3228ef9d]{height:35px!important}.tableHeader[data-v-3228ef9d]{background-color:transparent!important}",""])},LDP9:function(t,e,n){var r=n("HJcB");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);n("rjj0")("1f29ffd2",r,!0,{})},UFKg:function(t,e,n){var r=n("VU/8")(n("mwy9"),n("/QNb"),!1,function(t){n("LDP9")},"data-v-3228ef9d",null);t.exports=r.exports},"VU/8":function(t,e){t.exports=function(t,e,n,r,o,s){var i,a=t=t||{},c=typeof t.default;"object"!==c&&"function"!==c||(i=t,a=t.default);var u,d="function"==typeof a?a.options:a;if(e&&(d.render=e.render,d.staticRenderFns=e.staticRenderFns,d._compiled=!0),n&&(d.functional=!0),o&&(d._scopeId=o),s?(u=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),r&&r.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(s)},d._ssrRegister=u):r&&(u=r),u){var f=d.functional,l=f?d.render:d.beforeCreate;f?(d._injectStyles=u,d.render=function(t,e){return u.call(e),l(t,e)}):d.beforeCreate=l?[].concat(l,u):[u]}return{esModule:i,exports:a,options:d}}},mwy9:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={props:["card"],data:function(){return{times:[]}},created:function(){this.getTime(),setInterval(this.getTime,this.card.ms)},mounted:function(){this.getTime()},methods:{getTime:function(){var t=this;Nova.request().post("/nova-vendor/worldclock/timezones",{timezones:this.card.timezones,timeFormat:this.card.timeFormat,nightHours:this.card.nightHours,hideContinents:this.card.hideContinents}).then(function(e){t.times=e.data})}}}},rjj0:function(t,e,n){var r="undefined"!=typeof document;if("undefined"!=typeof DEBUG&&DEBUG&&!r)throw new Error("vue-style-loader cannot be used in a non-browser environment. Use { target: 'node' } in your Webpack config to indicate a server-rendering environment.");var o=n("tTVk"),s={},i=r&&(document.head||document.getElementsByTagName("head")[0]),a=null,c=0,u=!1,d=function(){},f=null,l="data-vue-ssr-id",p="undefined"!=typeof navigator&&/msie [6-9]\b/.test(navigator.userAgent.toLowerCase());function v(t){for(var e=0;e<t.length;e++){var n=t[e],r=s[n.id];if(r){r.refs++;for(var o=0;o<r.parts.length;o++)r.parts[o](n.parts[o]);for(;o<n.parts.length;o++)r.parts.push(m(n.parts[o]));r.parts.length>n.parts.length&&(r.parts.length=n.parts.length)}else{var i=[];for(o=0;o<n.parts.length;o++)i.push(m(n.parts[o]));s[n.id]={id:n.id,refs:1,parts:i}}}}function h(){var t=document.createElement("style");return t.type="text/css",i.appendChild(t),t}function m(t){var e,n,r=document.querySelector("style["+l+'~="'+t.id+'"]');if(r){if(u)return d;r.parentNode.removeChild(r)}if(p){var o=c++;r=a||(a=h()),e=y.bind(null,r,o,!1),n=y.bind(null,r,o,!0)}else r=h(),e=function(t,e){var n=e.css,r=e.media,o=e.sourceMap;r&&t.setAttribute("media",r);f.ssrId&&t.setAttribute(l,e.id);o&&(n+="\n/*# sourceURL="+o.sources[0]+" */",n+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(o))))+" */");if(t.styleSheet)t.styleSheet.cssText=n;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(n))}}.bind(null,r),n=function(){r.parentNode.removeChild(r)};return e(t),function(r){if(r){if(r.css===t.css&&r.media===t.media&&r.sourceMap===t.sourceMap)return;e(t=r)}else n()}}t.exports=function(t,e,n,r){u=n,f=r||{};var i=o(t,e);return v(i),function(e){for(var n=[],r=0;r<i.length;r++){var a=i[r];(c=s[a.id]).refs--,n.push(c)}e?v(i=o(t,e)):i=[];for(r=0;r<n.length;r++){var c;if(0===(c=n[r]).refs){for(var u=0;u<c.parts.length;u++)c.parts[u]();delete s[c.id]}}}};var g,_=(g=[],function(t,e){return g[t]=e,g.filter(Boolean).join("\n")});function y(t,e,n,r){var o=n?"":r.css;if(t.styleSheet)t.styleSheet.cssText=_(e,o);else{var s=document.createTextNode(o),i=t.childNodes;i[e]&&t.removeChild(i[e]),i.length?t.insertBefore(s,i[e]):t.appendChild(s)}}},tTVk:function(t,e){t.exports=function(t,e){for(var n=[],r={},o=0;o<e.length;o++){var s=e[o],i=s[0],a={id:t+":"+o,css:s[1],media:s[2],sourceMap:s[3]};r[i]?r[i].parts.push(a):n.push(r[i]={id:i,parts:[a]})}return n}},v8wI:function(t,e,n){Nova.booting(function(t,e,r){t.component("worldclock",n("UFKg"))})}});