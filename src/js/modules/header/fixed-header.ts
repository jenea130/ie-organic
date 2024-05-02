export default function fixedHeader() {
  const header = document.querySelector(".main-header");
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 500) {
      if (!header?.classList.contains("active")) {
        header?.classList.add("active");
        setTimeout(() => {
          header?.classList.remove("main-header--hidden");
        }, 400);
      }
    } else {
      if (header?.classList.contains("active")) {
        header?.classList.remove("active");
      }
    }
  });
}