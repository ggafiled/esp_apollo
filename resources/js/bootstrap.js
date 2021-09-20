window._ = require("lodash");

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");
    window.animejs = require("animejs");
    window.JSZip = require("jszip");
    window.moment = require("moment");

    require("bootstrap");
    require("admin-lte");
    require("bootstrap-select");
    require("google-palette");
    require("animejs");
    require("patternomaly");
    require("bootstrap-datepicker");
    require("bootstrap-datepicker/dist/css/bootstrap-datepicker.css");
    require("bootstrap-datepicker/dist/locales/bootstrap-datepicker.th.min.js");
    require("bootstrap-datepicker/dist/locales/bootstrap-datepicker-en-CA.min.js");

    require("bootstrap-select/js/i18n/defaults-de_DE");

    var dt = require("datatables.net-dt");
    var buttons = require("datatables.net-buttons")();
    require("datatables.net-buttons/js/buttons.colVis.js")();
    require("datatables.net-buttons/js/buttons.html5.js")();
    require("datatables.net-buttons/js/buttons.flash.js")();
    require("datatables.net-buttons/js/buttons.print.js")();
    require("datatables.net-fixedcolumns");
    require("datatables.net-dt/css/jquery.datatables.css");
    require("datatables.net-select");

    //Custom theme
    require("datatables.net-buttons-dt/css/buttons.datatables.css");
    require("jquery-datatables-checkboxes");

    //Bootstrap icon
    require("bootstrap-icons/font/bootstrap-icons.css");
    require("jquery-contextmenu");

    $.fn.dataTable.Buttons.jszip(JSZip);
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.headers.common.crossDomain = true;
window.axios.defaults.baseURL = "/api";

$.ajaxSetup({
    headers: {
        "X-Requested-With": "XMLHttpRequest",
        crossDomain: true,
        "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]')
            .content
    },
    url: "/api"
});

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

// window.Pusher = require("pusher-js");
// Pusher.logToConsole = true;

// import Echo from "laravel-echo";
// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: "ca9c90e704afac3f54e8",
//     cluster: "ap1"
// });
import Pusher from "pusher-js";
// Pusher.logToConsole = true;
window.Pusher = new Pusher("ca9c90e704afac3f54e8", { cluster: "ap1" });

import disableDevtool from "disable-devtool";
if (process.env.MIX_APP_ENV == "production") {
    disableDevtool();
}