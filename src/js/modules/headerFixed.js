export default function headerFixed() {
  const header = document.querySelector(".header");
  const iconMenu = document.querySelector(".icon-menu");

  let observer = new IntersectionObserver((entries) => {
    if (entries[0].boundingClientRect.y < 0) {
      header.classList.add("_active");
      iconMenu.classList.add("icon-menu--active");
    } else {
      header.classList.remove("_active");
      iconMenu.classList.remove("icon-menu--active");
    }
  });
  observer.observe(document.querySelector("#pixel-to-watch"));

  // change active class on menu
  const menuList = document.querySelector(".menu__list");

  let menuObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const linkId = entry.target.id;
          const theLink = menuList.querySelector('a[href*="' + linkId + '"]');
          removeAllActiveClasses(menuList.querySelectorAll("li"));
          addActiveClass(theLink);
        }
      });
    },
    { rootMargin: "0px 0px -100% 0px" }
  );

  const home = document.querySelector("#home");
  const souvenir = document.querySelector("#souvenir");
  const about = document.querySelector("#about");
  const services = document.querySelector("#services");

  home && menuObserver.observe(home);
  souvenir && menuObserver.observe(souvenir);
  about && menuObserver.observe(about);
  services && menuObserver.observe(services);
  menuObserver.observe(document.querySelector("#contacts"));

  let activeObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("_active");
        }
      });
    },
    { rootMargin: "0px 0px -50% 0px" }
  );

  about && activeObserver.observe(about);
  services && activeObserver.observe(services);
}

function removeAllActiveClasses(menuList) {
  menuList.forEach(function (item) {
    const link = item.querySelector(".menu__link");
    link.classList.remove("menu__link--active");
  });
}

function addActiveClass(link) {
  link.classList.add("menu__link--active");
}
