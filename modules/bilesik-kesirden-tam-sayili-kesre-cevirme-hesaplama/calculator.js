function hcTamSayiliKesirHesapla() {
    const num = parseInt(document.getElementById('hc-mf-num').value);
    const den = parseInt(document.getElementById('hc-mf-den').value);

    if (isNaN(num) || isNaN(den) || den === 0) {
        alert('Lütfen geçerli pay ve payda girin.');
        return;
    }

    const whole = Math.floor(num / den);
    const remainder = num % den;

    let result = '';
    if (whole !== 0) {
        result = `${whole} tam ${remainder}/${den}`;
        if (remainder === 0) result = `${whole}`;
    } else {
        result = `${remainder}/${den}`;
    }

    document.getElementById('hc-res-mf-val').innerText = result;

    document.getElementById('hc-mf-result').classList.add('visible');
}
