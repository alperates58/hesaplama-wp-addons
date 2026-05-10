function hcRafterLenHesapla() {
    const span = parseFloat(document.getElementById('hc-rl-span').value);
    const deg = parseFloat(document.getElementById('hc-rl-pitch-deg').value);

    if (!span || !deg) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    const rad = (deg * Math.PI) / 180;
    // Rafter = (Span/2) / cos(pitch)
    const len = (span / 2) / Math.cos(rad);

    const resVal = document.getElementById('hc-rl-res-val');
    resVal.innerText = len.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-rafter-len-result').classList.add('visible');
}
