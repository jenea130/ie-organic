import "../vue/vue-app.js";
import fixedHeader from "./modules/header/fixed-header";
import {mainMenu} from "./modules/menu";
import searchPopup from "./modules/popup/searchPopup.js";

document.addEventListener("DOMContentLoaded", function () {
    
    mainMenu();
    fixedHeader();
    searchPopup();
});
