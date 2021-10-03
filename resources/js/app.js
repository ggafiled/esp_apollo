/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
window.axios = require("axios");
const { shortText } = require("limit-text-js");
window.shortText = shortText;
window.translate = require("./VueTranslation/Translation").default.translate;

import { Form, HasError, AlertError } from "vform";
window.Form = Form;

import Gate from "./Gate";
var gate = new Gate("user" in window.Laravel ? window.Laravel.user : []);
Vue.prototype.$gate = gate;

Vue.prototype.$shortText = shortText;

import moment from "moment";
Vue.prototype.moment = moment;

// If you want to use it in your vue components
Vue.prototype.translate = require("./VueTranslation/Translation").default.translate;

Vue.prototype.$isChrome =
    /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

import Swal from "sweetalert2";

const Toast = Swal.mixin({
    toast: true,
    position: "bottom-right",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});

const LoadingWait = Swal.mixin({
    html: `<div id="LoadingWait_container" style="align-items: center; display: -ms-flexbox;display: -webkit-flex;display: flex;align-items: center;width: 100%;">
    <img src="https://raw.githubusercontent.com/ggafiled/vue-crud-fisrt-mile-system/main/public/images/loading.gif" width="68px" height="68px"/>
    <div id="LoadingWaitText"><h3 class="p-0 m-0">กรุณารอสักครู่...</h3><small class="text-muted">กำลังโหลดข้อมูลที่เกี่ยวข้อง</small></div>
    </div>`,
    showCancelButton: false,
    showConfirmButton: false,
    allowOutsideClick: false
});

window.Swal = Swal;
window.Toast = Toast;
window.LoadingWait = LoadingWait;

Vue.use(require("vue-moment"));

import VueMeta from "vue-meta";
Vue.use(VueMeta);

import Vuetify from "vuetify";
Vue.use(Vuetify);

import VueTimeline from "@growthbunker/vuetimeline";
Vue.use(VueTimeline);

import VueLoading from "vue-loading-overlay";
Vue.use(VueLoading);

import { ColorPicker, ColorPanel } from "one-colorpicker";
Vue.use(ColorPanel);
Vue.use(ColorPicker);

import ThailandAutoComplete from "vue-thailand-address-autocomplete";
Vue.component("ThailandAutoComplete", ThailandAutoComplete);

/**
 * Custom mixins function to rename title.
 */
import titleMixin from "./partials/mixins/title";
Vue.mixin(titleMixin);

import Select2 from "v-select2-component";

Vue.component("Select2", Select2);

import VueProgressBar from "vue-progressbar";
Vue.use(VueProgressBar, {
    color: "rgb(143, 255, 199)",
    failedColor: "red",
    height: "3px"
});

import Vuetable from "vuetable-2";
Vue.component("vuetable", Vuetable);

import DataTable from "./components/datatable/DataTable.vue";
Vue.component("data-tables", DataTable);

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// ตรงนี้เพิ่มมาเพื่อแก้ปัญาตัว adminlte กับ router-link ไม่ active path ที่มีอะไรต่อท้ายเพิ่มจากที่กำหนดใน adminlte.config ให้
// หากจะใช้ก็แค่เพิ่ม attribute : active_url ในไฟล์ adminlte.config โดยใส่เป็น path เริ่มต้นที่จะให้แมทช์
Vue.directive("active-when", {
    bind(el, binding, vnode) {
        console.log(binding.expression);
        var regexActiveRoute = new RegExp(
            "[/]?" +
            binding.expression.replace(/\//g, "\\/") +
            "([-a - zA - Z0 - 9() @: % _ + .~# ? & //=]*)"
        );
        if (
            regexActiveRoute.test(
                window.location.pathname + window.location.search
            )
        ) {
            // console.log(el);
            $(el).addClass("router-link-exact-active");
        }
    }
});

/**
 * Vuex imports and assigning
 */
import store from "./store/index";

/**
 * Routes imports and assigning
 */
import VueRouter from "vue-router";
Vue.use(VueRouter);
import routes from "./routes";
import Vue from "vue";

const router = new VueRouter({
    mode: "history",
    routes
});
router.beforeEach((to, from, next) => {
    if (
        to.matched.some(route => route.meta.requiresAuth) &&
        !gate.isAuthenticated()
    ) {
        window.location.href = "/login";
        return next(false);
    }

    if (!gate.hasPermissionsNeeded(to)) return next("/dashboard");

    next();
});
// Routes End

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Components
Vue.component("pagination", require("laravel-vue-pagination"));

Vue.component(
    "passport-clients",
    require("./components/passport/Clients.vue").default
);

Vue.component("app-view", require("./components/App.vue").default);

Vue.component(
    "passport-authorized-clients",
    require("./components/passport/AuthorizedClients.vue").default
);

Vue.component(
    "passport-personal-access-tokens",
    require("./components/passport/PersonalAccessTokens.vue").default
);

Vue.component(
    "window-portal",
    require("./components/partials/WindowPortal.vue").default
);

Vue.component("not-found", require("./pages/NotFound.vue").default);

// Filter Section

Vue.filter("myDate", function(created) {
    return moment(created).format("MMMM Do YYYY");
});

Vue.filter("yesno", value =>
    value ?
    '<i class="fas fa-check green"></i>' :
    '<i class="fas fa-times red"></i>'
);
// end Filter

const app = new Vue({
    el: "#app",
    store,
    router,
    vuetify: new Vuetify()
});