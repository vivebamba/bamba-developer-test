"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[97],{745:(t,e,n)=>{n.r(e),n.d(e,{default:()=>i});const o={components:{},data:function(){return{loading:!1,auditoriums:[{name:"A",schedules:[{start_time:"15:00:00"},{start_time:"17:00:00"}]},{name:"B",schedules:[{start_time:"15:00:00"},{start_time:"17:00:00"}]}],tags:["Work","Home Improvement","Vacation","Food","Drawers","Shopping","Art","Tech","Creative Writing"]}},mounted:function(){this.getAuditoriums()},methods:{getAuditoriums:function(){var t=this;this.loading=!0,axios.get("/api/auditoriums").then((function(e){console.log(e.data),t.auditoriums=e.data.auditoriums})).catch((function(t){console.warn(t.response)})).then((function(){return t.loading=!1}))},goToBookingRoute:function(){console.log("goToBookingRoute"),this.$router.push({name:"booking"})}},computed:{}};const i=(0,n(900).Z)(o,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("v-app",[n("v-container",[n("h5",[t._v("Cartelera")]),t._v(" "),n("v-card",{staticStyle:{"max-width":"50vw",margin:"auto","margin-top":"30vh"}},[n("v-toolbar",{attrs:{flat:"",color:"primary",dark:""}},[n("v-toolbar-title",[t._v("Avengers")])],1),t._v(" "),n("v-tabs",{staticStyle:{"align-items":"center"},attrs:{vertical:""}},[t._l(t.auditoriums,(function(e,o){return n("v-tab",{key:o},[n("v-icon",{attrs:{left:""}},[t._v("\n                              mdi-filmstrip-box-multiple\n                          ")]),t._v("\n                          Sala "+t._s(e.name)+"\n                          ")],1)})),t._v(" "),t._l(t.auditoriums,(function(e,o){return n("v-tab-item",{key:o,staticStyle:{"justify-content":"center",display:"flex"}},[n("v-chip-group",{attrs:{"active-class":"primary--text",column:""}},t._l(e.schedules,(function(e,o){return n("v-chip",{key:o,on:{click:t.goToBookingRoute}},[t._v("\n                                  "+t._s(e.start_time)+"\n                                  ")])})),1)],1)}))],2)],1)],1)],1)],1)}),[],!1,null,null,null).exports}}]);