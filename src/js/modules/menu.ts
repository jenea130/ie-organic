export function mainMenu() {
	const mainMenu = document.querySelector('#js-main-menu');
	const sandwichWrap = document.querySelector('#js-sandwitch-wrap');

	sandwichWrap?.addEventListener('mousedown', function (e) {
		e.preventDefault();

		if (mainMenu?.classList.contains('fixed')) {
			mainMenu.classList.remove('fixed');
		} else {
			mainMenu?.classList.add('fixed');
		}
		sandwichWrap.classList.toggle('sandwitch--active');
	});
}