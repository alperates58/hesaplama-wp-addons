function hcNumRoundHesapla() {
    const val = parseFloat(document.getElementById('hc-nr-val').value);
    const mode = parseInt(document.getElementById('hc-nr-mode').value);

    if (isNaN(val)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    let rounded;
    if (mode >= 0) {
        rounded = Number(val.toFixed(mode));
    } else {
        const factor = Math.pow(10, Math.abs(mode));
        rounded = Math.round(val / factor) * factor;
    }

    document.getElementById('hc-nr-res-val').innerText = rounded.toLocaleString('tr-TR');
    document.getElementById('hc-sayi-yuvarlama-result').classList.add('visible');
}
