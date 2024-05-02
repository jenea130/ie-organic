export default function lettersAnimation() {
    //=================
    // LettersAnimation
    let title = document.querySelectorAll('._letter-animation');
    if (title) {
        for (let index = 0; index < title.length; index++) {
            let el = title[index];
            let txt = el.innerHTML;
            let txt_words = txt.replace('  ', ' ').split(' ');
            let new_title = '';
            for (let index = 0; index < txt_words.length; index++) {
                let txt_word = txt_words[index];
                let len = txt_word.length;
                new_title = new_title + '<p>';
                for (let index = 0; index < len; index++) {
                    let it = txt_word.substr(index, 1);
                    if (it == ' ') {
                        it = '&nbsp;';
                    }
                    new_title = new_title + '<span>' + it + '</span>';
                }
                el.innerHTML = new_title;
                new_title = new_title + '&nbsp;</p>';
            }
        }
    }
    //=================
}