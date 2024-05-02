export default function languageSelector() {
    const language_current = document.querySelector('.language__current');
    const widget_wpglobus = document.querySelector('.widget_wpglobus');
    const widget_current_language = document.querySelector('.wpglobus-current-language');
    const code = widget_current_language.querySelector('.code').textContent;
    language_current.textContent = code;

    language_current.addEventListener('click', function () {
        widget_wpglobus.classList.toggle('active');
    });
}
