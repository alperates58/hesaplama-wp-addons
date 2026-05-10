function hcExpGrowthHesapla() {
    const p = parseFloat(document.getElementById('hc-eg-p').value);
    const r = parseFloat(document.getElementById('hc-eg-r').value) / 100;
    const t = parseFloat(document.getElementById('hc-eg-t').value);

    if (isNaN(p) || isNaN(r) || isNaN(t)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // A = P * (1 + r)^t
    const a = p * Math.pow(1 + r, t);

    document.getElementById('hc-eg-res-val').innerText = a.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-ustel-buyume-result').classList.add('visible');
}
