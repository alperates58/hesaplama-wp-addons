function hcEgimHesapla() {
    const rise = parseFloat(document.getElementById('hc-eg-rise').value);
    const run = parseFloat(document.getElementById('hc-eg-run').value);

    if (!rise || !run) {
        alert('Lütfen yükseklik ve mesafe değerlerini giriniz.');
        return;
    }

    const slope = rise / run;
    const angleRad = Math.atan(slope);
    const angleDeg = angleRad * (180 / Math.PI);

    document.getElementById('hc-eg-res-val').innerText = slope.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 });
    document.getElementById('hc-eg-res-deg').innerText = `Açı: ${angleDeg.toFixed(2)}°`;

    document.getElementById('hc-egim-result').classList.add('visible');
}
