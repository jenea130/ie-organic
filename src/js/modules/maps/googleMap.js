export default function googleMap() {
  const mapDiv = document.querySelector(".map");
  const iframe = `
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2827.024587711132!2d10.171156115902344!3d44.882148579098356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47805d1fe99e6637%3A0xc27b30bced140422!2sVia%20Guglielmo%20Marconi%2C%201A%2C%2043012%20Fontanellato%20PR%2C%20Italia!5e0!3m2!1sit!2s!4v1614072118580!5m2!1sit!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        `;
  if (document.body.classList.contains("home")) {
    setTimeout(() => {
      mapDiv.innerHTML = iframe;
    }, 2000);
  } else {
    mapDiv.innerHTML = iframe;
  }
}
