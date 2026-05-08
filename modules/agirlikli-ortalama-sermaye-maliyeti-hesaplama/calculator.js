function hcWACCHesapla() {
    const e = parseFloat(document.getElementById('hc-wacc-equity').value) || 0;
    const re = (parseFloat(document.getElementById('hc-wacc-re').value) || 0) / 100;
    const d = parseFloat(document.getElementById('hc-wacc-debt').value) || 0;
    const rd = (parseFloat(document.getElementById('hc-wacc-rd').value) || 0) / 100;
    const t = (parseFloat(document.getElementById('hc-wacc-tax').value) || 0) / 100;

    const v = e + d;
    if (v === 0) {
        alert('Lütfen sermaye yapısı bilgilerini giriniz.');
        return;
    }

    const wacc = ((e / v) * re) + ((d / v) * rd * (1 - t));

    document.getElementById('hc-wacc-res-val').innerText = '%' + (wacc * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-wacc-result').classList.add('visible');
}
