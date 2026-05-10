function hcPopGrowthHesapla() {
    const n0 = parseFloat(document.getElementById('hc-pg-n0').value);
    const r = parseFloat(document.getElementById('hc-pg-rate').value) / 100;
    const t = parseFloat(document.getElementById('hc-pg-time').value);

    if (!n0 || isNaN(r) || !t) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // Exponential growth: Nt = N0 * e^(rt)
    const nt = n0 * Math.exp(r * t);

    const resVal = document.getElementById('hc-pg-res-val');
    resVal.innerText = Math.round(nt).toLocaleString('tr-TR');

    document.getElementById('hc-pop-growth-result').classList.add('visible');
}
