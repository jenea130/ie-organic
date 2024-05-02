import "../vue/vue-app.js";
import fixedHeader from "./modules/header/fixed-header";
import {mainMenu} from "./modules/menu";

document.addEventListener("DOMContentLoaded", function () {
    mainMenu();
    fixedHeader();
});
