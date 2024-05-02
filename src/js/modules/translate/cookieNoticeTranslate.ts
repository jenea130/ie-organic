const html = document.querySelector('html');
const lang = html?.lang;

export default function cookieNoticeTranslate() {
    const cookie_notice_text = document.querySelector('#cn-notice-text');
    const cookie_notice_btn = document.querySelector('#cn-more-info');
    if (cookie_notice_text === null || cookie_notice_btn === null) return;
    if (lang === 'en-US') {
        cookie_notice_text.innerHTML = 'This site uses cookies, including third-party cookies, to guarantee you a better browsing experience. By closing this banner, scrolling this page or clicking any of its elements, you consent to the use of cookies.';
        cookie_notice_btn.innerHTML = 'More information';
    }
}

