export const clearPrice = (price) => {
    /**
     * Number.prototype.format(n, x, s, c)
     *
     * @param integer n: length of decimal
     * @param integer x: length of whole part
     * @param mixed   s: sections delimiter
     * @param mixed   c: decimal delimiter
     */
    Number.prototype.format = function (n, x, s, c) {
        let re = "\\d(?=(\\d{" + (x || 3) + "})+" + (n > 0 ? "\\D" : "$") + ")",
            num = this.toFixed(Math.max(0, ~~n));

        return (c ? num.replace(".", c) : num).replace(
            new RegExp(re, "g"),
            "$&" + (s || ",")
        );
    };

    const myString = Number(price.replace(/\D/g, ""));

    return myString.format(-3, 3, ".", ","); // "12.345.678,90"
};

export const cleanTheWord = (s) => {
    let r = s.toLowerCase().trim();
    r = r.replace(/\(/g, "");
    r = r.replace(/\)/g, "");
    r = r.replace(/\s/g, "-");
    r = r.replace(new RegExp(/[àáâãäå]/g), "a");
    r = r.replace(new RegExp(/æ/g), "ae");
    r = r.replace(new RegExp(/ç/g), "c");
    r = r.replace(new RegExp(/[èéêë]/g), "e");
    r = r.replace(new RegExp(/[ìíîï]/g), "i");
    r = r.replace(new RegExp(/ñ/g), "n");
    r = r.replace(new RegExp(/[òóôõö]/g), "o");
    r = r.replace(new RegExp(/œ/g), "oe");
    r = r.replace(new RegExp(/[ùúûü]/g), "u");
    r = r.replace(new RegExp(/[ýÿ]/g), "y");
    r = r.replace(new RegExp(/\W/g), "-");
    r = r.replace("--", "");
    return r;
};

export const site_url = window.location.origin;