"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[258],{6258:(t,e,r)=>{r.r(e),r.d(e,{default:()=>u});function n(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function i(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?n(Object(r),!0).forEach((function(e){o(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):n(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function o(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}const a={components:{},data:function(){return{loading:!1,auditoriums:[{name:"A",schedules:[{start_time:"15:00:00"},{start_time:"17:00:00"}]},{name:"B",schedules:[{start_time:"15:00:00"},{start_time:"17:00:00"}]}]}},mounted:function(){this.getAuditoriums()},methods:{getAuditoriums:function(){var t=this;this.loading=!0,axios.get("/api/auditoriums").then((function(e){t.auditoriums=e.data.auditoriums})).catch((function(t){console.warn(t.response)})).then((function(){return t.loading=!1}))},goToBookingRoute:function(t,e,r,n){if(t&&e){var o=i(i({},{name:"booking"}),{params:{idAuditorium:t,nameAuditorium:e,scheduleName:r,scheduleId:n}});this.$router.push(o)}}},computed:{}};const u=(0,r(1900).Z)(a,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("h2",{staticStyle:{"text-align":"center",color:"white"}},[t._v("LARA MOVIE")]),t._v(" "),r("h3",{staticStyle:{"text-align":"center"}},[t._v("Cartelera")]),t._v(" "),r("v-card",{staticStyle:{"max-width":"50vw",margin:"auto","margin-top":"30vh"}},[r("v-toolbar",{attrs:{flat:"",color:"primary",dark:""}},[r("v-toolbar-title",[t._v("Avengers")])],1),t._v(" "),r("v-tabs",{staticStyle:{"align-items":"center"},attrs:{vertical:""}},[t._l(t.auditoriums,(function(e,n){return r("v-tab",{key:n},[r("v-icon",{attrs:{left:""}},[t._v("\n              mdi-filmstrip-box-multiple\n          ")]),t._v("\n          Sala "+t._s(e.name)+"\n          ")],1)})),t._v(" "),t._l(t.auditoriums,(function(e,n){return r("v-tab-item",{key:n,staticStyle:{"justify-content":"center",display:"flex"}},[r("v-chip-group",{attrs:{"active-class":"primary--text",column:""}},t._l(e.schedules,(function(n,i){return r("v-chip",{key:i,on:{click:function(r){return t.goToBookingRoute(e.id,e.name,n.start_time,n.id)}}},[t._v("\n                  "+t._s(n.start_time)+"\n                  ")])})),1)],1)}))],2)],1)],1)}),[],!1,null,null,null).exports}}]);