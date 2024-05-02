export const useIsEnglish = () => {
    const lang = document.querySelector('html').lang;
    return lang === 'en-US';
};

