// Плавный переход по ссылкам внутри страницы

const links = document.querySelectorAll(
	'.footer-links__link a, .header-links__link a, .second-section__btn,.first-section__btn, .services-card__btn');
if (links.length > 0) {
	links.forEach(link => {
		link.addEventListener('click', (e) => {
			e.preventDefault();
			const menuItem = e.target;
			let headerHeight;
			if (window.innerWidth < 1200) {
				headerHeight = 0;
			} else {
				headerHeight = document.querySelector('.header').clientHeight + 20;
			}
			const linkTarget = String(menuItem.href);
			const linkTargetNeedlyValue = linkTarget.slice(linkTarget.indexOf('#') + 1);
			const address = document.querySelector(`#${linkTargetNeedlyValue}`);
			if (linkTarget !== null) {
				const linkTargetValue = address.getBoundingClientRect().top + scrollY - headerHeight;
				window.scrollTo({ top: linkTargetValue, behavior: "smooth" });
			}
		});
	});
}