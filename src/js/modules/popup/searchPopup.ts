export default function searchPopup() {
  const btn = document.querySelector(".search__icon");
  const popup = document.querySelector(".search__body");

  btn.addEventListener("click", function () {
    // popup?.classList.toggle("active");

    if (popup?.classList.contains("active")) {
      popup.classList.remove("show");
      setTimeout(() => {
        popup.classList.remove("active");
      }, 300);
    } else {
      popup.classList.add("active");
      setTimeout(() => {
        popup.classList.add("show");
      }, 300);
    }
  });
}
