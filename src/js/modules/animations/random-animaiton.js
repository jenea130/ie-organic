import gsap from "gsap";

export default function randomAnimation() {
    const rndEls = document.querySelectorAll(".rndAnim");
    for (let ind = 0; ind < rndEls.length; ind++) {
        const el = rndEls[ind];
        playEl(el, 30, 0.4, 0.5, 0.9, 0.8);
    }
}

function playEl(el, playField, x, y, s1, s2) {
    // x/y values for how far away from the center they can move
    var dx = playField * x;
    var dy = playField * y;

    // Animate our properties individually - by osublake
    tweenProperty(el, "scale", s1, s2);
    tweenProperty(el, "x", -dx, dx);
    tweenProperty(el, "y", -dy, dy);

    function tweenProperty(target, prop, min, max) {
        gsap.to(target, {
            [prop]: gsap.utils.random(min, max),
            duration: "random(3, 6)",
            ease: "none",
            onComplete: tweenProperty,
            onCompleteParams: [target, prop, min, max],
        });
    }
}
