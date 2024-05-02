export const useIsGerman = () => {
    const lang = document.querySelector('html').lang;
    return lang === 'de-DE';
};

