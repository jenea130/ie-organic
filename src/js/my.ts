import "../vue/vue-app.js";
import fixedHeader from "./modules/header/fixed-header";
import { mainMenu } from "./modules/menu";
import searchPopup from "./modules/popup/searchPopup.js";
import tabsProduct from "./modules/tabsProduct.js";

document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelector(".tabs-product");

  if (tabs) {
    tabsProduct();
  }

  mainMenu();
  fixedHeader();
  searchPopup();
});
