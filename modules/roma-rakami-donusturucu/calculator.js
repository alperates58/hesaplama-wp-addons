function hcDecToRoman() {
    let num = parseInt(document.getElementById('hc-roman-dec').value);
    if (isNaN(num) || num <= 0 || num > 3999) {
        document.getElementById('hc-roman-str').value = "";
        return;
    }
    const map = { M: 1000, CM: 900, D: 500, CD: 400, C: 100, XC: 90, L: 50, XL: 40, X: 10, IX: 9, V: 5, IV: 4, I: 1 };
    let roman = '';
    for (let i in map) {
        while (num >= map[i]) {
            roman += i;
            num -= map[i];
        }
    }
    document.getElementById('hc-roman-str').value = roman;
}

function hcRomanToDec() {
    let roman = document.getElementById('hc-roman-str').value.toUpperCase();
    if (!roman) return;
    const map = { I: 1, V: 5, X: 10, L: 50, C: 100, D: 500, M: 1000 };
    let dec = 0;
    for (let i = 0; i < roman.length; i++) {
        let current = map[roman[i]];
        let next = map[roman[i + 1]];
        if (next > current) {
            dec += (next - current);
            i++;
        } else {
            dec += current;
        }
    }
    if (!isNaN(dec)) document.getElementById('hc-roman-dec').value = dec;
}
