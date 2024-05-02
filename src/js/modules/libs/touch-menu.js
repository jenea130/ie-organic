export default function touchMenu(){
	const menuLinks = document.querySelectorAll('.wpglobus-selector-link');
	let touchCount = true;
	menuLinks.forEach(item => {
		item.addEventListener('touchstart', function (e) {
			e.preventDefault();
			const target = e.target.closest('.wpglobus-selector-link');
			if(touchCount){
				menuLinks[2].style.display = 'block';
				touchCount = false;
			}else{
				const href = target.getAttribute('href');
				window.location.replace(href);
			}
		});
	});

	function closeFlags(){
		document.addEventListener('touchstart', (e) => {
			const target = e.target;
			if(target && !target.closest('.flags')){
				if(getComputedStyle(menuLinks[2]).display === 'block') {
					menuLinks[2].style.display = 'none';
					touchCount = true;
				}
			}
		});
	}
	closeFlags();
};