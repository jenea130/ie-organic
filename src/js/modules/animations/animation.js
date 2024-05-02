import gsap from 'gsap';
import ScrollTrigger from "gsap/ScrollTrigger";

export default function gsapAnimation() {
	gsap.registerPlugin(ScrollTrigger);

	function headerLogo(){
		let tl = gsap.timeline();
		tl.fromTo('.logo-svg-left svg', {
			opacity: 0,
			scale: 300
		}, {
			opacity: 1,
			duration: 1.5,
			scale: 1,
			ease: "power4.out"
		});
		tl.fromTo('.logo-svg-left svg', {
			rotate: -90,
		}, {
			duration: .6,
			rotate: 0
		});
		tl.fromTo('.logo-svg-right svg', {
			opacity: 0,
			rotate: 90,
		}, {
			opacity: 1,
			duration: .6,
			rotate: 0
		});
		tl.to('.logo-svg-left svg', {
			fill: '#00478C',
			duration: .3,
		});
		tl.to('.logo-svg-right svg', {
			fill: '#F26522',
			duration: .3,
		});
		tl.fromTo('.logo img', {
			x: 100,
			opacity: 0,
		}, {
			x: 0,
			opacity: 1,
			ease: "power4.out",
			duration: 1,
		});
	}
	if(document.body.classList.contains('page-template-front-page')){
		headerLogo();
	}

	function fadeBlock() {
		gsap.from('.fade-block', {
			opacity: 0,
			duration: 2,
			scrollTrigger: {
				start: "top: 80%",
				trigger: ".fade-block",
			},
		});
	}

	fadeBlock();

	function benefitsAnimation() {
		gsap.from(".benefits__title", {
			scrollTrigger: {
				start: "top: 100%",
				trigger: ".benefits__title",
			},
			opacity: 0,
			x: 60,
			duration: .3,
			stagger: .3
		});
		gsap.from(".benefits__item img", {
			scrollTrigger: {
				start: "top: 100%",
				trigger: ".benefits__item img",
			},
			opacity: 0,
			x: -60,
			duration: .3,
			stagger: .3
		});
		gsap.from(".benefits__content p", {
			scrollTrigger: {
				start: "top: 100%",
				trigger: ".benefits__content p",
			},
			opacity: 0,
			y: 60,
			duration: .3,
			stagger: .3
		});
	}

	benefitsAnimation();

	function servicesBlockAnimation() {
		gsap.from(".services-block__item:nth-of-type(even)", {
			scrollTrigger: {
				start: "top: 100%",
				trigger: ".services-block__item:nth-of-type(even)",
			},
			opacity: 0,
			y: 60,
			duration: .4,
			stagger: .4
		});
		gsap.from(".services-block__item:nth-of-type(odd)", {
			scrollTrigger: {
				start: "top: 100%",
				trigger: ".services-block__item:nth-of-type(odd)",
			},
			opacity: 0,
			y: -60,
			duration: .4,
			stagger: .4
		});
	}

	servicesBlockAnimation();

	function referenzeItemsAnimation() {
		gsap.from(".page-template-front-page .referenze__item", {
			scrollTrigger: {
				start: "top: 100%",
				trigger: ".page-template-front-page .referenze__item",
				scrub: 2
			},
			boxShadow: '0 4px 18px rgba(0,0,0,.4)',
			y: 60,
			duration: .4,
			stagger: .3
		});
	}

	referenzeItemsAnimation();

	function featuresItemsAnimation() {
		gsap.registerPlugin(ScrollTrigger);
		gsap.from(".features__item", {
			scrollTrigger: {
				start: "top: 100%",
				trigger: ".features__item",
			},
			opacity: 0,
			y: 80,
			duration: 0.8,
			stagger: 0.4
		});
	}

	featuresItemsAnimation();

	function termicoPostImgAnimation() {
		gsap.from(".termico-post__img", {
			scrollTrigger: {
				start: "top: 80%",
				trigger: ".termico-post__img",
			},
			opacity: 0,
			y: 180,
			duration: 2
		});
	}

	termicoPostImgAnimation();

	function address() {
		gsap.from(".address li", {
			scrollTrigger: {
				start: "top: 100%",
				trigger: ".address li",
			},
			opacity: 0,
			duration: 1,
			ease: "power4.out",
			stagger: .8
		});
	}

	address();

	function tabsListAnimation() {
		gsap.from('.tabs__list li', {
			opacity: 0,
			scale: .5,
			duration: .3,
			stagger: .3,
			scrollTrigger: {
				start: "top: 80%",
				trigger: ".tabs__list li",
			},
		});
	}

	tabsListAnimation();

	function singleApplicazioniReferenze() {
		gsap.from('.single-applicazioni .referenze__item', {
			opacity: 0,
			y: 140,
			duration: .4,
			stagger: .4,
			scrollTrigger: {
				start: "top: 80%",
				trigger: ".single-applicazioni .referenze__item",
			},
		});
	}

	singleApplicazioniReferenze();

	function singleProdottiPageTable() {
		gsap.from('.table-block tr', {
			opacity: 0,
			y: 40,
			duration: .2,
			stagger: .2,
			scrollTrigger: {
				start: "top: 100%",
				trigger: ".table-block tr",
			},
		});
	}

	singleProdottiPageTable();

	function partnersBlockAnimation(){
		gsap.from('.partners-block .partners-block__item', {
			opacity: 0,
			rotateY: 90,
			duration: .4,
			stagger: .4,
			scrollTrigger: {
				start: "top: 80%",
				trigger: ".partners-block .partners-block__item",
			},
		});
	}
	partnersBlockAnimation();
};