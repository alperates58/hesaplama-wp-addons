function hcGenRoundHesapla() {
    const val = parseFloat(document.getElementById('hc-gr-val').value);
    const type = document.getElementById('hc-gr-type').value;
    const prec = parseInt(document.getElementById('hc-gr-prec').value) || 0;

    if (isNaN(val)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    const factor = Math.pow(10, prec);
    let res;

    if (type === 'up') {
        res = Math.ceil(val * factor) / factor;
    } else if (type === 'down') {
        res = Math.floor(val * factor) / factor;
    } else {
        res = Math.round(val * factor) / factor;
    }

    document.getElementById('hc-gr-res-val').innerText = res.toLocaleString('tr-TR', { minimumFractionDigits: prec });
    document.getElementById('hc-yuvarlama-result').classList.add('visible');
}
