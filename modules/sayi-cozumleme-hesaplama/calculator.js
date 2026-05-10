function hcNumDecompHesapla() {
    let input = document.getElementById('hc-nd-input').value;
    
    if (!input || isNaN(input)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    let isNegative = input.startsWith('-');
    let numStr = input.replace('-', '');
    let parts = [];
    let len = numStr.length;

    for (let i = 0; i < len; i++) {
        let digit = numStr[i];
        if (digit !== '0') {
            let placeValue = Math.pow(10, len - 1 - i);
            let val = parseInt(digit) * placeValue;
            parts.push(val.toLocaleString('tr-TR'));
        }
    }

    let result = parts.join(' + ');
    if (isNegative) result = '- (' + result + ')';

    document.getElementById('hc-nd-res-val').innerText = result;
    document.getElementById('hc-sayi-cozumleme-result').classList.add('visible');
}
