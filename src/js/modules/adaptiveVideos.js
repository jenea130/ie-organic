export default function adaptiveVideo() {
    // Adaptive video
    var video = document.querySelector("#mainVideo");

    function initVideoAdaptive(video) {
        //add source to video tag
        function addSourceToVideo(element, src) {
            var source = document.createElement("source");
            source.src = src;
            source.type = "video/mp4";
            console.log(src);
            element.appendChild(source);
        }

        //determine screen size and select mobile or desktop vid
        function whichSizeVideo(element, src) {
            var windowWidth = window.innerWidth
                ? window.innerWidth
                : $(window).width();
            element.innerHTML = "";
            element.load();
            if (windowWidth < 550 && src.dataset.mobileVid !== undefined) {
                addSourceToVideo(element, src.dataset.mobileVid);
            } else {
                addSourceToVideo(element, src.dataset.desktopVid);
            }
        }
        if (video) {
            whichSizeVideo(video, video);

            window.addEventListener("resize", function () {
                whichSizeVideo(video, video);
            });
        }
    }

    initVideoAdaptive(video);
}

//   <video id="mainVideo" class="home-intro__video" width="100%" height="100%" poster="<?php echo $image ?>" loop
//             autoplay muted playsinline data-desktop-vid="<?php echo $video ?>" <?php if ($video_mobile) : ?>
//             data-mobile-vid="<?php echo $video_mobile ?>" <?php endif; ?>>
//         </video>
