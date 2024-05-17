export default function tabsProduct() {
  const product_tabs = document.querySelectorAll(".tabs-product__nav");
  const product_contents = document.querySelectorAll(".tabs-product__tab");
  console.log(product_contents);
  

  showFirst();

  product_tabs.forEach((item, index) => {
    item.addEventListener("click", () => {
      resetActive();
      item.classList.add("active");
      product_contents[index].classList.add("active");
    })
  })

  function showFirst() {
    product_tabs[0].classList.add("active");
    product_contents[0].classList.add("active");
  }

  function resetActive() {
    product_tabs.forEach(item => {
      item.classList.remove("active");
    })
    product_contents.forEach(item => {
      item.classList.remove("active");
    })
  }
}
