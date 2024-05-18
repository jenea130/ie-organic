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
      setTimeout(() => {
        product_contents[index].classList.add('show');
      }, 300);
    })
  })

  function showFirst() {
    product_tabs[0].classList.add("active");
    product_tabs[0].classList.add("show");
    product_contents[0].classList.add("active");
    product_contents[0].classList.add("show");
  }

  function resetActive() {
    product_tabs.forEach(item => {
      item.classList.remove("active");
    })
    product_contents.forEach(item => {
      item.classList.remove("active");
    })
    product_contents.forEach(item => {
      item.classList.remove("show");
    })
  }
}
